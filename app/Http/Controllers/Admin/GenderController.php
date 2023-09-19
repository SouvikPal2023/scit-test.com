<?php

namespace App\Http\Controllers\Admin;

use App\Gender;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenderController extends Controller
{
    public function allGender(Request $request)
    {
        if($request->search){
            $search = $request->search;
            $page_title = "Search Result of '$search'";
            $genders = Gender::where('name','LIKE',"%$search%")->paginate(15);
        } else {

            $page_title = 'All Genders';
            $genders = Gender::latest()->paginate(15);
        }
        $empty_message = 'No genders available';
        return view('admin.gender.all',compact('page_title','empty_message','genders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:genders',
            'short_details' => 'required'
        ]);

        $subject = new Gender();
        $subject->name = $request->name;
        $subject->slug = Str::slug($request->name);
        $subject->short_details = $request->short_details;
        $subject->status = $request->status ? 1:0;
        $subject->save();
        $notify[]=['success','Gender Created Successfully'];
        return back()->withNotify($notify);
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|unique:genders,name,'.$id,
            'short_details' => 'required'
        ]);

        $subject = Gender::findOrFail($id);
       // $subject->category_id = $request->category_id;
        $subject->name = $request->name;
        $subject->short_details = $request->short_details;
        $subject->status = $request->status ? 1:0;
        $subject->save();
        $notify[]=['success','Gender Updated Successfully'];
        return back()->withNotify($notify);
    }
}
