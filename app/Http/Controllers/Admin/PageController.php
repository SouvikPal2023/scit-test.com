<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\NewPage;
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
      $data[ 'page_title'] = 'All Pages';
        $data['pages'] = NewPage::orderByDesc('created_at')->get();

        return view('admin.page.pageList',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data[ 'page_title'] = 'Create Page';

       //  $data['banners'] = Banner::orderByDesc('created_at')->get();

       //  $data['faqs'] = Faq::orderByDesc('created_at')->get();

       return view('admin.page.create',$data);
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

      //dd(auth()->user()->id);

      $values=$request->validate([

        'name'=>'required|unique:pages,name',

        'meta_keyword'=>'nullable|string|max:200',

        'seo_title'=>'nullable|string|max:200',

        'meta_content'=>'nullable|string|max:200',

        'banner_heading1'=>'nullable|string|max:200',

        'banner_heading2'=>'nullable|string|max:200',

        'banner_detail' =>'nullable|string',

        'banner_button' => 'nullable|string',

        'banner_url' => 'nullable|string',
        'banner_id'=>'nullable',
    



        //  youtube Module



        'youtube' => 'nullable|string',

        'youtube_detail' => 'nullable|string',

        'youtube_button' => 'nullable|string',

        'youtube_url'=>'nullable|string',



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

        'faq_title' => 'nullable',

        'faq_content' => 'nullable|string',

        'faq_id' => 'nullable',



        // News Module

        'news_title' => 'nullable|string',

        'news_content' => 'nullable|string',

        'news_id' => 'nullable',



        // End Home Page



        //start Contact page

        'contact_heading'=>'nullable|string',

        'contact_content'=>'nullable|string',



        'contact_image1'=>'nullable|image|mimes:jpeg,png,jpg,svg,gif|max:4000',

        'image_name1'=>'nullable|string',

        'contact_content1'=>'nullable|string',



        'contact_image2'=>'nullable|image|mimes:jpeg,png,jpg,svg,gif|max:4000',

        'image_name2'=>'nullable|string',

        'contact_content2'=>'nullable|string',



        'contact_image3'=>'nullable|image|mimes:jpeg,png,jpg,svg,gif|max:4000',

        'image_name3'=>'nullable|string',

        'contact_content3'=>'nullable|string',



        'form_heading'=>'nullable|string',

        'form_description'=>'nullable|string',

        'map_link'=>'nullable|string',

        
        'dealer_locator'=>'nullable|file|mimes:csv,txt,xlsx,xls|max:5000',

        //end contact page



        //start faq

        'faq_id'=>'nullable',

        //end faq

        //start additional

       'main_content'=>'nullable|string',

        //end additional





        // Start About Page Additional Fields

        'about_image'=>'nullable|image|mimes:jpeg,png,jpg,svg,gif|max:4000',

        'about_title'=>'nullable|string',

        'about_content'=>'nullable|string',



        'product_background_image'=>'nullable|image|mimes:jpeg,png,jpg,svg,gif|max:4000',

        'about_product_title'=>'nullable|string',

        'about_product_content'=>'nullable|string',

        'about_product_label'=>'nullable|string',

        'about_product_url'=>'nullable|string',



    ]);







    $page = new Page();

    $page->user_id = auth()->user()->id;

    $page->fill($values);

    $page->slug = Str::slug($request->name);







    /****======= Start All Home pages Section images ========*****/



    // About Module image(home)

    if ($request->hasFile('about_background_image')) {

       $about_background_image_name = $request->file('about_background_image');

       $ext = $about_background_image_name->extension();

       $about_background_image_filename = uniqid().'.'.$ext;

       $about_background_image_name->storeAs('public/pages/',$about_background_image_filename);



    }

   //contact images

    // if ($request->hasFile('below_image')) {

    //     $contact_below_image_name = $request->file('below_image');

    //     $ext = $contact_below_image_name->extension();

    //     $contact_below_image_filename = uniqid().'.'.$ext;

    //     $contact_below_image_name->storeAs('public/pages/',$contact_below_image_filename);



    //  }



     if ($request->hasFile('contact_image1')) {

        $contact_image1_name = $request->file('contact_image1');

        $ext = $contact_image1_name->extension();

        $contact_image1_filename = uniqid().'.'.$ext;

        $contact_image1_name->storeAs('public/pages/',$contact_image1_filename);



     }



     if ($request->hasFile('contact_image2')) {

        $contact_image2_name = $request->file('contact_image2');

        $ext = $contact_image2_name->extension();

        $contact_image2_filename = uniqid().'.'.$ext;

        $contact_image2_name->storeAs('public/pages/',$contact_image2_filename);



     }



     if ($request->hasFile('contact_image3')) {

        $contact_image3_name = $request->file('contact_image3');

        $ext = $contact_image3_name->extension();

        $contact_image3_filename = uniqid().'.'.$ext;

        $contact_image3_name->storeAs('public/pages/',$contact_image3_filename);



     }

     if ($request->hasFile('about_image')) {

        $about_image_name = $request->file('about_image');

        $ext = $about_image_name->extension();

        $about_image_filename = uniqid().'.'.$ext;

        $about_image_name->storeAs('public/pages/',$about_image_filename);



     }



     if ($request->hasFile('product_background_image')) {

        $product_background_image_name = $request->file('product_background_image');

        $ext = $product_background_image_name->extension();

        $product_background_image_filename = uniqid().'.'.$ext;

        $product_background_image_name->storeAs('public/pages/',$product_background_image_filename);



     }
     
     if ($request->hasFile('dealer_locator')) {
        $dealer_locator = $request->file('dealer_locator');
        $ext = $dealer_locator->extension();
        $dealer_locator_filename = 'Locator_data_'.uniqid().'.'.$ext;
        $dealer_locator->storeAs('public/pages/',$dealer_locator_filename);
       
     }





    $page_sections = [



        // Banner Module

        'banner_id' => $request->banner_id,





        // About Module

        'about_background_image' => $about_background_image_filename ?? '',

        'about_title' =>$request->about_title,

        'about_label' => $request->about_label,

        'about_url' => $request->about_url,

        'about_id' => $request->frame_id,



        //  Product Module



        'product_title' => $request->product_title,

        'product_content' => $request->product_content,

        'product_id' => $request->product_id,





        // Story Module

        'story_title' => $request->story_title,

        'story_content' => $request->story_content,

        'story_id' => $request->story_id,



        // FAQ Module

        'faq_title' => $request->faq_title,

        'faq_content' => $request->faq_content,

        'faq_id' => $request->faq_id,



        // News Module

        'news_title' => $request->news_title,

        'news_content' => $request->news_content,

        'news_id' => $request->news_id,



        // End Home Page



        //start Contact page

        'contact_heading'=>$request->contact_heading,

        'contact_content'=>$request->contact_content,



        'contact_image1'=>$contact_image1_filename ?? '',

        'image_name1'=>$request->image_name1,

        'contact_content1'=>$request->contact_content1,



        'contact_image2'=>$contact_image2_filename ?? '',

        'image_name2'=>$request->image_name2,

        'contact_content2'=>$request->contact_content2,



        'contact_image3'=>$contact_image3_filename ?? '',

        'image_name3'=>$request->image_name3,

        'contact_content3'=>$request->contact_content3,



        'form_heading'=>$request->form_heading,

        'form_description'=>$request->form_description,

        'map_link'=>$request->map_link,

        'dealer_locator' => $dealer_locator_filename ?? '',

        //end contact page



        //start faq

        'faq_list_id'=>$request->faq_list_id,

        //end faq

        //start additional

       'main_content'=>$request->main_content,

        //end additional





        // Start About Page Additional Fields

        'about_image'=>$about_image_filename ?? '',

        'about_title'=>$request->about_title,

        'about_content'=>$request->about_content,



        'product_background_image'=>$product_background_image_filename ?? '',

        'about_product_title'=>$request->about_product_title,

        'about_product_content'=>$request->about_product_content,

        'about_product_label'=>$request->about_product_label,

        'about_product_url'=>$request->about_product_url,

        // End About Page Additional Fields

    ];









    $page->description = json_encode($page_sections);



    $page->save();



    return redirect()->route('page.index')->with('success','Record has been created successfully');
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
        //
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
        //
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
