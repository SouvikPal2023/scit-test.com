@extends('admin.layouts.app')
@section('title','Edit Page')
@section('panel')
<div class="container-fluid">
    <!-- <div class="block-header">
      <h2>Edit Page</h2>
   </div> -->

    <!-- Widgets -->
    
        
           
            <!-- <div class="body"> -->
               <!-- <div class="row clearfix"> -->
    <form action="{{route('admin.page.update',$page)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <div class="row">
        <div class="col-md-8">
       
            <div class="card shadow mb-4 " id="accordion_page" role="tablist" aria-multiselectable="true">
                <div class="panel panel-warning">
                    <div class="panel-heading " role="tab" id="headingPage">
                        
                            <a role="button" class="d-block card-header py-3" data-toggle="collapse" data-parent="#accordion_page" href="#collapsePage"
                                aria-expanded="true" aria-controls="collapsePage">
                                <h6 class="m-0 font-weight-bold text-primary">  Page Module</h6>
                            </a>
                        
                    </div>
                    <div id="collapsePage" class="panel-collapse collapse show" role="tabpanel"
                        aria-labelledby="headingPage">
                        <div class="card-body">

                          
                            <div class="form-group form-float">
                                <div class="form-line">
                                <label class="form-label">Title</label>
                                    <input type="text" name="name" value="{{ old('title', $page->name ?? '') }}"
                                        class="form-control @error('name') is-invalid @enderror" required="" />
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       


            {{-- Start Home Template --}}
            @include('admin.page.pages.home')

            {{-- End Home Template --}}


            {{-- Start About Template --}}

            @include('admin.page.pages.howItWorks')


            {{-- End About Template --}}

            {{-- Start Contact Template --}}

            @include('admin.page.pages.contact')

            {{-- End Contact Template --}}

            {{-- Start faq Template --}}

            @include('admin.page.pages.faq')

            {{-- End faq Template --}}

            {{-- Start extra Template --}}

            @include('admin.page.pages.privacy')

            {{-- End extra Template --}}
            {{-- End Ajax Template --}}

        </div>
       
        {{-- page metas --}}
        <div class="col-md-4">

            {{-- Start Page Details --}}

            <div class="panel-group" id="accordion_page_details" role="tablist" aria-multiselectable="true">
                <div class="card shadow mb-4">
                    <div class="panel-heading" role="tab" id="accordion_page_detailss">
                        <h4 class="panel-title">
                            <a role="button" class="d-block card-header py-3" data-toggle="collapse" data-parent="#accordion_page_details"
                                href="#collapsePageDetails" aria-expanded="true" aria-controls="collapsePageDetails">
                                <h6 class="m-0 font-weight-bold text-primary">Page Templates</h6>
                            </a>
                        </h4>
                    </div>
                    <div id="collapsePageDetails" class="panel-collapse collapse show" role="tabpanel"
                        aria-labelledby="headingOne_1">
                        <div class="card-body">
                           
                            <div class="form-group form-float">
                            <label class="form-label">Choose Templates</label>
                                <select class="form-control show-tick" name="template" id="page-template">
                                    <option value="template_default"
                                        {{ $page->template == 'template_default' ? 'selected':'' }}> Template Default
                                    </option>
                                    <option value="template_home"
                                        {{ $page->template == 'template_home' ? 'selected':'' }}> Template Home
                                    </option>
                                    <option value="template_about"
                                        {{ $page->template == 'template_about' ? 'selected':'' }}> Template How-it-works
                                    </option>
                                   

                                    <option value="template_privacy"
                                        {{ $page->template == 'template_privacy' ? 'selected':'' }}> Template Privacy
                                        Policy </option>
                                    <option value="template_contact"
                                        {{ $page->template == 'template_contact' ? 'selected':'' }}> Template Contact
                                    </option>
                                    <option value="template_faq"
                                        {{ $page->template == 'template_faq' ? 'selected':'' }}>Faq</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="panel-group " id="accordion_seo_content" role="tablist" aria-multiselectable="true">
            <div class="card shadow mb-4">
                    <div class="panel-heading" role="tab" id="headingSeoContent">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" class="d-block card-header py-3" data-parent="#accordion_seo_content"
                                href="#collapseSeoContent" aria-expanded="true" aria-controls="collapseSeoContent">
                                <h6 class="m-0 font-weight-bold text-primary">Seo Content</h6>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseSeoContent" class="panel-collapse collapse show" role="tabpanel"
                        aria-labelledby="headingSeoContent">
                        <div class="card-body">
                          
                            <div class="form-group form-float">
                                <div class="form-line">
                                <label class="form-label">Meta Keyword</label>
                                    <input type="text" name="meta_keyword"
                                        value="{{ old('meta_keyword',$page->meta_keyword ?? '') }}"
                                        class="form-control @error('meta_keyword') is-invalid @enderror" />
                                   
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <label class="form-label">SEO Title</label>
                                <div class="form-line">
                                    <input type="text" name="seo_title" cols="30" rows="6" class="form-control tinymce"
                                        value="{{ old('seo_title',$page->seo_title ?? '') }}"
                                        class="form-control @error('seo_title') is-invalid @enderror">
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <label class="form-label">Meta Content</label>
                                <div class="form-line">
                                    <textarea name="meta_content" cols="30" rows="6" name="meta_content"
                                        class="form-control tinymce">{!! old('meta_content',$page->meta_content ?? '') !!}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end Seo Content --}}


            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
        </div>
         </div>
    </form>
<!-- </div> -->
<!-- </div> -->
<!-- </div> -->

</div>
</div>
@endsection


@push('admin-scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(function() {
    $('.content_template').hide();
    $(".inpt-specific").hide();

    // $('.template_default').show();
    $('.{{ $page->template }}').slideDown();
    $(`.{{ $page->template }}-only`).show();

    $("#page-template").on("change", function() {
        let dataObj = $(this),
            tmplVal = dataObj.val();


        $(".inpt-specific").hide();
        $('.content_template').slideUp('1000');
        $(`.${tmplVal}-only`).show();
        $(`.${tmplVal}`).slideDown('slow');
        $(`#accordion_page_detailss`).slideDown('slow');
    });
});

function showBanner(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $("#bannerImage").attr("src", e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function showBannerFgBanner(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $("#bannerFgImage").attr("src", e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}


function showRcmBgBanner(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $("#rcmBgImage").attr("src", e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function showRcmFgBanner(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $("#rcmFgImage").attr("src", e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
// About Page

function showContentImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $("#contentImage").attr("src", e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush