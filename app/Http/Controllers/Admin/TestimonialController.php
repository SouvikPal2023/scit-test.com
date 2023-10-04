<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Testimonial;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['testimonials'] = Testimonial::orderBy('created_at', 'DESC')->paginate(15);
        //$data['homeTitle11'] = HomeTitle::select('title11')->first();
        $data['page_title'] = "Testimonial List";
        return view('admin.testimonialSection.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = "Add Testimonial";
        return view('admin.testimonialSection.create',$data);
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
            "name" => 'required|string|max:150',
            "image"=>'nullable|image|max:5000',
            "designation" => 'required|string|max:100',
            "content"=>'required|string|max:5000',
        ]);

        if (isset($values['image'])) {
            $values['image'] = Storage::putFile('public/testimonial', new File($request->image));
        }

        $testimonial = new Testimonial();
        $testimonial->fill($values);
        $testimonial->save();

        $notify[] = ['success', __('Record added successfully')];
        return redirect()->route('admin.testimonial.index')->with('success', 'Record added successfully!');
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
    public function edit(Testimonial $testimonial)
    {
        $data['testimonial'] = $testimonial;
        $data['page_title'] = "Edit Testimonial";
        return view('admin.testimonialSection.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  Testimonial $testimonial)
    {
        $changed = false;
        $values = $request->validate([
            "name" => 'required|string|max:150',
            "image"=>'nullable|image|max:5000',
            "designation" => 'required|string|max:100',
            "content"=>'required|string|max:5000',
        ]);


        if ($request->image) {
            if (!empty($testimonial->image)) {
                Storage::delete($testimonial->image);
            }

            $values['image'] = Storage::putFile('public/testimonial', new File($request->image));
        }

        $testimonial->fill($request->except('image'));
        if (isset($values['image'])) {
            $testimonial->image = $values['image'];
        }

        if ($testimonial->isDirty()) {
            $testimonial->save();
            $changed = true;
        }


        if (! $changed) {
            $notify[] = ['warning', __('admin_messages.nochange')];
            return redirect()->route('admin.testimonial.index')->with('warning', 'No changes found!');
        }

        $notify[] = ['success', __('Record updated successfully!')];
        return redirect()->route('admin.testimonial.index')->with('success', 'Record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        if (isset($testimonial)) {
            if (!empty($testimonial->image)) {
                Storage::delete($testimonial->image);
            }

            $testimonial->delete();
        }

        $notify[] = ['success', __('Record deleted successfully!')];
        return redirect()->route('admin.testimonial.index')->with('success', 'Record deleted successfully!');
    }

    public function testimonialStatus(Testimonial $testimonial)
    {
        if ($testimonial->status == 'active') {
            $testimonial->status = 'inactive';
        } else {
            $testimonial->status = 'active';
        }

        $testimonial->save();

        $notify[] = ['success', $testimonial->name. ' ' . (($testimonial->status == 'inactive') ? __('status disabled successfully') : __('status enabled successfully'))];
        return redirect()->route('admin.testimonial.index')->with('success', 'Status changed successfully!');
    }
}
