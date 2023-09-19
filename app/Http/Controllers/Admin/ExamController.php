<?php
namespace App\Http\Controllers\Admin;
use App\Exam;
use App\ExamImages;
use App\Subject;
use App\Gender;
use App\Category;
use App\Questions;
use App\Options;
use App\QuestionCategories;
use Carbon\Carbon;
use App\Certificate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Result;
use App\Transformers\ResultTransformer;
use App\Exports\UsersExport;
use App\Exports\ResultOfAllUser;
use Excel;
use App\Examlogic;
use \Cache;
use App\Score;
use App\User;


class ExamController extends Controller
{   

    // private $excel;

    // public function __construct(Excel $excel)
    // {
    //     $this->excel = $excel;
    // }

    public function allExams(Request $request)
    {
        if($request->search){
            $search = $request->search;
            $page_title = "Search Results '$search'";
            $exams = Exam::where('title','LIKE',"%$search%")->with('subject')->with('examimages')->paginate(15);
        } else {
            $page_title = 'All Tests';
            $exams = Exam::latest()->with('subject')->with('examimages')->paginate(15);
        }
        $empty_message = 'No exams available';
        return view('admin.exam.all',compact('page_title','exams','empty_message'));
    }
    public function addExam()
    {
        $page_title = 'Add New Test';
        $subjects = Subject::all();
        $genders = Gender::all();
        $categories = Category::all();
        return view('admin.exam.addExam',compact('page_title','subjects','categories','genders'));
    }
    public function store(Request $request)
    {
        $request->validate([
            //'subject_id' => 'required|numeric',
            'title'     => 'required',
            'instruction'     => 'required',
            //'question_type' => 'required|in:1,2',
           // 'totalmark'  => 'required|numeric|min:0',
            //'pass_percentage' =>' required|min:0',
           // 'duration' => 'required|numeric|min:1',
            'value' => 'required|in:1,2',
            //'start_date' => 'required',
           //'end_date' => 'required|after:start_date',
            'exam_fee' => 'required_if:value,1|numeric',
            'reduce_mark' => 'required_with:nag_status|min:0',
        ],
        [
            'reduce_mark.required_with'=>'Reduce mark is required when Negative marking is on',
            'exam_fee.required_if' => 'Test Fee is required when Payment type is Paid'
        ]);
        $exam = new Exam();
        //$exam->subject_id = $request->subject_id;
        $exam->subject_id = 0;
        $exam->title = $request->title;
        $exam->instruction = $request->instruction;
        $exam->gender_id = $request->gender_id;
        //$exam->question_type = $request->question_type;
        $exam->question_type = 1;
        $exam->totalmark =  $request->totalmark;
        $exam->pass_percentage =  $request->pass_percentage;
        $exam->duration =  $request->duration;
        $exam->datecheck =  $request->datecheck;
        $exam->value =  $request->value;
        $exam->exam_fee =  $request->exam_fee;
      //  dd($request->datecheck);
        if($request->datecheck == 1){
            $exam->start_date =  Carbon::parse($request->start_date)->format('Y-m-d');
            $exam->end_date =  Carbon::parse($request->end_date)->format('Y-m-d');
        }else{
            $exam->start_date = date('Y-m-d');
            $exam->end_date =  '2050-12-30';
        }
        if($request->question_type == 1){
            echo $exam->reduce_mark = $request->neg_status ? $request->reduce_mark : null;
            $exam->negative_marking =$request->neg_status ? 1 : 0;
        }
        $exam->random_question = $request->randomize ? 1:0;
        $exam->option_suffle = $request->opt_suffle ? 1:0;
        $exam->status = $request->status ? 1 : 0;
        $savemsg = $exam->save();
        $last_id  = $exam->id;
        if($request->image){
            foreach($request->image as $image) {
                $old = $exam->image ?? null;
                $imageUp = uploadImage($image, 'assets/images/exam/', '850x560', $old, '400x250');
                $ExamImages = new ExamImages();
                $ExamImages->exam_id = $last_id;
                $ExamImages->image = $imageUp;
                $ExamImages->save();
            }
        }
        if($savemsg) {
            $notify[] = ['success', 'Test created successfully'];
        }else{
            $notify[] = ['success', 'Test created Fail.'];
        }
      
        return redirect(route('admin.exam.all'))->withNotify($notify);

    }
    public function imageRemove(Request $request){
        $Remove = ExamImages::find($request->id);
        $oldimg = $Remove->image;
        $Remove->delete();
        unlink(public_path('assets/images/exam/'.$oldimg));
        if($Remove) {
            $notify = ['Image Deleted Successfully'];
        }else{
            $notify = ['Image Deleted Fail.'];
        }
        return  $notify;
    }
    public function editExam($id)
    {
        $page_title = 'Edit Test';
        $subjects = Subject::all();
        $genders = Gender::all();
        $categories = Category::all();
        $exam = Exam::findOrFail($id);
        $images = ExamImages::where('exam_id', '=', $id)->get(['exam_images.image as img','exam_images.id as image_id']);
        return view('admin.exam.editExam',compact('page_title','exam','images','subjects','categories','genders'));
    }

    public function update(Request $request,$id)
    {   
        
        $request->validate([
            //'subject_id' => 'required|numeric',
            'title'     => 'required',
            'instruction'     => 'required',
            //'question_type' => 'required|in:1,2',
            //'totalmark'  => 'required|numeric|min:0',
            //'pass_percentage' =>' required|min:0',
           // 'duration' => 'required|numeric|min:1',
            'value' => 'required|in:1,2',
         //   'start_date' => 'required',
          //  'end_date' => 'required|after:start_date',
            'exam_fee' => 'required_if:value,1|numeric',
            'reduce_mark' => 'required_with:nag_status|min:0',
        ],
        [
            'reduce_mark.required_with'=>'Reduce mark is required when Negative marking is on',
            'exam_fee.required_if' => 'Test Fee is required when Payment type is Paid'
        ]);
        $exam = Exam::findOrFail($id);
        //$exam->subject_id = $request->subject_id;
        $exam->subject_id = 0;
        $exam->title = $request->title;
        $exam->gender_id = $request->gender_id;
        $exam->instruction = $request->instruction;
        //$exam->question_type = $request->question_type;
        $exam->question_type = 1;
        $exam->totalmark =  $request->totalmark;
        $exam->pass_percentage =  $request->pass_percentage;
        $exam->duration =  $request->duration;
        $exam->datecheck =  $request->datecheck;
        $exam->value =  $request->value;
        $exam->exam_fee =  $request->exam_fee;
        if($request->datecheck == 1){
            $exam->start_date =  Carbon::parse($request->start_date)->format('Y-m-d');
            $exam->end_date =  Carbon::parse($request->end_date)->format('Y-m-d');
        }else{
            $exam->start_date =  Carbon::now();
            $exam->end_date =  '2050-12-30';
        }
        /*$images = [];
        if($request->image){
            foreach($request->image as $image) {
                $old = $exam->image ?? null;
                $images[] = uploadImage($image, 'assets/images/exam/', '850x560', $old, '400x250');
            }
            $exam->image =  json_encode( $images);
        }*/
        if($request->question_type == 1){
            $exam->reduce_mark = $request->neg_status ? $request->reduce_mark:null;
            $exam->negative_marking = $request->neg_status ? 1 : 0;
        }
        $exam->random_question = $request->randomize ? 1:0;
        $exam->option_suffle = $request->opt_suffle ? 1:0;
        $exam->status = $request->status ? 1 : 0;
        $exam->update();
        $last_id  = $exam->id;
        if($request->image){ 
            foreach($request->image as $image) {
                $old = $exam->image ?? null;
                $imageUp = uploadImage($image, 'assets/images/exam/', '850x560', $old, '400x250');
                $ExamImages = new ExamImages();
                $ExamImages->exam_id = $last_id;
                $ExamImages->image = $imageUp;
                $ExamImages->save();
            }
        }
        $notify[]=['success','Test Updated successfully'];
        return back()->withNotify($notify);
    }
    // delete test
    public function delete($id){
        $Exam = Exam::findOrFail($id);
        $Exam->delete();
        // $ExamImage = ExamImages::where('exam_id',$Exam->id)->get()->toArray();
        $ExamImage = ExamImages::where('exam_id',$Exam->id)->delete();
        /*$new_ids = array();
        foreach($ExamImage as $image){
            $oldimg = $image['image'];
            $new_ids[] = $image['id'];
            //unlink(public_path('assets/images/exam/'.$oldimg));    
        }
        $Remove = ExamImages::destroy($new_ids);*/

        $qtn = Questions::where('exam_id',$Exam->id)->get();
        // Options::where('question_id',$qtn[0]->id)->get();
        // $new_option = array();
        // foreach($qtn as $qtn_op_ids){
        //     $new_option[] = $qtn_op_ids->id;
        // }
        // Options::destroy($new_option);
        $new_qtn = array();
        foreach($qtn as $qtn_ids){
            $new_qtn[] = $qtn_ids->id;
        }
        Questions::destroy($new_qtn); 

        $notify[]=['success','Image Deleted Successfully'];
        return redirect(route("admin.exam.all"))->withNotify($notify);
    }

    public function examQuestions($examid)
    {
        $page_title = 'Test Questions';
        $empty_message  = 'No data';
        $qstns = Questions::with('questionimages','questioncategories')->where('exam_id',$examid)->orderBy('order', 'ASC')->get();
        $exam = Exam::findOrFail($examid);
        return view('admin.question.examQuestions',compact('page_title','qstns','empty_message','exam')); 
    }
    private function group_by($array, $key) {
        $return = array();
        foreach($array as $val) {
            $return[$val[$key]][] = $val;
        }
        return $return;
    }
    public function examLogics($examid)
    {
        $page_title = 'Questions Logics';
        $empty_message  = 'No data';

        // $qstns = Cache::remember('Questions',100, function(){
        //     retrun Questions::with('questioncategories.category')->where('exam_id',$examid)->orderBy('order', 'ASC')->get();
        // });
            $qstns = Questions::select('id','unique_id','exam_id','question','choosecategory')->with(['questioncategories.category' => function($categoryfields){ $categoryfields->select('id','name','status','groupfactor_id','order'); } ])->where('exam_id',$examid)->orderBy('order', 'ASC')->get();
            
         
        //dd($qstns);
        $Newquestions = array();
        foreach($qstns AS & $qstn){
            $Newquestions[] = array(
                        'id' => $qstn['id'],
                        'name' => strip_tags($qstn['question']),
                        'category' => $qstn['choosecategory'],
                        'uniqueid' => $qstn['unique_id'],
                    );
         }
        $exam = Exam::findOrFail($examid);
        $fac_array = array();
        $new_question = array();
        $new_group = array();
        $i = 0;
        
        foreach($qstns AS & $categoryid){
           // print_r(var_dump($categoryid)); echo'<br>';
             foreach($categoryid['questioncategories'] AS & $groupGet){
                // if(array_search($groupGet['category']->groupfactor_id, array_column($new_group,'id')) !== false){
                if(!empty($groupGet['category']->groupfactor_id)){
                    if(!in_array($groupGet['category']->groupfactor_id,$new_group)){ 
                        $new_group[$i] = $groupGet['category']['groupfactor'];
                        // $new_group['name'][] = $groupGet['category']['groupfactor']['name'];
                    $i++;
                    }   
                }
            }
        }
        //dd($new_group);
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
        //dd($new_group);
        aasort($new_group, "order"); // asseding order by group order
        $new_factor = array();
        $get_factor_array = array();
        $new_questions = array();
        foreach($new_group AS $key => $group){ 
            $factor_check = array();
            $factors_ids = array();
            $get_factor_array = array();
            $factor_id_check = '';
            $new_questions = array();

            foreach($qstns AS  $key => $qstn){
                $n = 0;
                //echo count($new_group);
                if(!empty($group['id'])){
                    foreach($qstn['questioncategories'] AS & $factorGet){
                    
                    if(!empty($factorGet['category']['groupfactor_id'])){
                        $get_factor_array['factor_id'][] = $factorGet['category_id'];
                        $get_factor_array['group_id'][] = $factorGet['category']['groupfactor_id'];    
                    }
                    
                    if(!empty($factorGet['category']->groupfactor_id)){
                        if(!in_array($factorGet->category_id,$factor_check) && $factorGet['category']->groupfactor_id == $group['id'] ){ 
                            $factor_check[] = $factorGet->category_id;
                            if($n == 0){ $factor_id_check = $factorGet->category_id;}
                        }
                    }
                    
                    if(!empty($factorGet['category']->name)){
                        $factors_ids[$factorGet->category_id][$factorGet['category']->name][] = array(
                            'id' => $qstn['id'],
                            'name' => $qstn['question'],
                            'category' => $qstn['choosecategory'],
                            'uniqueid' => $qstn['unique_id'],
                        );
                    
                        $factors_ids[$factorGet->category_id]['factor_order'] = $factorGet['category']->order;
                    }
                    $new_questions[] = array(
                        'id' => $qstn['id']
                    );
                    $n++;
                    }
                }
            }
            aasort($factors_ids, "factor_order"); // asseding order by factor order
            
            if(!empty($new_questions)){
                $new_factor[$group['id']]['group_lable'] = $group['name'];
                $new_factor[$group['id']]['group_id'] = $group['id'];
                $new_factor[$group['id']]['factors_ids'] = $factors_ids;
            }   

        }

        $newFactor = array();
        foreach($new_factor as  $Fkey=>$val){
            if(!empty($Fkey) ){
              //return redirect(route('admin.exam.warning',['exam'=>$exam->title]));
              $newFactor[$Fkey] = $val;
            }
        }
        $new_factor = $newFactor;
        return view('admin.exam.logicQuestions',compact('page_title','empty_message','examid','new_factor','get_factor_array','Newquestions'));
    }
    // exam old logic 
    public function examoldexam(Request $request){
        $factor_id = $request->factorid;
        $group_id = $request->groupid;
        $examid = $request->examid;
        $examLogics = Examlogic::where('exam_id',$examid)->where('group_id',$group_id)->where('factor_id',$factor_id)->get(['id','exam_id','group_id','factor_id','comparison1','operation','logic','comparison2','textmsg1','textmsg2','operation2','comparison2mark','isCheck','facetor_description'])->toArray();
         $qstns = Questions::select('id','unique_id','exam_id','question','choosecategory')->with(['questioncategories.category' => function($categoryfields){ $categoryfields->select('id','name','status','groupfactor_id','order'); } ])->where('exam_id',$examid)->orderBy('order', 'ASC')->get();
        //dd($qstns);
        $Newquestions = array();
        foreach($qstns AS $qstn){ 
            $Newquestions[] = array(
                        'id' => $qstn['id'],
                        'name' => strip_tags($qstn['question']),
                        'category' => $qstn['choosecategory'],
                        'uniqueid' => $qstn['unique_id'],
                    );
         }
       $logicBlock = '<div class="row p-1">';
       $logicBlock .= '<div class="col-lg-12 adddiv">';
                $Examkey = 0;
                $checkFactor =  array_column($examLogics, 'factor_id'); 
                if( count($examLogics) > 0){  $checkno = 0;
                    foreach($examLogics as $examkey => $logic){  
                        //if( !in_array($logic['comparison1'],$checkFactor) &&  $logic['group_id'] == $result['group_id']  && $Fkey == $logic['factor_id']){
                            $logicBlock .='<input type="hidden" name="oldexam[]" value="'.$logic['id'].'">';
                            
                            $logicBlock .='<input type="hidden" class="factor_dec" value="'.$logic['facetor_description'].'">';
                            if($logic['comparison1'] != ''){   
                                $logicBlock .='<div class="copyBlock">';
                                    $logicBlock .='<div class="">';
                                        $logicBlock .='<div class="form-check-inline checkBox">';
                                            $logicBlock .='<label class="form-check-label" for="check_'.$examkey.'"><b>Is  True & False logic ? </b> </label> &nbsp;&nbsp;';
                                            $logicBlock .='<input type="checkbox" class="form-check-input checkquestion" name="isCheck['.$logic['group_id'].']['.$logic['factor_id'].']['.$Examkey.']" id="check_'.$examkey.'" value="1" >';
                                        $logicBlock .='</div>';
                                        $logicBlock .='<div class="float-right">
                                            <a href="javascript:void(0)"  class=" btn-link Copylogic" title="Copy Block" id="Copylogic" data-key="'.$logic['factor_id'].'" data-examkey="'.$Examkey.'" data-groupid ="'.$group_id.'" >Copy</a>';
                                        $logicBlock .='</div>
                                    </div>';
                                    $logicBlock .='<div class="form-group extra  d-flex justify-content-between ">
                                        <div class="form-group addaddcomparison1">
                                            <label class="font-weight-bold">Comparison 1<span class="text-danger">*</span></label> 
                                                 
                                            <select class="form-control select2 comparison1" multiple="multiple" name="comparison1['.$group_id.']['.$logic['factor_id'].']['.$Examkey.'][]" >
                                                <option value="">Select</option>';  
                                                $questionIds = array(); 
                                                    foreach($Newquestions AS $ques){             
                                                            $qcategory = '';
                                                            $comp1 = explode(",",$logic['comparison1']);
                                                            $qcategory = ($ques['category'] == 3)? 'true': '';
                                                            $cat = (in_array($ques['id'],$comp1) )? 'selected': '';
                                                            $truefalse = ($ques['category'] == 3)? '( True & False )': '';
                                                        if(!in_array($ques['id'], $questionIds)){ 
                                                            $questionIds[] = $ques['id']; 
                                                            $logicBlock .='<option  value="'.$ques['id'] .'" data-quecategory="'.$ques['category'] .'"'. $cat.' >('.$ques['uniqueid'].') '. $ques['name'] .' '. $truefalse.'</option> ';
                                                        }
                                                    } 
                                                     $qcategory = '';   
                                           $logicBlock .='</select>';                   
                                        $logicBlock .='</div>';
                                        $plush1 = ($logic['operation'] == '+')? 'selected': '';
                                        $mynesh1 = ($logic['operation'] == '-')? 'selected': '';
                                        $logicBlock .='<div class="form-group addOperation">
                                           <label class="font-weight-bold">Operation<span class="text-danger">*</span></label>
                                           <select class="form-control select2 Operations "  name="operation['.$group_id.']['.$logic['factor_id'].']['.$Examkey.']" >
                                               <option value="">Select</option>
                                               <option value="+" '. $plush1.'> + </option>
                                               <option value="-" '. $mynesh1.'> - </option>
                                           </select> 
                                        </div>';
                                        $lessthan = ($logic['logic'] == '<')? 'selected': '' ;
                                        $greterthan = ($logic['logic'] == '>')? 'selected': '';
                                        $equal = ($logic['logic'] == '=')? 'selected': '';
                                        $trueFlase = ($logic['logic'] == 'true')? 'selected': '' ;
                                        $logicBlock .='<div class="form-group addlogic" style="display: inline-grid;">
                                           <label class="font-weight-bold">Logic<span class="text-danger">*</span></label>
                                           <select class="form-control select2 logic"  name="logic['.$group_id.']['.$logic['factor_id'].']['.$Examkey.']" >
                                                <option value="">Select</option>
                                                <option value="<" '.$lessthan.'> < </option>
                                                <option value=">"  '. $greterthan .'> > </option>
                                                <option value="=" '. $equal.'> = </option>                                
                                                <option value="true" '.$trueFlase.'><span class="truelabel"> True / False</span></option>
                                           </select> 
                                        </div>';
                                        $logicBlock .='<div class="form-group addtextblock addaddcomparison2 ">
                                           <label class="font-weight-bold">Comparison 2</label>
                                           <select class="form-control select2 comparison2" multiple name="comparison2['.$group_id.']['.$logic['factor_id'].']['.$Examkey.'][]" >
                                            <option value="">Select</option> '; $questionIds = array(); 
                                               foreach($Newquestions AS $ques){
                                                    $qcategory = '';
                                                    $comp1 = explode(",",$logic['comparison2']);
                                                    $qcategory = ($ques['category'] == 3)? 'true': '';
                                                    $oldselect = (in_array($ques['id'],$comp1) )? 'selected': '';
                                                    $trueflase2 = ($ques['category'] == 3)? '( True & False )': '';
                                                    if(!in_array($ques['id'], $questionIds)){ 
                                                        $questionIds[] = $ques['id']; 
                                                         $logicBlock .='<option  value="'.$ques['id'] .'" data-quecategory="'.$ques['category'] .'"   '.$oldselect .' >('.$ques['uniqueid'].') '. $ques['name'] .' '.$trueflase2 .' </option>';
                                                    }
                                               }                                                
                                            $logicBlock .='</select> 
                                            <input type="number" name="comparison2Val['.$group_id.']['.$logic['factor_id'].']['.$Examkey.']" placeholder="Enter value" value="'.$logic['comparison2mark'].'" class="form-control comparison2Input">
                                        </div>';
                                        $plus2 = ($logic['operation2'] == '+')? 'selected': '';
                                        $mynesh2 = ($logic['operation2'] == '-')? 'selected': '';
                                        $logicBlock .='<div class="form-group addOperation">
                                           <label class="font-weight-bold">Operation <span class="text-danger">*</span></label>
                                           <select class="form-control select2 Operations Operations2 "  name="operation2['.$group_id.']['.$logic['factor_id'].']['.$Examkey.']" >
                                               <option value="">Select</option>
                                               <option value="+" '.$plus2.' > + </option>
                                               <option value="-" '.$mynesh2 .' > - </option>
                                           </select> 
                                        </div>';
                                        $logicBlock .='<span class="msgbox" style="display:none;">
                                            <div class="form-group">
                                                <label class="font-weight-bold">True Text<span class="text-danger">*</span></label>
                                                
                                                <textarea class="form-control addtext addtext1" rows="2" placeholder="True Text" name="textmsg2['.$group_id.']['.$logic['factor_id'].']['.$Examkey.']" >'.$logic['textmsg1'].'</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="font-weight-bold">False Text<span class="text-danger">*</span></label>
                                               
                                                <textarea class="form-control addtext addtext2" rows="2" placeholder="False Text" name="textmsg3['.$group_id.']['.$logic['factor_id'].']['.$Examkey.']" >'.$logic['textmsg2'].' </textarea>
                                            </div>
                                        </span>';
                                        $logicBlock .='<div class="form-group addtextblock">
                                           <label class="font-weight-bold">Add Text<span class="text-danger">*</span></label>
                                          
                                           <textarea class="form-control addtext addtext3" style="margin-bottom: 28px;" rows="1" placeholder="Add Text" name="textmsg1['.$group_id.']['.$logic['factor_id'].']['.$Examkey.']" >'.$logic['textmsg1'].'</textarea>
                                        </div>';
                                        $logicBlock .='<button type="button" class="icon-btn btn--danger  text-center text-nowrap remove  my-5" style="height: 52px;"><i class="las la-minus-circle"></i></button>';
                                    $logicBlock .='</div> 
                                <div class="Copyappend copyBlock"></div>
                            </div>'; 
                            $Examkey++; //$Examkey = $examkey + 1; @endphp
                          }     
                    } 
                }else{ 
                    //$logicBlock .='<h4 class="text-center text-danger">No old logic found <br/> <small class="text-center text-danger">Add new logic click add more options</small></h4><br/>';
                }                  
                $logicBlock .='<div class="append "></div>
                <div class="form-group text-right">
                    <button type="button" class="btn btn--success mt-2" data-key="'.$factor_id.'" data-examkey="'.$Examkey.'" data-groupid ="'.$group_id.'"  id="add"> <i class="las la-plus"></i>Add more options</button>
                </div>
            </div>
        </div>';
        return $logicBlock;
    }
    
    public function examLogicsstore(Request $request){
        //dd($request->all()); 
        if(!empty($request->oldexam)){
            Examlogic::whereIn('id',$request->oldexam)->delete();    
        }
        
        $oldExamCount =0;
        $groupArray = array();
        $factorArray = array();
        if(!empty($request->groupid) ) {  
            foreach($request->groupid AS  $groups_id){
                $group_id =(int)$groups_id;
                foreach($request->factorid[$group_id] AS  $factors_id){
                    $factor_id = (int)$factors_id;

                    if(!empty($request->comparison1[$group_id][$factor_id])){
                        // var_dump($request->comparison1[$group_id][$factor_id]);
                        // exit; 
                        foreach($request->comparison1[$group_id][$factor_id] as $innerkey => $comp1){
                            if($oldExamCount > 0){
                               // Examlogic::where("exam_id",$request->examid)->where("group_id",$group_id)->where("factor_id",$factor_id)->delete();     
                            } $oldExamCount++;                           
                             $exam = new Examlogic();                            
                            //dd($exam);
                            $exam->exam_id = $request->examid;
                            $exam->group_id = $group_id;
                            $exam->factor_id = $factor_id;
                            if(is_array($comp1)){
                                $exam->comparison1=implode(",",$comp1);
                            }else{
                                 $exam->comparison1 = $comp1;
                            }
                            // operation 1
                                $exam->operation = ( !empty($request->operation[$group_id][$factor_id][$innerkey]) )? $request->operation[$group_id][$factor_id][$innerkey] : '';
                            // Logic
                                $exam->logic = $request->logic[$group_id][$factor_id][$innerkey];
                            // comparison2
                                if(!empty($request->comparison2[$group_id][$factor_id][$innerkey])){
                                    if(is_array($request->comparison2[$group_id][$factor_id][$innerkey])){
                                        $exam->comparison2 = implode(",",$request->comparison2[$group_id][$factor_id][$innerkey]);
                                    }else{
                                        $exam->comparison2 = $request->comparison2[$group_id][$factor_id][$innerkey];
                                    }
                                }else{
                                    $exam->comparison2 = '';
                                }
                            // operation 2
                            $exam->operation2 = (!empty($request->operation2[$group_id][$factor_id][$innerkey]))?
                                 $request->operation2[$group_id][$factor_id][$innerkey] : ''; 
                            // comparison 2 Marks
                            $exam->comparison2mark = (!empty($request->comparison2Val[$group_id][$factor_id][$innerkey]))?
                                 $request->comparison2Val[$group_id][$factor_id][$innerkey]: '' ; 
                            // text box one
                                
                                $exam->textmsg1 = (!empty($request->textmsg1[$group_id][$factor_id][$innerkey]))? $request->textmsg1[$group_id][$factor_id][$innerkey]: $request->textmsg2[$group_id][$factor_id][$innerkey] ;
                                $exam->textmsg2 = (!empty($request->textmsg3[$group_id][$factor_id][$innerkey]))? $request->textmsg3[$group_id][$factor_id][$innerkey]: '';
                            // isCheck
                                $exam->isCheck =  (!empty($request->isCheck[$group_id][$factor_id][$innerkey]))?
                                        $request->isCheck[$group_id][$factor_id][$innerkey] : '';
                            // facetor_description
                                        // dd($request->facetor_description[$group_id][$factor_id]);
                                $exam->facetor_description = (!empty($request->facetor_description[$group_id][$factor_id]))? $request->facetor_description[$group_id][$factor_id] : '';
                                    
                            $savemsg = $exam->save();
                        } 
                    }elseif(!empty($request->facetor_description[$group_id][$factor_id])){
                        // var_dump('done');
                        // exit;
                        $exam = new Examlogic();
                        $exam->exam_id = $request->examid;
                        $exam->group_id = $group_id;
                        $exam->factor_id = $factor_id;
                        $exam->comparison1='';
                        $exam->operation = '';
                        $exam->logic = '';
                        $exam->comparison2 = '';
                        $exam->operation2 = '';
                        $exam->comparison2mark = '';
                        $exam->textmsg1 = '';
                        $exam->textmsg2 = '';
                        $exam->isCheck = '';
                        $exam->facetor_description = $request->facetor_description[$group_id][$factor_id];
                        $exam->save();
                    }
                }
                
            }
                
       }
        
       return redirect()->route('admin.exam.all');
    }

    public function examReports($examid,$type="CSV")
    {

        $exam = Exam::with('questions')->where('id',$examid)->get()->first();
        
        $categories_list = array();

        $questions_id = array();
        foreach ($exam->questions as $key => $value) {
            $question = Questions::with('questioncategories')->findOrFail($value->id);
            $questions_id[] = $value->id;
            $selected_cat = $question->questioncategories->pluck('category_id')->toArray();
            $questioncategories = Category::whereIn('id',$selected_cat)->get();

            foreach ($questioncategories as $key => $category) {
                $categories_list[$category->id]['label'] = $category->name; 
            }
        }

        if (!empty($categories_list)) {

            if ($examid) {
                if ($type == 'CSV') {
                    return Excel::download(new UsersExport($categories_list,$examid,$exam,true), 'exam-report.csv');
                }elseif ($type == 'PDF') {
                    //return Excel::download(new UsersExport($categories_list,$examid), 'exam-report.csv');
                    return (new UsersExport($categories_list,$examid,$exam,false))->download('exam-report.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
                }
                else {
                    return Excel::download(new UsersExport($categories_list,$examid,$exam,true), 'exam-report.xlsx');
                }
            }
            $notify[]=['error','Data Not Found'];
            return back()->withNotify($notify);
        }else{
            $notify[]=['error','Categories Data Not Found'];
            return back()->withNotify($notify);
        }

    }

    public function examViewReports($examid)
    {

        $exam = Exam::with('questions')->where('id',$examid)->get()->first();
        $categories_list = array();
        
        foreach ($exam->questions as $key => $value) {
            $question = Questions::with('questioncategories')->findOrFail($value->id);
            
            $selected_cat = $question->questioncategories->pluck('category_id')->toArray();
            $questioncategories = Category::whereIn('id',$selected_cat)->get();

            foreach ($questioncategories as $key => $category) {
                $categories_list[$category->id]['label'] = $category->name; 
            }
        }
        $page_title = "Results";
       
        $empty_message = 'No certificate available';

        if (!empty($categories_list)) {
             $consistency = array();
             $consistencytotal = array();
            if ($examid) {
               
                $resultsJson = Result::where('exam_id',$examid)->select("result")->get();
                // dd($getresultsJsondata);
                $results = fractal(Result::with('exam','user')->where('exam_id',$examid)->orderBy('id','desc')->get() , new ResultTransformer($categories_list,$examid))->toArray();

                foreach($resultsJson as $Rkey => $result){
                    if(!empty($resultsJson[0]["result"])){
                    $question_list = json_decode($resultsJson[$Rkey]["result"],true);
                    
                    $consistency = array();
                    if($exam->gender_id == 1 ){  /* male array */
                        $mainArray = array('582' , '572' , '571' , '557' , '548' , '538' , '537' , '526');
                        $reverseArray = array('507R' , '509R' , '532R' , '597R' , '596R' , '577R' , '590R' , '510R'); 
                    }else{  /* female array */
                        $mainArray = array('182' , '172' , '171' , '157' , '148' , '138' , '137' , '26');
                        $reverseArray = array('107R' , '109R' , '132R' , '197R' , '196R' , '177R' , '190R' , '110R');
                    }
                    if(!empty($question_list['questions_score'])){
                        foreach($question_list['questions_score'] as $questionAns){
                            if(!empty($questionAns['test_unique_id'])){
                                $originalId = $questionAns['test_unique_id'];
                                if( in_array($originalId,$mainArray) ){ 
                                    $originalkey = array_search($originalId,$mainArray);
                                    $reversevalue =  $reverseArray[$originalkey];
                                    $originalkey = array_search($reversevalue,$reverseArray);
                                    //get key
                                    $Rmarchkey = array_search($reversevalue,array_column($question_list['questions_score'], 'test_unique_id'));
                                    // reindex
                                    $new_result = array_combine(range(0, 
                                                count($question_list['questions_score']) + (0-1)),
                                                array_values($question_list['questions_score']));
                                    (int)$reverseval = $new_result[$Rmarchkey]["test_select_option"];
                                    (int)$originalval = $questionAns["test_select_option"];
                                    (int)$totaloption = $questionAns['total_option'];
                                   // echo ' : '.(int)$reverseval.' - '.((int)$totaloption.' - '.(int)$originalval);

                                    $Ans = (int)$reverseval - ((int)$totaloption - (int)$originalval);
                                    if($Ans ==  1){
                                        $consistency[] = $Ans;
                                    }
                                }
                            }    
                        }
                    }
                    $consistencytotal[] = array_sum($consistency);
                }
               }
               $examid = $results['data'][0]['examid'];
               return view('admin.exam.report',compact('examid','results','categories_list','page_title','consistencytotal'));
            }

            $notify[]=['error','Data Not Found'];    
            return back()->withNotify($notify);
        
        }else{
            
            $notify[]=['error','Categories Data Not Found'];
            return back()->withNotify($notify);
        }

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
                    
                    return view('admin.exam.viewreport',compact('page_title','result'));
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
                return view('admin.exam.viewreport',compact('test_id','page_title','exam','result','result_group','new_examLogic','scoreTrue','new_questionAns','new_filter_question','new_question'));
            }
        }
         
    }
   
    public function certificate()
    {
        $page_title = "Test Certificate template";
        $certificate = Certificate::first();
        $empty_message = 'No certificate available';
        return view('admin.exam.certificate',compact('page_title','certificate','empty_message'));
    }
    public function certificateUpdate(Request $request)
    {
        $request->validate([
            'body' => 'required'
        ]);
        $certificate = Certificate::first();
        $certificate->body = $request->body;
        $certificate->update();
        $notify[]=['success','Certificate updated successfully'];
        return back()->withNotify($notify);
    }

    public function downloadResult(){
        
        $all_categories = Category::all()->toarray();
        
        return Excel::download(new ResultOfAllUser($all_categories, true), 'Results.xlsx');
    }

    public function delete_result($result_id, $exam_id){
        Result::where('id', $result_id)->delete();
        // $this->examViewReports($exam_id);
        return redirect()->route('admin.exam.viewreport', ['id' => $exam_id]);
        // return Redirect::to('http://heera.it');
    }
}