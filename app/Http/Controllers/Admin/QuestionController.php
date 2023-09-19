<?php
namespace App\Http\Controllers\Admin;
use App\Exam;
use App\Options;
use App\Category;
use App\QuestionCategories;
use App\Questions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\QuestionImages;
use App\optionImages;
use App\Score;
use Illuminate\Support\Facades\Storage;
class QuestionController extends Controller
{
    public function addMcq($examid)
    {
        $page_title = 'Add Mcq Question';
        $exam = Exam::with('Questions.questionimages')->find($examid);
        $categories = Category::where('hide',0)->get();
        $scores = Score::all();
        return view('admin.question.addMcq',compact('page_title','exam','categories','scores'));
    }
    public function store(Request $request)
    {   
        
        $request->validate([
            'question'=> 'required',
            'categorymain' => 'required',
            // 'unique_id' => 'unique:questions',
            'choosecategory' => 'required'
        ]); 
        $unique_id_check = Questions::where('unique_id',$request->unique_id)->get(); 
        if(count($unique_id_check) > 0 && $unique_id_check[0]->unique_id != null ){
            $request->validate([
                'unique_id' => 'unique:questions'
            ]);   
        }   
        
        if(!empty($request->order)){
            $ordervalue = $request->order;
        }else{
            $ordervalue = 0;
        }
        $exam = Exam::findOrFail($request->examid);
        $marks = Questions::where('exam_id',$exam->id)->sum('marks');
        $newMark = $marks+$request->mark;
        
        $qtn = new Questions();
        $qtn->unique_id = (!empty($request->unique_id) )? $request->unique_id: '';
        $qtn->exam_id = $request->examid;
        $qtn->choosecategory = $request->choosecategory;
        $qtn->order = $ordervalue;
        $qtn->reverse = ($request->reverse == 1) ? 1 : 0;
        $qtn->categorymain = 0;
        // $qtn->categorymain = $request->categorymain;
        $qtn->conditionquetion = json_encode($request->conditionquetion);
        $qtn->question = $request->question;
        $qtn->marks = '0';
        $qtn->save();
        $qtn->id;
        // check unique id exist or not
        $adduniqueid = Questions::findOrFail($qtn->id);
        $checkUniqueId = Questions::where('unique_id',$qtn->id)->get();
        if(empty($adduniqueid->unique_id)){
            /*if(count($checkUniqueId) > 0){
                $adduniqueid->unique_id = $adduniqueid->id.'1'; 
                $adduniqueid->save();   
            }else{
                $adduniqueid->unique_id = $adduniqueid->id; 
                $adduniqueid->save();                   
            }*/
            if(count($checkUniqueId) > 0){
                $adduniqueid->unique_id = null; 
                // $adduniqueid->save();   
            }else{
                $adduniqueid->unique_id = $adduniqueid->id; 
            }
            $adduniqueid->save();                   
        }   
        

        if ($request->categorymain) {
            foreach ($request->categorymain as $key => $value) {
                $qty_cate = new QuestionCategories();
                $qty_cate->question_id = $qtn->id;
                $qty_cate->category_id = $value;
                $qty_cate->save();
            }
        }

        if(!empty($request->image)){
            foreach($request->image as $image) {
                $old = $exam->image ?? null;
                $imageUp = uploadImage($image, 'assets/images/question/', '850x560', $old, '400x250');
                $QuestionImages = new QuestionImages();
                $QuestionImages->question_id = $qtn->id;
                $QuestionImages->image = $imageUp;
                $QuestionImages->save();
            }
        }

        $i = 1;

        if($request->choosecategory == 3){
            $i=0;
            foreach($request->option_type_3 as $score){
                $op = new Options();
                $op->question_id = $qtn->id;
                $op->option = $request->option_type_score_3[$i];
                $op->correct_ans = $score;
                $i++;
                $op->save();
            }
        }

        if($request->choosecategory == 1){
            $i = 0;

            if ($request->reverse == 1){
               $request->option_type_1 = array_reverse($request->option_type_1);
            }
                
            foreach($request->option_type_1 as $key => $score){
                $op = new Options();
                $op->question_id = $qtn->id;
                $op->option = $request->option_type_score_1[$i];
                $op->score_id = $request->option_type_score_id_1[$i];
                $op->correct_ans = $score;
                $op->save();
                if(!empty($request->option_type_image_1)) {
                    if (array_key_exists($key,$request->option_type_image_1)) {
                        foreach ($request->option_type_image_1[$key] as $mcqimage)
                        {
                            $imageUp = uploadImage($mcqimage, 'assets/images/option/', '850x560', null, '400x250');
                            $optionImages = new optionImages();
                            $optionImages->option_id = $op->id;
                            $optionImages->image = $imageUp;
                            $optionImages->save();
                        }
                    }
                }
                $i++;
            }
        }

        if($request->choosecategory == 2){
            $k=0;
            foreach($request->option_type_2 as $key => $score){
                $op = new Options();
                $op->question_id = $qtn->id;
                $op->option = $request->option_type_score_2[$k];
                $op->correct_ans = $score;
                $op->save();
                $k++;
            }
        }
        $notify[]=['success','Question added successfully'];
        return back()->withNotify($notify);
    }

    public function imageRemove(Request $request){
        $Remove = QuestionImages::find($request->id);
        $oldimg = $Remove->image;
        $Remove->delete();
        //unlink(public_path('assets/images/question/'.$oldimg));
        if($Remove) {
            $notify = ['Image Deleted Successfully'];
        }else{
            $notify = ['Image Deleted Fail.'];
        }
        return  $notify;
    }
    public function optionimageRemove(Request $request){
        $optRemove = optionImages::find($request->id);
        $oldimg = $optRemove->image;
        $optRemove->delete();
        //unlink(public_path('assets/images/option/'.$oldimg));
        if($optRemove) {
            $notify = ['Image Deleted Successfully'];
        }else{
            $notify = ['Image Deleted Fail.'];
        }
        return  $notify;
    }


    public function update_order(Request $request){

        $qtn = Questions::find($request->id);
        $qtn->order = $request->order;
        // $qtn->unique_id = $request->unique_id;
        $qtn->save();
        if($qtn) {
            $notify = ['Updated Successfully'];
        }else{
            $notify = ['Error'];
        }
        return $notify;
    }

    public function editMcq($id)
    {
        $page_title = 'Edit Mcq Question ';
        $scores = Score::all();
        $qtn = Questions::with('options.optionsimages','questioncategories')->find($id);
       
        $get_option_image = $qtn->options->pluck('id');
        $score_id = $qtn->options->pluck('score_id');

        $op_images = array();
        if ($qtn->choosecategory == 1) {
           foreach ($get_option_image as $key => $opid) {
                $optionImages_arr = optionImages::where('option_id',$opid)->get();
                if (count($optionImages_arr) > 0) {
                   foreach ($optionImages_arr as $keyd => $value) {
                        if (!empty($value)) {
                            $imgdata['image'] = $value->image;
                            $imgdata['id'] = $opid;
                            $op_images[$score_id[$key]][] = $imgdata;
                        }else{
                            $op_images[$score_id[$key]] = array();
                        }
                    } 
                }else{
                    $op_images[$score_id[$key]] = array();
                }
                
            } 
        }

        $categories = Category::where('hide',0)->get();
        $exam = Exam::find($qtn->exam_id);
        $selected_cat = array();
        $selected_cat = $qtn->questioncategories->pluck('category_id')->toArray();
        
        $images = QuestionImages::where('question_id','=',$id)->get(['Questionimages.id as que_id','Questionimages.question_id','Questionimages.image']);
        return view('admin.question.editMcq',compact('page_title','exam','qtn','images','categories','scores','selected_cat','op_images'));

    }
    public function update(Request $request,$id)
    {   
        $question = Questions::find($id);
        if($request->choosecategory != 3){
            $request->validate([
                'question'=> 'required',
            ]);
        }
        if (!empty($question) && $request->unique_id != $question->unique_id){
            $request->validate([
                'unique_id' => 'required|unique:questions'
            ]);
        }
         $request->validate([
                'question'=> 'required',
                'categorymain' => 'required',
                'unique_id' => 'required',
                'choosecategory' => 'required',
            ]);
        

        
        
        $exam = Exam::findOrFail($request->examid);
        $qtn = Questions::findOrFail($id);

        if(!empty($request->order)){
            $ordervalue = $request->order;
        }else{
            $ordervalue = $qtn->order;
        }

        $get_old_cat = $qtn->choosecategory; 

        QuestionCategories::where('question_id',$id)->delete();

        if ($request->categorymain) {
            foreach ($request->categorymain as $key => $value) {
                $qty_cate = new QuestionCategories();
                $qty_cate->question_id = $id;
                $qty_cate->category_id = $value;
                $qty_cate->save();
            }
        }

        $marks = Questions::where('exam_id',$exam->id)->sum('marks');
        // if($request->mark != $qtn->marks){
        //     $newMark = $marks+$request->mark;
        //     if( $newMark > $exam->totalmark) {
        //         $notify[]=['error','Sorry! Can\'t update questions,exam total mark exceeded'];
        //         return back()->withNotify($notify);
        //     }
        // }
        if(!empty($request->image)){
            foreach($request->image as $image) {
                $old = $exam->image ?? null;
                $imageUp = uploadImage($image, 'assets/images/question/', '850x560', $old, '400x250');
                $QuestionImages = new QuestionImages();
                $QuestionImages->question_id = $id;
                $QuestionImages->image = $imageUp;
                $QuestionImages->save();
            }
        }
        $qtn->choosecategory = $request->choosecategory;
        $qtn->conditionquetion = $request->conditionquetion;
        $qtn->unique_id = $request->unique_id;
        $qtn->order = $ordervalue;
        $qtn->reverse = ($request->reverse == 1) ? 1 : 0;
        $qtn->exam_id = $request->examid;
        $qtn->question = $request->question;
        //$qtn->categorymain = $request->categorymain;
        $qtn->categorymain = 0;
        $qtn->marks = '1';
        $qtn->save();


        // if ($get_old_cat != $request->choosecategory || !empty($request->option_type_image_1)) {
        
            Options::where('question_id',$id)->delete();
            
            if($request->choosecategory == 3){
                $i=0;
                foreach($request->option_type_3 as $score){
                    $op = new Options();
                    $op->question_id = $qtn->id;
                    $op->option = $request->option_type_score_3[$i];
                    $op->correct_ans = $score;
                    $i++;
                    $op->save();
                }
            }

            if($request->choosecategory == 1){
                $i = 0;

                if ($request->reverse == 1){
                   $request->option_type_1 = array_reverse($request->option_type_1);
                }
                
                foreach($request->option_type_1 as $key => $score){
                    $op = new Options();
                    $op->question_id = $qtn->id;
                    $op->option = $request->option_type_score_1[$i];
                    $op->score_id = $request->option_type_score_id_1[$i];
                    $op->correct_ans = $score;
                    $op->save();

                    if(!empty($request->option_type_image_1)) {
                        if (array_key_exists($key,$request->option_type_image_1)) {
                            foreach ($request->option_type_image_1[$key] as $mcqimage)
                            {
                                $imageUp = uploadImage($mcqimage, 'assets/images/option/', '850x560', null, '400x250');
                                $optionImages = new optionImages();
                                $optionImages->option_id = $op->id;
                                $optionImages->image = $imageUp;
                                $optionImages->save();
                            }
                        }
                    }
                    $i++;
                }
            }

            if($request->choosecategory == 2){
                $k=0;
                foreach($request->option_type_2 as $key => $score){
                    $op = new Options();
                    $op->question_id = $qtn->id;
                    $op->option = $request->option_type_score_2[$k];
                    $op->correct_ans = $score;
                    $op->save();
                    $k++;
                }
            }
        // }
        $notify[]=['success','Question Updated successfully'];
        return back()->withNotify($notify);
    }
    public function remove($id)
    {
        $qtn = Questions::findOrFail($id);
        Options::where('question_id',$qtn->id)->delete();
        $qtn->delete();
        $notify[]=['success','Question has been removed'];
        return back()->withNotify($notify);
    }
    public function written($id)
    {
        $page_title = 'Add Written Questions';
        $exam = Exam::findOrFail($id);
        return view('admin.question.writtenQuestion',compact('page_title','exam'));
    }
    public function writtenStore(Request $request,$id)
    {
        $request->validate([
            'question'=>'required',
            'categorymain' => 'required',
            'unique_id' => 'required|unique:questions',
            'choosecategory' => 'required'
           // 'mark' => 'required|numeric|min:0'
        ]);
        $qtn = new Questions();
        $qtn->exam_id = $id;
        $qtn->question = $request->question;
        $qtn->marks = '1';
        $qtn->written_ans = $request->answer;
        $qtn->status = $request->status ? 1:0;
        $qtn->save();
        $notify[]=['success','Question Added successfully'];
        return back()->withNotify($notify);
    }
    public function writtenEdit($id)
    {
        $page_title = 'Add Written Questions';
        $qtn = Questions::findOrFail($id);
        return view('admin.question.writtenQuestionEdit',compact('page_title','qtn'));
    }
    public function writtenUpdate(Request $request,$id)
    {
        $request->validate([
            'question'=>'required',
            'categorymain' => 'required',
            'unique_id' => 'required|unique:questions',
            'choosecategory' => 'required'
           // 'mark' => 'required|numeric|min:0'
        ]);
        $qtn = Questions::findOrFail($id);
        $qtn->question = $request->question;
        $qtn->marks = '1';
        $qtn->written_ans = $request->answer;
        $qtn->status = $request->status ? 1:0;
        $qtn->update();
        $notify[]=['success','Question Updated successfully'];
        return back()->withNotify($notify);
    }

    public function indexUpdate(Request $request){
         

        $validator = \Validator::make($request->all(), [ 
            'unique_id' => 'required'
        ]);

        $qtn = Questions::find($request->quest_id);

        /*if ($validator->fails()) {
            return [
                'status' => 0, 
                'message' => 'Index id could not be empty',
                'question_value' => $qtn->unique_id
            ];
        }*/

        $validator2 = \Validator::make($request->all(), [ 
            'unique_id' => 'unique:questions'
        ]);
        if ($validator2->fails() && !empty($request->unique_id) ) {
            return [
                'status' => 0, 
                'message' => 'The unique id has already been taken',
                'question_value' => $qtn->unique_id
            ];
        }
        
        if($qtn) {
            $qtn->unique_id = $request->unique_id;
            $qtn->save();
            return [
                'status' => 1, 
                'message' => 'The unique id Updated',
            ];
        }else{
            return [
                'status' => 0, 
                'message' => 'Error',
                'question_value' => $qtn->unique_id
            ];
        }
        return $notify;
    }

}
