<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Faq;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['faqs'] = Faq::paginate('20');
        $data['page_title'] = "FAQ List";
        return view('admin.faq.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = "Add FAQ";
        return view('admin.faq.create',$data);
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
            "question"=>'required|string|max:255',
            "answer"=>'required|string|max:1000',  
        ]);
        //dd($values);
        

        $faq = new Faq();
        $faq->fill($values);
        $faq->save();


        $notify[] = ['success', __('admin_messages.faq.create')];
        return redirect()->route('admin.faq.index')->with('success', 'Record added successfully!');
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
    public function edit(Faq $faq)
    {
        $data['faq'] = $faq;
        $data['page_title'] = "Edit FAQ";
        return view('admin.faq.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
        $changed = false;
        $values = $request->validate([
            "question"=>'required|string|max:255',
            "answer"=>'required|string|max:1000', 
        ]);


        $faq->fill($values);
        if ($faq->isDirty()) {
            $faq->save();
            $changed = true;
        }


        if (! $changed) {
            $notify[] = ['warning', __('admin_messages.nochange')];
            return redirect()->route('admin.faq.index')->with('warning', 'No changes found!');
        }

        $notify[] = ['success', __('admin_messages.faq.update')];
        return redirect()->route('admin.faq.index')->with('success', 'Record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        if (isset($faq)) {
            $faq->delete();
        }
        
        $notify[] = ['success', __('admin_messages.faq.delete')];
        return redirect()->route('admin.faq.index')->with('success', 'Record deleted successfully!');
    }

    public function faqStatus(Faq $faq)
    {
        if ($faq->status == 'active') {
            $faq->status = 'inactive';
        } else {
            $faq->status = 'active';
        }   

        $faq->save();

        $notify[] = ['success', 'Question ' . (($faq->status == 'inactive') ? __('admin_messages.disabled') : __('admin_messages.enabled'))];
        return redirect()->route('admin.faq.index')->with('success', 'Status changed successfully!');
    }

}
