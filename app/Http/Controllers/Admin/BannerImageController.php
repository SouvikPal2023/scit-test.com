<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BannerImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class BannerImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['bannerlists'] = BannerImage::paginate('20');
        $data['page_title'] = "Banner Image List";
        return view('admin.page.banner.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = "Add New Banner Image";
        return view('admin.page.banner.insert',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $values = $request->validate([
            "title" => 'required|string',
            "banner_image" => 'nullable|image|mimes:jpeg,png,jpg,svg,gif,max:4000',
            "description" => 'nullable|string',
          
        ]);

        $banner = new BannerImage();
        if (isset($values['banner_image'])) {
            $values['banner_image'] = Storage::putFile('public/banner', new File($request->banner_image));
        }
        $banner->fill($values);
        
        // if ($request->hasfile('banner_image')) {
           
        //     $file = $request->file('banner_image');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time().'_main_'.'.'.$extension;
        //     $file->storeAs('public/banners/', $filename);
        //     $banner->banner_image = $filename;

        //         /* Thumbnail Image Start */
        //         $resize_filename = uniqid().'_resize_'.'.'.$extension;
        //         $banner_resize = storage_path('app/public/banners/banner_resize');

        //         $imgx = Image::make($file->getRealPath());
        //         $imgx->resize(null, 270, function ($constraint) {
        //             $constraint->aspectRatio();
        //         });
        //         $imgx->save($banner_resize.'/'. $resize_filename);
        //         $banner->banner_resize = $resize_filename;
        //         /* Thumbnail Image End */
        // }

        $banner->save();
        return redirect()->route('admin.banner.index')->with('success', 'Record added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          
        $bannerlists = BannerImage::find($id);
        $page_title = "Banner Image List";
        if (!$bannerlists) {
            return redirect()->route('admin.banner.index')->with('warning', 'Banner not found');
        }
        return view('admin.page.banner.edit',compact('bannerlists','page_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $banner=BannerImage::find($id);
        if (!$banner) {
            return redirect()->route('admin.banner.index')->with('warning', 'Banner not found');
        }
        $changed = false;
        $values = $request->validate([
            "title" => 'required|string',
            "banner_image" => 'nullable|image|mimes:jpeg,png,jpg,svg,gif,max:4000',
            "description" => 'nullable|string',
        ]);
       
        if ($request->banner_image) {
            if (!empty($banner->banner_image)) {
                Storage::delete($banner->banner_image);
            }

            $values['banner_image'] = Storage::putFile('public/banner', new File($request->banner_image));
        }

        $banner->fill($request->except('banner_image'));
        if (isset($values['banner_image'])) {
            $banner->banner_image = $values['banner_image'];
        }
      


        if ($banner->isDirty()) {
            $banner->save();
            $changed = true;
        }
           
        if (! $changed) {
            return redirect()->route('admin.banner.index')->with('warning', 'No Changes Found');
        }

        return redirect()->route('admin.banner.index')->with('success', 'Record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}