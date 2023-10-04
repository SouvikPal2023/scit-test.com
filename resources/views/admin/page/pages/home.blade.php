{{-- Start Home Template Banner Section --}}
{{-- <div class="panel-group content_template template_home template_contact template_faq template_additional template_additionals" id="accordion_home_banner" role="tablist" aria-multiselectable="true">
    <div class="panel panel-success">
       <div class="panel-heading" role="tab" id="headingContent">
          <h4 class="panel-title">
             <a role="button" data-toggle="collapse" data-parent="#accordion_home_banner" href="#collapseHomeBanner" aria-expanded="true" aria-controls="collapseHomeBanner">
                Banner Module
             </a>
          </h4>
       </div>
       <div id="collapseHomeBanner" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingContent">
          <div class="panel-body">

             <div class="form-group form-float">
               <select class="form-control show-tick" name="banner_id[]" multiple="">
                    @if ($banners->count() > 0)
                   @foreach ($banners as $banner)
                   @if (!empty($page_content->banner_id) && in_array($banner->id, $page_content->banner_id) || (collect(old('banner_id'))->contains($banner->id)))
                   <option value="{{ $banner->id }}" selected=""> {{ $banner->title }} </option>
@else
<option value="{{ $banner->id }}"> {{ $banner->title }} </option>
@endif
@endforeach
@endif
</select>


</div>

</div>
</div>
</div>
</div> --}}


<div class="card shadow mb-4 content_template template_home">
    <!-- Card Header - Accordion -->
    <a href="#collapseHomeBanner" class="d-block card-header py-3" data-toggle="collapse" role="button"
        aria-expanded="true" aria-controls="collapseHomeBanner">
        <h6 class="m-0 font-weight-bold text-primary"> Banner Module</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseHomeBanner" style="">
        <div class="card-body">

            <div class="form-group form-float">
                <div class="form-group form-float">

                <label class="form-label">Banner Heading1</label>
                    <div class="form-line">
                        
                            
                                <!-- <input type="file" name="about_background_image" accept="image/*" onchange="showSelectedImagesss(this)" class="form-control @error('about_background_image') is-invalid @enderror" /> -->
                                <input type="text" name="banner_heading1"
                                    class="form-control @error('banner_heading1') is-invalid @enderror"
                                    value="{{ old('banner_heading1', $page_content->banner_heading1 ?? '') }}"
                                    placeholder="Banner Heading 1" />
                          

                       
                    </div>

                    <label class="form-label">Banner Heading2</label>
                    <div class="form-line">
                        
                            
                                <!-- <input type="file" name="about_background_image" accept="image/*" onchange="showSelectedImagesss(this)" class="form-control @error('about_background_image') is-invalid @enderror" /> -->
                                <input type="text" name="banner_heading2"
                                    class="form-control @error('banner_heading2') is-invalid @enderror"
                                    value="{{ old('banner_heading2', $page_content->banner_heading2 ?? '') }}"
                                    placeholder="Banner Heading 2" />
                          

                       
                    </div>

                    <label class="form-label">Description</label>
                    <div class="form-line">
                        
                            
                        
                                <textarea name="banner_detail"  class="form-control nicEdit @error('banner_detail') is-invalid @enderror">{!! old('banner_detail', $page_content->banner_detail ?? '') !!}</textarea>
                          

                       
                    </div>

                    <label class="form-label">Button Text</label>
                    <div class="form-line">
                        
                            
                                <!-- <input type="file" name="about_background_image" accept="image/*" onchange="showSelectedImagesss(this)" class="form-control @error('about_background_image') is-invalid @enderror" /> -->
                                <input type="text" name="banner_button"
                                    class="form-control @error('banner_button') is-invalid @enderror"
                                    value="{{ old('banner_button', $page_content->banner_button ?? '') }}"
                                    placeholder="banner Section Button Text" />
                          

                       
                    </div>

                    <label class="form-label">Button URL</label>
                    <div class="form-line">
                        
                            
                                <!-- <input type="file" name="about_background_image" accept="image/*" onchange="showSelectedImagesss(this)" class="form-control @error('about_background_image') is-invalid @enderror" /> -->
                                <input type="text" name="banner_url"
                                    class="form-control @error('banner_url') is-invalid @enderror"
                                    value="{{ old('banner_url', $page_content->banner_url ?? '') }}"
                                    placeholder="banner Section Button URL" />
                          
                                   
                       
                    </div>
                    <label class="form-label">Choose Banner Images</label>
                    <div class="form-line">
                    <select class="form-control show-tick" name="banner_id[]" multiple="">
                    @if ($banners->count() > 0)
                  @foreach ($banners as $add)
                  @if (!empty($page_content->banner_id) && in_array($add->id, $page_content->banner_id))
                  <option value="{{ $add->id }}" selected=""> {{ $add->title }} </option>
                  @else
                  <option value="{{ $add->id }}"> {{ $add->title }} </option>
                  @endif
                  @endforeach
                  @endif
                    </select>
</div>

                </div>

            </div>
        </div>
    </div>
</div>
{{-- End Home Template Banner Section --}}

{{-- Start Home Template Youtube video  --}}

<div class="card shadow mb-4 content_template template_home">
    <!-- Card Header - Accordion -->
    <a href="#collapseHomeBanner2" class="d-block card-header py-3" data-toggle="collapse" role="button"
        aria-expanded="true" aria-controls="collapseHomeBanner2">
        <h6 class="m-0 font-weight-bold text-primary"> Youtube Module</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseHomeBanner2" style="">
        <div class="card-body">

            <div class="form-group form-float">
                <div class="form-group form-float">
                    <label class="form-label">Youtube iframe link</label>
                    <div class="form-line">
                        
                            
                                <!-- <input type="file" name="about_background_image" accept="image/*" onchange="showSelectedImagesss(this)" class="form-control @error('about_background_image') is-invalid @enderror" /> -->
                                <input type="text" name="youtube"
                                    class="form-control @error('youtube') is-invalid @enderror"
                                    value="{{ old('youtube', $page_content->youtube ?? '') }}"
                                    placeholder="Youtube Iframe" />
                          

                       
                    </div>

                    <label class="form-label">Description</label>
                    <div class="form-line">
                        
                            
                                <!-- <input type="file" name="about_background_image" accept="image/*" onchange="showSelectedImagesss(this)" class="form-control @error('about_background_image') is-invalid @enderror" /> -->
                                <textarea name="youtube_detail" cols="30" rows="6" class="form-control nicEdit @error('youtube_detail') is-invalid @enderror">{!! old('youtube_detail', $page_content->youtube_detail ?? '') !!}</textarea>
                          

                       
                    </div>

                    <label class="form-label">Button Text</label>
                    <div class="form-line">
                        
                            
                                <!-- <input type="file" name="about_background_image" accept="image/*" onchange="showSelectedImagesss(this)" class="form-control @error('about_background_image') is-invalid @enderror" /> -->
                                <input type="text" name="youtube_button"
                                    class="form-control @error('youtube_button') is-invalid @enderror"
                                    value="{{ old('youtube_button', $page_content->youtube_button ?? '') }}"
                                    placeholder="Youtube Section Button Text" />
                          

                       
                    </div>

                    <label class="form-label">Button URL</label>
                    <div class="form-line">
                        
                            
                                <!-- <input type="file" name="about_background_image" accept="image/*" onchange="showSelectedImagesss(this)" class="form-control @error('about_background_image') is-invalid @enderror" /> -->
                                <input type="text" name="youtube_url"
                                    class="form-control @error('youtube_url') is-invalid @enderror"
                                    value="{{ old('youtube_url', $page_content->youtube_url ?? '') }}"
                                    placeholder="Youtube Section Button URL" />
                          

                       
                    </div>

                    <label class="form-label">Button Text2</label>
                    <div class="form-line">
                        
                            
                                <!-- <input type="file" name="about_background_image" accept="image/*" onchange="showSelectedImagesss(this)" class="form-control @error('about_background_image') is-invalid @enderror" /> -->
                                <input type="text" name="youtube_button2"
                                    class="form-control @error('youtube_button2') is-invalid @enderror"
                                    value="{{ old('youtube_button2', $page_content->youtube_button2 ?? '') }}"
                                    placeholder="Youtube Section Button Text" />
                          

                       
                    </div>

                    <label class="form-label">Button URL2</label>
                    <div class="form-line">
                        
                            
                                <!-- <input type="file" name="about_background_image" accept="image/*" onchange="showSelectedImagesss(this)" class="form-control @error('about_background_image') is-invalid @enderror" /> -->
                                <input type="text" name="youtube_url2"
                                    class="form-control @error('youtube_url2') is-invalid @enderror"
                                    value="{{ old('youtube_url2', $page_content->youtube_url2 ?? '') }}"
                                    placeholder="Youtube Section Button URL" />
                          

                       
                    </div>


                </div>

            </div>
        </div>
    </div>
</div>
{{--END Youtube--}}
{{--Why take SCIT?--}}
<div class="card shadow mb-4 content_template template_home">
    <!-- Card Header - Accordion -->
    <a href="#collapseHomeBanner1" class="d-block card-header py-3" data-toggle="collapse" role="button"
        aria-expanded="true" aria-controls="collapseHomeBanner1">
        <h6 class="m-0 font-weight-bold text-primary">Why take SCIT?- Module</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseHomeBanner1" style="">
        <div class="card-body">

            <div class="form-group form-float">
                <div class="form-group form-float">
                    <label class="form-label">Why take SCIT module heading</label>
                    <div class="form-line">
                        
                            
                                <!-- <input type="file" name="about_background_image" accept="image/*" onchange="showSelectedImagesss(this)" class="form-control @error('about_background_image') is-invalid @enderror" /> -->
                                <input type="text" name="why_heading"
                                    class="form-control @error('why_heading') is-invalid @enderror"
                                    value="{{ old('why_heading', $page_content->why_heading ?? '') }}"
                                    placeholder="Main Heading" />
                          

                       
                    </div>

                    <label class="form-label">Sub section heading 1</label>
                    <div class="form-line">
                        
                            
                                <!-- <input type="file" name="about_background_image" accept="image/*" onchange="showSelectedImagesss(this)" class="form-control @error('about_background_image') is-invalid @enderror" /> -->
                                <input type="text" name="why_sub_heading1"
                                    class="form-control @error('why_sub_heading1') is-invalid @enderror"
                                    value="{{ old('why_sub_heading1', $page_content->why_sub_heading1 ?? '') }}"
                                    placeholder="Sub Heading1" />
                          

                       
                    </div>

                    <label class="form-label">Sub section description1</label>
                    <div class="form-line">
                        
                            
                                <!-- <input type="file" name="about_background_image" accept="image/*" onchange="showSelectedImagesss(this)" class="form-control @error('about_background_image') is-invalid @enderror" /> -->
                                <input type="text" name="why_sub_desc1"
                                    class="form-control @error('why_sub_desc1') is-invalid @enderror"
                                    value="{{ old('why_sub_desc1', $page_content->why_sub_desc1 ?? '') }}"
                                    placeholder="Sub Section1" />
                          

                       
                    </div>

                    <label class="form-label">Sub section heading 2</label>
                    <div class="form-line">
                        
                            
                                <!-- <input type="file" name="about_background_image" accept="image/*" onchange="showSelectedImagesss(this)" class="form-control @error('about_background_image') is-invalid @enderror" /> -->
                                <input type="text" name="why_sub_heading2"
                                    class="form-control @error('why_sub_heading2') is-invalid @enderror"
                                    value="{{ old('why_sub_heading2', $page_content->why_sub_heading2 ?? '') }}"
                                    placeholder="Sub Heading2" />
                          

                       
                    </div>

                    <label class="form-label">Sub section description2</label>
                    <div class="form-line">
                        
                            
                                <!-- <input type="file" name="about_background_image" accept="image/*" onchange="showSelectedImagesss(this)" class="form-control @error('about_background_image') is-invalid @enderror" /> -->
                                <input type="text" name="why_sub_desc2"
                                    class="form-control @error('why_sub_desc2') is-invalid @enderror"
                                    value="{{ old('why_sub_desc2', $page_content->why_sub_desc2 ?? '') }}"
                                    placeholder="Sub Section2" />
                          

                       
                    </div>

                    <label class="form-label">Sub section heading 3</label>
                    <div class="form-line">
                        
                            
                                <!-- <input type="file" name="about_background_image" accept="image/*" onchange="showSelectedImagesss(this)" class="form-control @error('about_background_image') is-invalid @enderror" /> -->
                                <input type="text" name="why_sub_heading3"
                                    class="form-control @error('why_sub_heading3') is-invalid @enderror"
                                    value="{{ old('why_sub_heading3', $page_content->why_sub_heading3 ?? '') }}"
                                    placeholder="Sub Heading3" />
                          

                       
                    </div>

                    <label class="form-label">Sub section description3</label>
                    <div class="form-line">
                        
                            
                                <!-- <input type="file" name="about_background_image" accept="image/*" onchange="showSelectedImagesss(this)" class="form-control @error('about_background_image') is-invalid @enderror" /> -->
                                <input type="text" name="why_sub_desc3"
                                    class="form-control @error('why_sub_desc3') is-invalid @enderror"
                                    value="{{ old('why_sub_desc3', $page_content->why_sub_desc3 ?? '') }}"
                                    placeholder="Sub Section3" />
                          

                       
                    </div>

                    <label class="form-label">Sub section heading 4</label>
                    <div class="form-line">
                        
                            
                                <!-- <input type="file" name="about_background_image" accept="image/*" onchange="showSelectedImagesss(this)" class="form-control @error('about_background_image') is-invalid @enderror" /> -->
                                <input type="text" name="why_sub_heading4"
                                    class="form-control @error('why_sub_heading4') is-invalid @enderror"
                                    value="{{ old('why_sub_heading4', $page_content->why_sub_heading4 ?? '') }}"
                                    placeholder="Sub Heading4" />
                          

                       
                    </div>

                    <label class="form-label">Sub section description4</label>
                    <div class="form-line">
                        
                            
                                <!-- <input type="file" name="about_background_image" accept="image/*" onchange="showSelectedImagesss(this)" class="form-control @error('about_background_image') is-invalid @enderror" /> -->
                                <input type="text" name="why_sub_desc4"
                                    class="form-control @error('why_sub_desc4') is-invalid @enderror"
                                    value="{{ old('why_sub_desc4', $page_content->why_sub_desc4 ?? '') }}"
                                    placeholder="Sub Section4" />
                          

                       
                    </div>


                </div>

            </div>
        </div>
    </div>
</div>
{{--END Why take SCIT?--}}


{{--Testimonial-FAQ Module--}}
<div class="card shadow mb-4 content_template template_home">
    <!-- Card Header - Accordion -->
    <a href="#collapseHomeBanner12" class="d-block card-header py-3" data-toggle="collapse" role="button"
        aria-expanded="true" aria-controls="collapseHomeBanner12">
        <h6 class="m-0 font-weight-bold text-primary">Testimonial-FAQ Module</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseHomeBanner12" style="">
        <div class="card-body">

            <div class="form-group form-float">
                <div class="form-group form-float">
                    <label class="form-label">Testimonial Heading</label>
                    <div class="form-line">
                        
                            
                                <!-- <input type="file" name="about_background_image" accept="image/*" onchange="showSelectedImagesss(this)" class="form-control @error('about_background_image') is-invalid @enderror" /> -->
                                <input type="text" name="testi_heading"
                                    class="form-control @error('testi_heading') is-invalid @enderror"
                                    value="{{ old('testi_heading', $page_content->testi_heading ?? '') }}"
                                    placeholder="Testimonial Heading" />
                          

                       
                    </div>

                    <label class="form-label">FAQ Heading</label>
                    <div class="form-line">
                        
                            
                                <!-- <input type="file" name="about_background_image" accept="image/*" onchange="showSelectedImagesss(this)" class="form-control @error('about_background_image') is-invalid @enderror" /> -->
                                <input type="text" name="faq_heading"
                                    class="form-control @error('faq_heading') is-invalid @enderror"
                                    value="{{ old('faq_heading', $page_content->faq_heading ?? '') }}"
                                    placeholder="FAQ Heading" />
                          

                       
                    </div>

                    <label class="form-label">Choose Testimonials</label>
                    <div class="form-line">
                    <select class="form-control show-tick" name="testimonial_id[]" multiple="">
                    @if ($testimonials->count() > 0)
                  @foreach ($testimonials as $add)
                  @if (!empty($page_content->testimonial_id) && in_array($add->id, $page_content->testimonial_id))
                  <option value="{{ $add->id }}" selected=""> {{ $add->name }} </option>
                  @else
                  <option value="{{ $add->id }}"> {{ $add->name }} </option>
                  @endif
                  @endforeach
                  @endif
                    </select>
</div>

<label class="form-label">Choose FAQs</label>
                    <div class="form-line">
                    <select class="form-control show-tick" name="faq_id[]" multiple="">
                    @if ($faqs->count() > 0)
                  @foreach ($faqs as $add)
                  @if (!empty($page_content->faq_id) && in_array($add->id, $page_content->faq_id))
                  <option value="{{ $add->id }}" selected="">   {!!  Str::limit($add->question,10) !!} </option>
                  @else
                  <option value="{{ $add->id }}"> {!! Str::limit($add->question, 100) !!}</option>
                  @endif
                  @endforeach
                  @endif
                    </select>
</div>

                   



                </div>

            </div>
        </div>
    </div>
</div>
{{--END Testimonial-FAQ Module--}}

{{-- <div class="panel-group content_template template_home">
    <div class="panel panel-success">
       <div class="panel-heading" role="tab" id="headingFeaturedFrame">
          <h4 class="panel-title">
             <a role="button" data-toggle="collapse" data-parent="#accordion_home_featured_frame" href="#collapseHomeFeaturedFrame" aria-expanded="true" aria-controls="collapseHomeFeaturedFrame">
               Youtube Module
             </a>
          </h4>
       </div>
       <div id="collapseHomeFeaturedFrame" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingContent">
          <div class="panel-body">
             <div class="form-group form-float">
                <label class="form-label">Youtube iframe link</label>
                <div class="form-line">
                   <div class="row">
                      <div class="col-md-6">
                   <!-- <input type="file" name="about_background_image" accept="image/*" onchange="showSelectedImagesss(this)" class="form-control @error('about_background_image') is-invalid @enderror" /> -->
                   <input type="text"
                                                 name="youtube"
                                                 class="form-control @error('youtube') is-invalid @enderror"
                                                 
                                                 value="{{ old('youtube', $page_content->youtube ?? '') }}"
placeholder="Youtube Iframe" />
</div>

</div>
</div>
</div>
<div class="form-group form-float">
    <label class="form-label">Detail</label>
    <div class="form-line">
        <input type="text" name="youtube_detail"
            value="{{ old('youtube_detail', $page_content->youtube_detail ?? '') }}"
            class="form-control @error('youtube_detail') is-invalid @enderror" />
    </div>
</div>
<div class="form-group form-float inpt-specific template_home-only">
    <label class="form-label">Content</label>
    <div class="form-line">
        <textarea name="about_content" cols="30" rows="6" name="content"
            class="form-control Editor @error('about_content') is-invalid @enderror">{!! old('about_content', $page_content->about_content ?? '') !!}</textarea>
    </div>
</div>
<div class="form-group form-float">
    <label class="form-label">Label</label>
    <div class="form-line">
        <input type="text" name="about_label" value="{{ old('about_label', $page_content->about_label ?? '') }}"
            class="form-control @error('about_label') is-invalid @enderror" />
    </div>
</div>
<div class="form-group form-float">
    <label class="form-label">Url</label>
    <div class="form-line">
        <input type="text" name="about_url" value="{{ old('about_url', $page_content->about_url ?? '') }}"
            class="form-control @error('about_url') is-invalid @enderror" />
    </div>
</div> --}}
{{-- <div class="form-group form-float">
                <select class="form-control show-tick" name="frame_id[]" multiple="">
                   @if ($adds->count() > 0)
                   @foreach ($adds as $add)
                   @if (!empty($page_content->frame_id) && in_array($add->id, $page_content->frame_id))
                   <option value="{{ $add->id }}" selected=""> {{ $add->title }} </option>
@else
<option value="{{ $add->id }}"> {{ $add->title }} </option>
@endif
@endforeach
@endif
</select>
</div> --}}
{{-- </div>
       </div>
    </div>
 </div> --}}





<div class="card shadow mb-4 content_template">
    <!-- Card Header - Accordion -->
    <a href="#collapseHomeFeaturedFrame" class="d-block card-header py-3" data-toggle="collapse" role="button"
        aria-expanded="true" aria-controls="collapseHomeFeaturedFrame">
        <h6 class="m-0 font-weight-bold text-primary"> About Module</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseHomeFeaturedFrame" style="">
        <div class="card-body">

            <div class="form-group form-float">
                <label class="form-label">About Background Image</label>
                <div class="form-line">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="file" name="about_background_image" accept="image/*"
                                onchange="showSelectedImagesss(this)"
                                class="form-control @error('about_background_image') is-invalid @enderror" />
                        </div>
                        <div class="col-md-6">
                            <img id="SelectedImgabout"
                                src="{{ !empty($page_content->about_background_image) ? asset('storage/pages/'.$page_content->about_background_image) : asset('assets/img/default_img.png') }}"
                                id="bannerFgImage" class="rounded-circle" title="About BG Image" alt="About BG Image"
                                style="width: 90px;" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group form-float">
                <label class="form-label">Title</label>
                <div class="form-line">
                    <input type="text" name="about_title"
                        value="{{ old('about_title', $page_content->about_title ?? '') }}"
                        class="form-control @error('about_title') is-invalid @enderror" />
                </div>
            </div>
            <div class="form-group form-float inpt-specific template_home-only">
                <label class="form-label">Content</label>
                <div class="form-line">
                    <textarea name="about_content" cols="30" rows="6" name="content"
                        class="form-control Editor @error('about_content') is-invalid @enderror">{!! old('about_content', $page_content->about_content ?? '') !!}</textarea>
                </div>
            </div>
            <div class="form-group form-float">
                <label class="form-label">Label</label>
                <div class="form-line">
                    <input type="text" name="about_label"
                        value="{{ old('about_label', $page_content->about_label ?? '') }}"
                        class="form-control @error('about_label') is-invalid @enderror" />
                </div>
            </div>
            <div class="form-group form-float">
                <label class="form-label">Url</label>
                <div class="form-line">
                    <input type="text" name="about_url" value="{{ old('about_url', $page_content->about_url ?? '') }}"
                        class="form-control @error('about_url') is-invalid @enderror" />
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End Home Template About --}}

{{-- Start Home Template Product --}}

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function showSelectedImagesss(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#SelectedImgabout').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

<script>
            $(document).ready(function () {
                //Select2
                $(".country").select2({
                    maximumSelectionLength: 9,
                });
                //Chosen
                $(".country1").chosen({
                    max_selected_options: 9,
                });

            
            });
        </script>