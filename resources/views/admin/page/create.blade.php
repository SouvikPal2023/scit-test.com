@extends('admin.layouts.app')
@section('title','Create Page')
@section('panel')
<div class="container-fluid">
   <div class="block-header">
      <h2>Add Page</h2>
   </div>
   <!-- Widgets -->
   <form action="{{route('admin.page.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
   <div class="row ">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="row ">

        <div class="col-md-8">
        <div class="card shadow mb-4 template_default">
            <!-- Card Header - Accordion -->
            <a href="#collapsePage" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapsePage">
                <h6 class="m-0 font-weight-bold text-primary">  Page Module</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapsePage" style="">
                <div class="card-body">

                                    <div class="form-group form-float">
                                       <div class="form-line">
                                          <input type="text"
                                                 name="name"
                                                 class="form-control @error('name') is-invalid @enderror"
                                                 value="{{ old('name') }}"
                                                 required=""
                                                 placeholder="Page Title" />


                                       </div>
                                    </div>
                </div>
            </div>
        </div>


                        {{-- Start Ajax Template --}}
                        {{-- Start Home Template --}}

                        @include('admin.page.pages.home')

                        {{-- End Home Template --}}


                        {{-- Start About Template --}}

                        {{-- @include('admin.page.pages.about') --}}

                        {{-- End About Template --}}

                         {{-- Start Contact Template --}}

                         {{-- @include('admin.page.pages.contact') --}}

                         {{-- End Contact Template --}}

                         {{-- Start faq Template --}}

                         {{-- @include('admin.page.pages.faq') --}}

                         {{-- End faq Template --}}

                         {{-- Start extra Template --}}

                         {{-- @include('admin.page.pages.additional') --}}

                         {{-- End extra Template --}}

        </div>

        <div class="col-md-4">

            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapsePageDetails" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapsePageDetails">
                    <h6 class="m-0 font-weight-bold text-primary">Page Templates</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapsePageDetails" style="">
                    <div class="card-body">
                        <div class="form-group form-float">
                            <select class="form-control show-tick" name="template" id="page-template">
                               <option value="template_default"{{ old('template') == "template_default" ? "selected" : "" }}>
                                  Template Default
                               </option>
                               <option value="template_home"{{ old('template') == "template_home" ? "selected" : "" }}>
                                  Template Home
                               </option>
                               <option value="template_about"{{ old('template') == "template_about" ? "selected" : "" }}>
                                  Template About
                               </option>

                               <option value="template_contact"{{ old('template') == "template_contact" ? "selected" : "" }}>
                                  Template Contact
                               </option>
                               <option value="template_additional"{{ old('template') == "template_additional" ? "selected" : "" }}>
                                  Template Privacy Policy
                               </option>
                               <option value="template_additionals"{{ old('template') == "template_additional" ? "selected" : "" }}>
                                   Template Terms & Condition
                               </option>
                               <option value="template_faq"{{ old('template') == "template_faq" ? "selected" : "" }}>
                                  FAQ
                               </option>
                            </select>
                         </div>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseSeoContent" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseSeoContent">
                    <h6 class="m-0 font-weight-bold text-primary">Seo Content</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseSeoContent" style="">
                    <div class="card-body">
                        <label class="form-label"><b>Meta Keyword</b></label>
                        <div class="form-group form-float">
                           <div class="form-line">
                              <input type="text"
                                     name="meta_keyword"
                                     class="form-control @error('meta_keyword') is-invalid @enderror"
                                     value="{{ old('meta_keyword') }}"
                                     />


                           </div>
                        </div>
                        <div class="form-group form-float">
                           <label class="form-label"><b>SEO Title</b></label>
                           <div class="form-line">
                              <input type="text"
                                     name="seo_title"
                                     cols="30"
                                     rows="6"
                                     class="form-control tinymce"
                                     value="{{ old('seo_title') }}">
                           </div>
                        </div>
                        <div class="form-group form-float">
                           <label class="form-label"><b>Meta Content</b></label>
                           <div class="form-line">
                              <textarea name="meta_content" cols="30" rows="6" name="meta_content" class="form-control tinymce">{{ old('meta_content') }}</textarea>
                           </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Insert</button>
        </div>

        </div>
      </div>
   </div>
   </form>
</div>
@endsection

@push('admin-scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
   
   (function($){
   $('.content_template').hide();

      $("#page-template").on("change", function () {
         let dataObj = $(this),
             tmplVal = dataObj.val();

         $(".inpt-specific").hide();
         $('.content_template').slideUp(500);
         $(`.${tmplVal}-only`).show();
         $(`.${tmplVal}`).slideDown('slow');
      });
   })(jQuery);




</script>
@endpush
