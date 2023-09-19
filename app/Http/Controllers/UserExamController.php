<?php
namespace App\Http\Controllers;
use App\Exam;
use App\GeneralSetting;
use App\Options;
use App\Category;
use App\Questions;
use App\Result;
use App\Transaction;
use App\WrittenPreview;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Examlogic;
use App\Score;

class UserExamController extends Controller
{
    public function __construct(){
        $this->activeTemplate = activeTemplate();
    }
    public function examList(Request $request)
    {
        $search = $request->search;
        if($search){
            $page_title = "Search Result of $search";
            $examList  = Exam::with('last_result')->where('status',1)->where('end_date','>=',Carbon::now()->toDateString())->where('title','like',"%$search%")->paginate(15);
        } else {
            $page_title = "Test List";
            $examList =  Exam::with('last_result')->where('status',1)->where('end_date','>=',Carbon::now()->toDateString())->latest()->paginate(15);
        }
        return view($this->activeTemplate.'user.exam.examList',compact('page_title','examList','search'));
    }
    public function perticipateExam($id,$return ='')
    {   
        $new_result_option = array();
        if($return == 1){
           $getResult = Result::where('user_id',auth()->id())->where('exam_id',$id)->latest()->first(); 
           $questions_score_array = json_decode($getResult['result'],true);
           
            foreach($questions_score_array['questions_score'] as $queKey=>$question_option){
                $new_result_option[$question_option['question']][] = $question_option['test_select_option'];
            }
           //dd($new_result_option,$questions_score_array['questions_score']);
        }
           session()->forget('exam');
           $page_title = 'Participation of test';
           $exam = Exam::find($id);
           if(!$exam){
               $notify[]=['error','Test not found'];
               return back()->withNotify($notify);
           }
           if($exam->upcomming($exam->id)){
                $notify[]=['error','Sorry!! this is an upcoming test'];
                return back()->withNotify($notify);
           }
           if($exam->question_type == 1){
               
               $exist = Result::where('user_id',auth()->id())->where('exam_id',$exam->id)->latest()->first();
               // if($exist){
               //      $year_date = date("Y-m-d",strtotime(date("Y-m-d", strtotime($exist->created_at)) . " + 364 day"));
               //      if (date('Y-m-d', strtotime($exist->created_at)) < $year_date) {
               //          $notify[]=['error','Sorry you have already participated in this test. You can re-participate after '. date('d-m-Y', strtotime($year_date))];
               //          return redirect(route('user.exam.list'))->withNotify($notify);
               //      }
               // }
            if($return != 1){
               $result = new Result();
               $result->exam_id = $exam->id;
               $result->user_id = auth()->id();
               $result->result_mark = 0;
               $result->total_correct_ans = 0;
               $result->total_wrong_ans = 0;
               $result->result_status = 0;
               $result->save();
            }
           } else {
                $exist = WrittenPreview::where('user_id',auth()->id())->where('exam_id',$exam->id)->first();

                if($exist && env('AVAILABLE_USER_MUTIPLE_TEST') == 'flase'){
                    $notify[]=['error','Sorry you have already participated in this test'];
                    return back()->withNotify($notify);
                }
                $written = new WrittenPreview();
                $written->exam_id = $exam->id;
                $written->user_id = auth()->id();
                $written->status = 2;
                $written->save();
           }
           if($exam->random_question == 1){
               $questions = Questions::where('exam_id',$id)->inRandomOrder()->get();
           } else {
               $questions = Questions::where('exam_id', $id)->with(['questionimages','options.optionsimages'])->orderby('order')->get();
           }
           return view($this->activeTemplate.'user.exam.examScript',compact('page_title','questions','exam','new_result_option'));
    }
    public function takeExam($id)
    {
        $exam = Exam::findOrFail($id);
        $gnl = GeneralSetting::first();
        $user = auth()->user();
        if($exam->question_type == 1){
            $exist = Result::where('user_id',auth()->id())->where('exam_id',$exam->id)->first();
        } else {
            $exist = WrittenPreview::where('user_id',auth()->id())->where('exam_id',$exam->id)->first();
        }
        if($exist){
            $notify[]=['error','Sorry you have already participated in this test'];
            return back()->withNotify($notify);
        }
        if(session('newPrice')){
            $price = session('newPrice');
        } else {
            $price = $exam->exam_fee;
        }
        if($price > $user->balance){
            $notify[]=['error','Insufficient balance'];
            return back()->withNotify($notify);
        }
        $user->balance -= $price;
        $user->update();
        $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $transaction->amount = getAmount($price);
        $transaction->post_balance = getAmount($user->balance);
        $transaction->charge = 0;
        $transaction->trx_type = '-';
        $transaction->details = "Payment of exam fee, $exam->title";
        $transaction->trx = getTrx();
        $transaction->save();
        notify($user, 'EXAM_FEE_FROM_BALANCE', [
            'title' => $exam->title,
            'type' => $exam->question_type == 1 ? 'MCQ':'Written',
            'mark' => $exam->totalmark,
            'amount' => getAmount($price),
            'trx' => $transaction->trx,
            'currency' => $gnl->cur_text,
            'post_balance' => getAmount($user->balance)
        ]);
        return redirect(route('user.exam.perticipate',$exam->id));
    }
    public function scriptSubmission(Request $request)
    {   
        // dd($request); checkk method
        $exam = Exam::findOrFail($request->examId);
        $new_result_option = array();
        if($exam->question_type == 1){
            if($request->retest == 1){
                $getResult = Result::where('user_id',auth()->id())->where('exam_id',$request->examId)->latest()->first(); 
                $questions_score_array = json_decode($getResult['result'],true);    
                foreach($questions_score_array['questions_score'] as $queKey=>$question_option){
                    $new_result_option[$question_option['question']][] = $question_option['test_select_option'];
                }
            }            
           
           //dd($questions_score_array);
            $ert = 1;
            $passMark = ($exam->totalmark*$exam->pass_percentage)/100;
            $correctAns = 0;
            $wrongAns = 0;
            $resultMark = 0;
            
            $result_array = array(); 

            if($request->ans){
                
                $categories_score = array();

                $questions_score = array();

                foreach($request->ans as $k => $ans){
                    
                    $qtn = Questions::with('questioncategories')->findOrFail($k);
                        
                    if(!empty($qtn)){

                        $selected_cat = $qtn->questioncategories->pluck('category_id')->toArray();

                        $questioncategories = Category::with('groupfactor')->whereIn('id',$selected_cat)->get();

                        $opt = Options::findOrFail($ans);
                       // dd($new_result_option[$k]);
                        $questions_score[$ert]['question'] = $k;
                        $questions_score[$ert]['score'] = $opt->correct_ans;
                        $questions_score[$ert]['factore_id'] = $opt->correct_ans;
                        $questions_score[$ert]['group_id'] = $opt->correct_ans;
                        $questions_score[$ert]['group_name'] = $opt->correct_ans;
                        $questions_score[$ert]['total_option'] = ($request->testtotalselect[$k])?$request->testtotalselect[$k] : '';
                        $questions_score[$ert]['test_select_option'] = (!empty($new_result_option)) ? $request->testselect[$k] :  0 ;
                        $questions_score[$ert]['test_unique_id'] = ($request->uniqueId[$k])?$request->uniqueId[$k] : '';
                        $answer_data = array();

                        if (!empty($questioncategories)) {

                            foreach ($questioncategories as $key => $category) {

                                $questions_score[$ert]['question'] = $k;
                                $questions_score[$ert]['score'] =  $opt->correct_ans ;
                                $questions_score[$ert]['factore_id'] = $category->id;
                                $questions_score[$ert]['factore_label'] = $category->name;
                                $questions_score[$ert]['factor_order'] = $category->order;
                                $questions_score[$ert]['group_id'] = $category->groupfactor->id;
                                $questions_score[$ert]['group_name'] = $category->groupfactor->name;
                                $questions_score[$ert]['total_option'] = ($request->testtotalselect[$k])?$request->testtotalselect[$k] : '';
                                $testselect = (!empty($new_result_option)) ? $request->testselect[$k] :  0;
                                $questions_score[$ert]['test_select_option'] = ($request->testselect[$k])?$request->testselect[$k] : $testselect;
                                $questions_score[$ert]['test_unique_id'] = ($request->uniqueId[$k])?$request->uniqueId[$k] : '';
                                 
                                if (array_key_exists($category->id,$categories_score)) {
                                    $categories_score[$category->id]['group'] = $category->groupfactor->name;
                                    $categories_score[$category->id]['group_order'] = $category->groupfactor->order;
                                    $categories_score[$category->id]['label'] = $category->name;
                                    $categories_score[$category->id]['score'] = $categories_score[$category->id]['score'] + $opt->correct_ans;
                                }else {
                                    $categories_score[$category->id]['group'] = $category->groupfactor->name;
                                    $categories_score[$category->id]['group_order'] = $category->groupfactor->order;
                                    $categories_score[$category->id]['label'] = $category->name;
                                    $categories_score[$category->id]['score'] =  $opt->correct_ans;
                                }
                                $ert++;
                            }
                            $ert++;
                        }
                        $resultMark = $resultMark + $opt->correct_ans;
                    }
                    
                    $all_result = Result::where('exam_id',$exam->id)->get();
                    $all_marks = $all_result->pluck('result_mark')->toArray();
                    $sum_of_marks = $all_result->sum('result_mark') + $resultMark;

                    $current_day_result = Result::where('exam_id',$exam->id)->whereDate('created_at',Carbon::today())->get();
                    $current_all_marks = $current_day_result->pluck('result_mark')->toArray();
                    $sum_of_marks_current_day = $current_day_result->sum('result_mark') + $resultMark;
                    $current_day_avarage = ($current_day_result->count() > 0) ? $sum_of_marks_current_day/$current_day_result->count() : 0;
                    $overall_avarage = ($all_result->count() > 0) ? $sum_of_marks/$all_result->count(): 0;

                    if (!empty($all_marks)) {
                        $all_marks[] = $resultMark;
                        $result_array['overall_standard_deviation'] = $this->standard_deviation($all_marks);
                        $result_array['overall_z_score'] = $this->z_score($all_marks,$resultMark);
                        $result_array['overall_t_score'] = $this->t_score($all_marks,$resultMark);
                        $result_array['overall_percentile'] = $this->percentile($all_marks,$resultMark);
                 
                    }else{
                        $result_array['overall_standard_deviation'] = 0;
                        $result_array['overall_z_score'] = 0;
                        $result_array['overall_t_score'] = 0;
                        $result_array['overall_percentile'] = 0;  
                    }

                    if (!empty($current_all_marks)) {
                        $current_all_marks[] = $resultMark;
                        $result_array['standard_deviation'] = $this->standard_deviation($current_all_marks);
                        $result_array['z_score'] = $this->z_score($current_all_marks,$resultMark); 
                        $result_array['t_score'] = $this->t_score($current_all_marks,$resultMark); 
                        $result_array['percentile'] = $this->percentile($current_all_marks,$resultMark); 
                    }else{
                        $result_array['standard_deviation'] = 0;
                        $result_array['z_score'] = 0; 
                        $result_array['t_score'] = 0; 
                        $result_array['percentile'] = 0; 
                    }                   
                    $result_array['resultMark'] = $resultMark; 
                    $result_array['categories_score'] = $categories_score; 
                    $result_array['questions_score'] = $questions_score;
                    $result_array['avarage'] = $current_day_avarage; 
                    $result_array['overall_avarage'] = $overall_avarage;
                }
            } 
            $exam_title = Exam::where('id', $exam->id)->value('title');

            $result  = Result::where('user_id',auth()->id())->where('exam_id',$exam->id)->latest()->first();
            $result->exam_id = $exam->id;
            $result->user_id = auth()->id();
            $result->result_mark = $resultMark ?? 0;
            $result->total_correct_ans = $correctAns ?? 0;
            $result->total_wrong_ans = $wrongAns ?? 0;
            $result->result_status = $passMark > $resultMark ? 0:1 ?? 0;
            $result->result = $result_array;

            $test_id = $this->create_test_id($result->id, $exam_title);

            $result->test_id = $test_id;
            $result->save();

            return redirect(route('user.exam.result',$exam->id)); 

        } else {
            WrittenPreview::where('user_id',auth()->id())->where('exam_id',$exam->id)->delete();
            foreach($request->written as $k => $ans){
                $qtn = Questions::findOrFail($k);
                $written = new WrittenPreview();
                $written->exam_id = $exam->id;
                $written->question_id = $qtn->id;
                $written->user_id = auth()->id();
                $written->question = $qtn->question;
                $written->answer = $ans;
                $written->status = 0;
                $written->save();
            }
            return redirect(route('user.exam.result',$exam->id));
        }
    } 

    public function z_score($array,$value)
    {  
        $fMean = array_sum($array) / count($array);
        return (float) $value - $fMean / ($this->standard_deviation($array) ? $this->standard_deviation($array) :1 );
    }

    public function t_score($array,$value)
    {   
       
        $fMean = array_sum($array) / count($array);
        $z_score = $value - $fMean / ($this->standard_deviation($array) ? $this->standard_deviation($array):1 );
        return (float) (10 * $z_score) + 50;
    }

    public function percentile($array,$value)
    {   
        asort($array);
        return (float) ((array_search($value, $array)) / count($array)) * 100;
    }

    public function standard_deviation($array)
    {   
       
        $fMean = array_sum($array) / count($array);
        //print_r($fMean);
        $fVariance = 0.0;
        foreach ($array as $i)
        {
            $fVariance += pow($i - $fMean, 2);

        }       
        $size = count($array) - 1;
        return (float) sqrt($fVariance)/sqrt($size);
    }

    private function group_by($array, $key) {
        $return = array();
        foreach($array as $val) {
            $return[$val[$key]][] = $val;
        }
        return $return;
    }

    public function result($id)
    {   
        function aasort (&$array, $key) {
            $sorter = array();
            $ret = array();
            reset($array);
            foreach ($array as $ii => $va) {

                $sorter[$ii] = $va[$key];
            }
            asort($sorter);
            foreach ($sorter as $ii => $va) {
                $ret[$ii] = $array[$ii];
            }
            $array = $ret;
        }
        $exam = Exam::findOrFail($id);
        if($exam->question_type == 1){
            $page_title = "Test Result";
            $result = Result::where('exam_id',$exam->id)->latest()->first();
            if($result){
                $data = json_decode($result->result,true); 
                $new_question = array();
                $new_questionAns = array();
                $new_categories = array();
                $new_group = array();
                aasort($data['questions_score'], "factor_order"); // asseding order by factor order
                foreach ($data['questions_score'] as  $categories) {
                   $new_question [] = $categories;  
                   $new_questionAns [$categories['question']] = $categories['score'];
                }
                $examLogic = Examlogic::where('exam_id',$id)->get()->toArray();
                $new_examLogic = array();
                foreach ($examLogic as $logics) {
                    $new_examLogic[] = $logics; 
                }
                
                aasort($data['categories_score'], "group_order"); // asseding order by group order
                foreach($data['categories_score'] AS $groupGet){
                    if(!in_array($groupGet['group'],$new_group)){ 
                        $new_group[] = $groupGet['group'];
                    }   
                }

                $result_group = array();
                $total_score = 0;
                $factor_total = 0;
                foreach($new_group As $group){ 
                    $factor_total = 0;  
                    $data_array = array_filter($new_question, function($val_que) use ($group) {
                        return $val_que['group_name'] == $group;
                    });
                    $fac_array = array();
                    foreach($data_array as $val_que){
                        $fac_array[] = $val_que; 
                        $total_score += $val_que['score'];
                        $factor_total += $val_que['score'];
                    }

                    $result_group[$group]['factor'] = array_values($this->group_by($fac_array,'factore_id'));
                    $result_group[$group]['total_group'] = $factor_total;
                }
                
                $scoreTrue = Score::where("scorecategory",3)->get()->toArray(); // get data true and flase
                function unique_multidim_array($array, $key) {
                    $temp_array = array();
                    $i = 0;
                    $key_array = array();
                   
                    foreach($array as $val) {
                        if (!in_array($val[$key], $key_array)) {
                            $key_array[$i] = $val[$key];
                            $temp_array[$i] = $val;
                        }
                        $i++;
                    }
                    return $temp_array;
                }
                $filter_question = array();
                $new_filter_question = array();
                $filter_question = unique_multidim_array($new_question,'factore_id');
                foreach($filter_question AS $group_factor){
                    $new_filter_question['group_id'][] = $group_factor['group_id'];
                    $new_filter_question['group_label'][] = $group_factor['group_name'];
                    $new_filter_question['factore_id'][] = $group_factor['factore_id'];
                    $new_filter_question['factore_label'][] = $group_factor['factore_label'];
                }
                // dd($result_group);
                // $new_filter_question = unique_multidim_array($new_filter_question['group_id'],'group_id');
                // dd($new_filter_question);
                $test_id = $result->test_id;
                return view($this->activeTemplate.'user.exam.result',compact('test_id','page_title','exam','result','result_group','new_examLogic','scoreTrue','new_questionAns','new_filter_question','new_question'));
            }else{
                return redirect(route("user.exam.list"));
            }
        } else {
            $page_title = "Submission";
            return view($this->activeTemplate.'user.exam.writtenPrev',compact('page_title','exam'));
        }
    }
    public function mcqExamHistory(Request $request)
    { 
        $search = $request->search;
        if($search){
            $page_title = "Search Result of $search";
            $histories = Result::where('user_id',auth()->id())->whereHas('exam',function($q) use($search){
                $q->where('question_type',1)->where('title','like',"%$search%");
            })->paginate(15);
        } else {
            $page_title = "Mcq Test History";
            $histories = Result::where('user_id',auth()->id())->whereHas('exam',function($q){
                $q->where('question_type',1);
            })->paginate(15);
        }
        return view($this->activeTemplate.'user.exam.examHistory',compact('page_title','histories','search'));
    }
    public function writtenExamHistory(Request $request)
    {
            $search = $request->search;
            if($search){
                $page_title = "Search Result of $search";
                $collection = WrittenPreview::where('user_id',auth()->id())->whereHas('exam',function($q) use($search){
                    $q->where('title','like',"%$search%");
                })->get();
            } else {
                $page_title = "Written Test History";
                $collection = WrittenPreview::where('user_id',auth()->id())->whereHas('exam')->get();
            }
            $histories = $collection->groupBy('exam_id');
            $examId = array_keys($histories->toArray());
            $exams = Exam::whereIn('id',$examId)->paginate(15);
            return view($this->activeTemplate.'user.exam.writtenExamHistory',compact('page_title','histories','search','exams'));
    }
    public function writtenExamDetails($examid)
    {
        $page_title = "Written Test Result Details";
        $user  = auth()->user();
        $detailQuestions = WrittenPreview::where('user_id',$user->id)->where('exam_id',$examid)->with(['writtenQuestion','exam'])->get();
        $exam  = Exam::findOrFail($examid);
        return view($this->activeTemplate.'user.exam.writtenExamDetails',compact('page_title','detailQuestions','exam','user'));
    }
    public function perticipate()
    {
        $exam = session('exam');
        $paid = session('paid');
        if(!$paid){
            $notify[]=['error','Sorry Invalid Request'];
            return redirect(route('user.exam.list'))->withNotify($notify);
        }
        session()->forget('paid');
        return redirect(route('user.exam.perticipate',$exam->id));
    }
    public function mcqCertificate($id)
    {
        $result  = Result::findOrFail($id);
        $page_title = 'Certificate';
        $gnl =GeneralSetting::first();
        $cert = certificate([
            'sitename' => $gnl->sitename,
            'name' => auth()->user()->fullname,
            'score' => $result->result_mark,
            'exam_title'=> $result->exam->title,
            'date' => showDateTime($result->created_at,'d M Y')
        ]);
        $cert_name = slug($result->exam->title).'-'.slug(showDateTime($result->created_at,'d M Y'));
      return view($this->activeTemplate.'certificate',compact('cert','page_title','cert_name'));
    }
    public function writtenCertificate($examid)
    {
        $exam  = Exam::findOrFail($examid);
        $result = $exam->written->where('user_id',auth()->id())->last();
        $page_title = 'Certificate';
        $getMark = $exam->totalWrittenMark(auth()->id());
        $gnl = GeneralSetting::first();
        $cert = certificate([
            'sitename' => $gnl->sitename,
            'name' => auth()->user()->fullname,
            'score' => $getMark,
            'exam_title'=> $exam->title,
            'date' => showDateTime($result->updated_at,'d M Y')
        ]);
      $cert_name = slug($exam->title).'-'.slug(showDateTime($result->updated_at,'d M Y'));
      return view($this->activeTemplate.'certificate',compact('cert','page_title','cert_name'));
    }

    public function testHistory () {
        $page_title = "Test History";

        return view($this->activeTemplate.'user.exam.testHistory',compact('page_title'));
    }

    public function initials($str) {
        $ret = '';
        foreach (explode(' ', $str) as $word)
            $ret .= strtoupper($word[0]);
        return $ret;
    }

    public function create_test_id($result_id, $exam_title) {

        $total_letters = 6;
        $exam_title = $this->initials($exam_title);
        $exam_title_letters = strlen($exam_title);
        $total_letters = $total_letters - strlen($exam_title);
        $result_id = sprintf("%0".$total_letters."d", $result_id);
        
        $test_id = $exam_title.$result_id;

        return $test_id;

    }

    public function getreport($id,$examid)
    {

        function aasort(&$array, $key) {
            $sorter = array();
            $ret = array();
            reset($array);
            foreach ($array as $ii => $va) {

                $sorter[$ii] = $va[$key];
            }
            asort($sorter);
            foreach ($sorter as $ii => $va) {
                $ret[$ii] = $array[$ii];
            }
            $array = $ret;
        }
        // exit($examid);
        $exam = Exam::findOrFail($examid);
        if($exam->question_type == 1){
            $page_title = "Test Result";
            $result = Result::where('id',$id)->get();
           //dd($result[0]);
            if($result[0]){
                $resultdetails=$result[0]->result ? $result[0]->result :'';
                $data = json_decode($resultdetails,true); 
                //dd($data);
                if(empty($data)){
                    // exit;
                    return view($this->activeTemplate.'user.exam.viewreport',compact('page_title','result'));
                }
                $new_question = array();
                $new_questionAns = array();
                $new_categories = array();
                $new_group = array();
                aasort($data['questions_score'], "factor_order"); 
                // asseding order by factor order
                foreach ($data['questions_score'] as  $categories) {
                   $new_question [] = $categories;  
                   $new_questionAns [$categories['question']] = $categories['score'];
                }
                $examLogic = Examlogic::where('exam_id',$examid)->get()->toArray();
                //dd($examLogic);
                $new_examLogic = array();
                foreach ($examLogic as $logics) {
                    if($logics['id'] !== 711 && $logics['id'] !== 706){
                        $new_examLogic[] = $logics; 
                    }
                }
                
                aasort($data['categories_score'], "group_order"); // asseding order by group order
                foreach($data['categories_score'] AS $groupGet){
                    if(!in_array($groupGet['group'],$new_group)){ 
                        $new_group[] = $groupGet['group'];
                    }   
                }

                $result_group = array();
                $total_score = 0;
                $factor_total = 0;
                foreach($new_group As $group){ 
                    $factor_total = 0;  
                    $data_array = array_filter($new_question, function($val_que) use ($group) {
                        return $val_que['group_name'] == $group;
                    });
                    $fac_array = array();
                    foreach($data_array as $val_que){
                        $fac_array[] = $val_que; 
                        $total_score += $val_que['score'];
                        $factor_total += $val_que['score'];
                    }

                    $result_group[$group]['factor'] = array_values($this->group_by($fac_array,'factore_id'));
                    $result_group[$group]['total_group'] = $factor_total;
                }
                
                $scoreTrue = Score::where("scorecategory",3)->get()->toArray(); // get data true and flase
                function unique_multidim_array($array, $key) {
                    $temp_array = array();
                    $i = 0;
                    $key_array = array();
                   
                    foreach($array as $val) {
                        if (!in_array($val[$key], $key_array)) {
                            $key_array[$i] = $val[$key];
                            $temp_array[$i] = $val;
                        }
                        $i++;
                    }
                    return $temp_array;
                }
                $filter_question = array();
                $new_filter_question = array();
                $filter_question = unique_multidim_array($new_question,'factore_id');
                foreach($filter_question AS $group_factor){
                    $new_filter_question['group_id'][] = $group_factor['group_id'];
                    $new_filter_question['group_label'][] = $group_factor['group_name'];
                    $new_filter_question['factore_id'][] = $group_factor['factore_id'];
                    $new_filter_question['factore_label'][] = $group_factor['factore_label'];
                }
                foreach ($result_group as $key => $value) {
                    if($key == 'Validity'){
                        $a = array($key => $result_group[$key]);
                        unset($result_group[$key]);
                        $result_group = array_merge($a,$result_group);
                        // var_dump($key);

                    }
                }

                $test_id = $result[0]['test_id'];
                // dd($result_group);
                // $new_filter_question = unique_multidim_array($new_filter_question['group_id'],'group_id');
                // dd($new_filter_question);
                // exit;
                return view($this->activeTemplate.'user.exam.viewreport',compact('test_id','page_title','exam','result','result_group','new_examLogic','scoreTrue','new_questionAns','new_filter_question','new_question'));
            }
        }
         
    }
}