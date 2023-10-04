<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\NewPage;
use App\Testimonial;
use App\Faq;
use App\BannerImage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'All Pages';
        $data['pages'] = NewPage::orderByDesc('created_at')->get();

        return view('admin.page.pageList', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = 'Create Page';
        $data['testimonials'] = Testimonial::orderByDesc('created_at')->get();

        $data['faqs'] = Faq::orderByDesc('created_at')->get();

        $data['banners'] = BannerImage::orderByDesc('created_at')->get();


        //  $data['banners'] = Banner::orderByDesc('created_at')->get();

        //  $data['faqs'] = Faq::orderByDesc('created_at')->get();

        return view('admin.page.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());



        $values = $request->validate([

            'name' => 'required|unique:new_pages,name',
            'template'=>'required',

            'meta_keyword' => 'nullable|string|max:200',

            'seo_title' => 'nullable|string|max:200',

            'meta_content' => 'nullable|string|max:200',
            //banner module
            'banner_heading1' => 'nullable|string|max:200',

            'banner_heading2' => 'nullable|string|max:200',

            'banner_detail' => 'nullable|string',

            'banner_button' => 'nullable|string',

            'banner_url' => 'nullable|string',
            'banner_id' => 'nullable',




            //  youtube Module



            'youtube' => 'nullable|string',

            'youtube_detail' => 'nullable|string',

            'youtube_button' => 'nullable|string',

            'youtube_url' => 'nullable|string',

            'youtube_button2' => 'nullable|string',

            'youtube_url2' => 'nullable|string',

            // why SCIT

            'why_heading' => 'nullable|string',

            'why_sub_heading1' => 'nullable|string',

            'why_sub_desc1' => 'nullable|string',
            'why_sub_heading2' => 'nullable|string',
            'why_sub_desc2' => 'nullable|string',
            'why_sub_heading3' => 'nullable|string',
            'why_sub_desc3' => 'nullable|string',
            'why_sub_heading4' => 'nullable|string',
            'why_sub_desc4' => 'nullable|string',



            // FAQ Module

            'testi_heading' => 'nullable|string',

            'faq_heading' => 'nullable|string',

            'faq_id' => 'nullable',
            'testimonial_id' => 'nullable',

//PRIVACY PAGE
'privacy_content'=>'nullable|string',
//CONTACT PAGE
'contact_section_heading'=>'nullable|string',
'contact_sub_heading'=>'nullable|string',
'contact_content'=>'nullable|string',
//FAQ PAGE
'faq_faq_id'=>'nullable',





        ]);







        $page = new NewPage();
        $page->fill($values);

        $page->slug = Str::slug($request->name);









        $page_sections = [


            //banner module
            'banner_heading1' => $request->banner_heading1,

            'banner_heading2' => $request->banner_heading2,

            'banner_detail' => $request->banner_detail,

            'banner_button' => $request->banner_button,

            'banner_url' => $request->banner_url,
            'banner_id' => $request->banner_id,




            //  youtube Module



            'youtube' => $request->youtube,

            'youtube_detail' => $request->youtube_detail,

            'youtube_button' => $request->youtube_button,

            'youtube_url' => $request->youtube_url,
            'youtube_button2' => $request->youtube_button2,

            'youtube_url2' => $request->youtube_url2,


            // why SCIT

            'why_heading' => $request->why_heading,

            'why_sub_heading1' => $request->why_sub_heading1,

            'why_sub_desc1' => $request->why_sub_desc1,
            'why_sub_heading2' => $request->why_sub_heading2,
            'why_sub_desc2' => $request->why_sub_desc2,
            'why_sub_heading3' => $request->why_sub_heading3,
            'why_sub_desc3' => $request->why_sub_desc3,
            'why_sub_heading4' => $request->why_sub_heading4,
            'why_sub_desc4' => $request->why_sub_desc4,



            // FAQ Module

            'testi_heading' => $request->testi_heading,

            'faq_heading' => $request->faq_heading,

            'faq_id' => $request->faq_id,
            'testimonial_id' => $request->testimonial_id,
//PRIVACY PAGE
'privacy_content'=>$request->privacy_content
,
//CONTACT PAGE
'contact_section_heading'=>$request->contact_section_heading,
'contact_sub_heading'=>$request->contact_sub_heading,
'contact_content'=>$request->contact_content,
//FAQ PAGE
'faq_faq_id'=>$request->faq_faq_id,
            

        ];









        $page->description = json_encode($page_sections);



        $page->save();



        return redirect()->route('admin.page.index')->with('success', 'Record has been created successfully');
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
    public function edit(NewPage $page)
    {
        $data['page_title'] = 'Edit Page';
        $data['page']=$page;
        $data['testimonials'] = Testimonial::orderByDesc('created_at')->get();

        $data['faqs'] = Faq::orderByDesc('created_at')->get();

        $data['banners'] = BannerImage::orderByDesc('created_at')->get();

        $data['page_content'] = json_decode($page->description);



         //dd($data);



        return view('admin.page.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $page=NewPage::find($id);
        $page_content = json_decode($page->description);

      $changed = false;
     //dd($request->all());
      $values= $request->validate([

            'name' => 'required|unique:new_pages,name,'.$page->id,
            'template'=>'required',
            'meta_keyword' => 'nullable|string|max:200',

            'seo_title' => 'nullable|string|max:200',

            'meta_content' => 'nullable|string|max:200',
            //banner module
            'banner_heading1' => 'nullable|string|max:200',

            'banner_heading2' => 'nullable|string|max:200',

            'banner_detail' => 'nullable|string',

            'banner_button' => 'nullable|string',

            'banner_url' => 'nullable|string',
            'banner_id' => 'nullable',




            //  youtube Module



            'youtube' => 'nullable|string',

            'youtube_detail' => 'nullable|string',

            'youtube_button' => 'nullable|string',

            'youtube_url' => 'nullable|string',

            'youtube_button2' => 'nullable|string',

            'youtube_url2' => 'nullable|string',

            // why SCIT

            'why_heading' => 'nullable|string',

            'why_sub_heading1' => 'nullable|string',

            'why_sub_desc1' => 'nullable|string',
            'why_sub_heading2' => 'nullable|string',
            'why_sub_desc2' => 'nullable|string',
            'why_sub_heading3' => 'nullable|string',
            'why_sub_desc3' => 'nullable|string',
            'why_sub_heading4' => 'nullable|string',
            'why_sub_desc4' => 'nullable|string',



            // FAQ Module

            'testi_heading' => 'nullable|string',

            'faq_heading' => 'nullable|string',

            'faq_id' => 'nullable',
            'testimonial_id' => 'nullable',
            
//PRIVACY PAGE
'privacy_content'=>'nullable|string',
//CONTACT PAGE
'contact_section_heading'=>'nullable|string',
'contact_sub_heading'=>'nullable|string',
'contact_content'=>'nullable|string',
//FAQ PAGE
'faq_faq_id'=>'nullable',

        ]);
        //dd($page);


        //$page=Page::where('id', $id)->first();



        $page->fill($values);

        $page->slug = Str::slug($request->name);

      


        $page_sections = [



              //banner module
              'banner_heading1' => $request->banner_heading1,

              'banner_heading2' => $request->banner_heading2,
  
              'banner_detail' => $request->banner_detail,
  
              'banner_button' => $request->banner_button,
  
              'banner_url' => $request->banner_url,
              'banner_id' => $request->banner_id,
  
  
  
  
              //  youtube Module
  
  
  
              'youtube' => $request->youtube,
  
              'youtube_detail' => $request->youtube_detail,
  
              'youtube_button' => $request->youtube_button,
  
              'youtube_url' => $request->youtube_url,
              'youtube_button2' => $request->youtube_button2,
  
              'youtube_url2' => $request->youtube_url2,
  
  
              // why SCIT
  
              'why_heading' => $request->why_heading,
  
              'why_sub_heading1' => $request->why_sub_heading1,
  
              'why_sub_desc1' => $request->why_sub_desc1,
              'why_sub_heading2' => $request->why_sub_heading2,
              'why_sub_desc2' => $request->why_sub_desc2,
              'why_sub_heading3' => $request->why_sub_heading3,
              'why_sub_desc3' => $request->why_sub_desc3,
              'why_sub_heading4' => $request->why_sub_heading4,
              'why_sub_desc4' => $request->why_sub_desc4,
  
  
  
              // FAQ Module
  
              'testi_heading' => $request->testi_heading,
  
              'faq_heading' => $request->faq_heading,
  
              'faq_id' => $request->faq_id,
              'testimonial_id' => $request->testimonial_id,


             //PRIVACY PAGE
'privacy_content'=>$request->privacy_content
,
//CONTACT PAGE
'contact_section_heading'=>$request->contact_section_heading,
'contact_sub_heading'=>$request->contact_sub_heading,
'contact_content'=>$request->contact_content,
//FAQ PAGE
'faq_faq_id'=>$request->faq_faq_id,


        ];









        $page->description = json_encode($page_sections);





        if ($page->isDirty()) {

            $page->save();

            $changed = true;

        }





        if (!$changed) {



            return redirect()->route('admin.page.index')->with('warning', 'No Changes Found');

        }





        return redirect()->route('admin.page.index')->with('success','Record has been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewPage $page)
    {
        $page->delete();

        return redirect()->back()->with('success','Record deleted successfully');
    }

    public function change($id)

    {

        $page = NewPage::where('id', $id)->first();

        if ($page->status == 'active') {

            $page->status = 'inactive';
        } else {

            $page->status = 'active';
        }



        $page->save();





        return redirect()->back()->with('success', ' Status Changed successfully!');
    }
}
