{{-- Start About Template --}}

            
{{-- Start About Template Banner Section --}}

{{-- End About Template Banner Section --}}



{{--How-it-works Module--}}
<div class="card shadow mb-4 content_template template_contact">
    <!-- Card Header - Accordion -->
    <a href="#collapseHomeBanner12" class="d-block card-header py-3" data-toggle="collapse" role="button"
        aria-expanded="true" aria-controls="collapseHomeBanner12">
        <h6 class="m-0 font-weight-bold text-primary">Contact Module</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseHomeBanner12" style="">
        <div class="card-body">

            <div class="form-group form-float">
                <div class="form-group form-float">
                    <label class="form-label">Section Heading</label>
                    <div class="form-line">



                        <input type="text" name="contact_section_heading"
                            class="form-control @error('contact_section_heading') is-invalid @enderror"
                            value="{{ old('contact_section_heading', $page_content->contact_section_heading ?? '') }}"
                            placeholder="Section Heading" />



                    </div>

                    <label class="form-label">Sub Heading</label>
                    <div class="form-line">



                        <input type="text" name="contact_sub_heading"
                            class="form-control @error('contact_sub_heading') is-invalid @enderror"
                            value="{{ old('contact_sub_heading', $page_content->contact_sub_heading ?? '') }}"
                            placeholder="Sub Heading" />



                    </div>

                    <label class="form-label">Content</label>
                    <div class="form-line">

                        <textarea name="contact_content" cols="30" rows="6" name="content"
                            class="form-control nicEdit @error('contact_content') is-invalid @enderror">{!! old('contact_content', $page_content->contact_content ?? '') !!}</textarea>


                    </div>


                </div>

            </div>
        </div>
    </div>
</div>
    {{--END How-it-works Module Module--}}
 
 {{-- End About Template --}}

<script>
 function showSelectedImage(input) {
   if (input.files && input.files[0]) {
       var reader = new FileReader();
       
       reader.onload = function (e) {
           $('#SelectedImg1').attr('src', e.target.result);
           
       }
       reader.readAsDataURL(input.files[0]);
   }
 }    
 function showSelectedImage2(input) {
   if (input.files && input.files[0]) {
       var reader = new FileReader();
       
       reader.onload = function (e) {
          
           $('#SelectedImg2').attr('src', e.target.result);
           
       }
       reader.readAsDataURL(input.files[0]);
   }
 }    
 function showSelectedImage3(input) {
   if (input.files && input.files[0]) {
       var reader = new FileReader();
       
       reader.onload = function (e) {
        
           $('#SelectedImg3').attr('src', e.target.result);
         
       }
       reader.readAsDataURL(input.files[0]);
   }
 }    
 function showSelectedImage4(input) {
   if (input.files && input.files[0]) {
       var reader = new FileReader();
       
       reader.onload = function (e) {
        
           $('#SelectedImg4').attr('src', e.target.result);
       }
       reader.readAsDataURL(input.files[0]);
   }
 }    
</script>