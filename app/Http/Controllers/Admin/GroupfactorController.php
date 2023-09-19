<?php



namespace App\Http\Controllers\Admin;



use App\Groupfactor;

use Illuminate\Support\Str;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;



class GroupfactorController extends Controller

{

    public function allgroupfactor(Request $request)

    {

        if($request->search){
            $search = $request->search;
            $page_title = "Search Result of '$search'";
            // $categories = Groupfactor::where('hide',0)->where('name','LIKE',"%$search%")->paginate(15);
            $categories = Groupfactor::where('hide',0)->where('name','LIKE',"%$search%")->orderBy('order',"ASC")->get();

        } else {

            $page_title = 'All Group Factors';
            // $categories = Groupfactor::where('hide',0)->latest()->paginate(15);
            $categories = Groupfactor::where('hide',0)->orderBy('order',"ASC")->get();
        }

        $empty_message = 'No Factors available';

        return view('admin.groupfactor.all',compact('page_title','empty_message','categories'));

    }



    public function store(Request $request)

    {

        $request->validate([
            'name' => 'required|unique:categories'
        ]);


        $Groupfactor = new Groupfactor();

        $Groupfactor->name = $request->name;

        $Groupfactor->slug = Str::slug($request->name);

        $Groupfactor->status = $request->status ? 1:0;

        $Groupfactor->save();

        $notify[]=['success','Factor Created Successfully'];

        return back()->withNotify($notify);

    }

    public function update(Request $request,$id)

    {

        $request->validate([
            'name' => 'required|unique:categories,name,'.$id
        ]);

        $Groupfactor = Groupfactor::findOrFail($id);

        $Groupfactor->name = $request->name;

        $Groupfactor->slug = Str::slug($request->name);

        $Groupfactor->status = $request->status ? 1:0;

        $Groupfactor->save();

        $notify[]=['success','Factor Updated Successfully'];

        return back()->withNotify($notify);

    }



    public function delete($id)
    {

        $Groupfactor = Groupfactor::findOrFail($id);
        $Groupfactor->hide = 1;
        $Groupfactor->save();
        $notify[]=['success','Factor delete Successfully'];
        return back()->withNotify($notify);

    }

    public function update_order(Request $request){

        $factororder = Groupfactor::find($request->id)->update(['order' => $request->order]);
        if($factororder) {
            $notify = ['Updated Successfully'];
        }else{
            $notify = ['Error'];
        }
        return $notify;
    }

}

