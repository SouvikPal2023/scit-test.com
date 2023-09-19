<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Score;
class ScoreController extends Controller
{
    public function allScore(Request $request)
    {
        if($request->search){
            $search = $request->search;
            $page_title = "Search Results '$search'";
            $score = Score::where('scorevalue','LIKE',"%$search%")->paginate(15);
        } else {
            $page_title = 'All Score';
            $score = Score::paginate(15);
        }
        $empty_message = 'No Score available';
        return view('admin.score.all',compact('page_title','score','empty_message'));
    }
    public function addScore()
    {
        $page_title = 'Add New Score';
        $score = Score::get();
        return view('admin.score.addScore',compact('page_title','score'));
    }
     public function store(Request $request)
    {	

     
        if(!empty($request->linker)){
	        foreach ($request->linker as $key => $value) {
	        	$updatescore = Score::where('id',$key)->first();
	        	if($updatescore){
	        		$updatescore->scorecategory = '1';
			        if($value['scorevalue'] != ''){
		        		foreach ($value as $key1 => $row) {
		        			if($row == ''){
		        				$updatescore->delete();
		        			}
		        			if($key1 == 'scorevalue'){
		        				$updatescore->scorevalue = $row;
		        			}
		        			if($key1 == 'scorenumber'){
		        				$updatescore->scorenumber = $row;
		        			}
		        		}
			        	$savemsg = $updatescore->update();
			        }
			        $delete = Score::where('id','!=',$key)->where('scorecategory',1)->delete();
	        	}else{
	        		$score = new Score();
		        	$score->scorecategory = '1';
			        if($value['scorevalue'] != ''){
		        		foreach ($value as $key1 => $row) {
		        			if($key1 == 'scorevalue'){
		        				$score->scorevalue = $row;
		        			}
		        			if($key1 == 'scorenumber'){
		        				$score->scorenumber = $row;
		        			}
		        		}
			        	$savemsg = $score->save();
			        }
	        	}
	        }
	    }
	    if(!empty($request->radio)){
	        foreach ($request->radio as $key => $value) {
	        	$updatescore = Score::where('id',$key)->first();
	        	if($updatescore){
	        		$updatescore->scorecategory = '2';
			        if($value['scorevalue'] != ''){
		        		foreach ($value as $key1 => $row) {
		        			if($key1 == 'scorevalue'){
		        				$updatescore->scorevalue = $row;
		        			}
		        			if($key1 == 'scorenumber'){
		        				$updatescore->scorenumber = $row;
		        			}
		        		}
			        	$savemsg = $updatescore->update();
			        }
			         $delete = Score::where('id','!=',$key)->where('scorecategory',2)->delete();
	        	}else{
	        		$score = new Score();
		        	$score->scorecategory = '2';
		        	if($value['scorevalue'] != ''){
		        		foreach ($value as $key1 => $row) {
		        			if($key1 == 'scorevalue'){
		        				$score->scorevalue = $row;
		        			}
		        			if($key1 == 'scorenumber'){
		        				$score->scorenumber = $row;
		        			}
		        		}
		        		$savemsg = $score->save();
		        	}
	        	}
	        }
	    }
	    if(!empty($request->truevalue)){
			foreach ($request->truevalue as $key => $value) {
	        	$updatescore = Score::where('id',$key)->first();
	        	if($updatescore){
	        		$updatescore->scorecategory = '3';
			        if($value['scorevalue'] != ''){
		        		foreach ($value as $key1 => $row) {
		        			if($key1 == 'scorevalue'){
		        				$updatescore->scorevalue = $row;
		        			}
		        			if($key1 == 'scorenumber'){
		        				$updatescore->scorenumber = $row;
		        			}
		        		}
			        	$savemsg = $updatescore->update();
			        }
	        	}
	        }
	    }
      /*  $score = new Score();
        $score->scorecategory = $request->scorecategory;
        $score->scorevalue = $request->scorevalue;
        $score->scorenumber = $request->scorenumber;
        $savemsg = $score->save();*/
        if($savemsg) {
            $notify[] = ['success', 'Score Updated successfully'];
        }else{
            $notify[] = ['success', 'Score Updated Fail.'];
        }
        return back()->withNotify($notify);
    }
    public function editScore($id)
    {
        $page_title = 'Edit Score';
        $score = Score::findOrFail($id);
        return view('admin.score.editScore',compact('page_title','score'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'scorecategory' => 'required',
            'scorevalue'     => 'required',
        ]);
        $score = Score::findOrFail($id);
        $score->scorecategory = $request->scorecategory;
        $score->scorevalue = $request->scorevalue;
        $score->scorenumber = $request->scorenumber;
        $score->update();
        $notify[]=['success','Test Updated successfully'];
        return back()->withNotify($notify);
    }
}