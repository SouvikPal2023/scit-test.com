<?php



namespace App\Http\Controllers\Admin;



use App\Category;
use App\Groupfactor;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;



class CategoryController extends Controller

{

    public function allCategories(Request $request)

    {
        $groupfactors = Groupfactor::where('hide',0)->get();
        //dd($groupfactors); 
        if($request->search){
            $search = $request->search;
            $page_title = "Search Result of '$search'";
            $categories = Category::with('groupfactor')->where('hide',0)->where('name','LIKE',"%$search%")->paginate(15);

        } else {

            $page_title = 'All Factors';
            $categories = Category::with('groupfactor')->where('hide',0)->orderBy('order','ASC')->get();
            // $categories = Category::with('groupfactor')->where('hide',0)->orderBy('order','ASC');

        }

        $empty_message = 'No Factors available';

        return view('admin.category.all',compact('page_title','empty_message','categories','groupfactors'));

    }



    public function store(Request $request)

    {

        $request->validate([
            'name' => 'required|unique:categories'
        ]);

        $category = new Category();

        $category->name = $request->name;

        $category->slug = Str::slug($request->name);

        $category->status = $request->status ? 1:0;
        $category->groupfactor_id = $request->groupname;
        $category->save();

        $notify[]=['success','Factor Created Successfully'];

        return back()->withNotify($notify);

    }

    public function update(Request $request,$id)

    {

        $request->validate([
            'name' => 'required|unique:categories,name,'.$id
        ]);

        $category = Category::findOrFail($id);

        $category->name = $request->name;

        $category->slug = Str::slug($request->name);

        $category->status = $request->status ? 1:0;
        $category->groupfactor_id = $request->groupname;
        $category->save();

        $notify[]=['success','Factor Updated Successfully'];

        return back()->withNotify($notify);

    }



    public function delete($id)
    {

        $category = Category::findOrFail($id);
        $category->hide = 1;
        $category->save();
        $notify[]=['success','Factor delete Successfully'];
        return back()->withNotify($notify);

    }

    public function update_order(Request $request){

        $factororder = Category::find($request->id)->update(['order' => $request->order]);
        if($factororder) {
            $notify = ['Updated Successfully'];
        }else{
            $notify = ['Error'];
        }
        return $notify;
    }

}

