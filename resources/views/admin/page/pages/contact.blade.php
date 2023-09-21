{{-- Start About Template --}}

            
{{-- Start About Template Banner Section --}}

{{-- End About Template Banner Section --}}



{{-- Start contact Template Content Section --}}


<div class="panel-group content_template template_contact" id="accordion_page" role="tablist" aria-multiselectable="true">
    <div class="panel panel-warning">
       <div class="panel-heading" role="tab" id="headingAboutContent">
          <h4 class="panel-title">
             <a role="button" data-toggle="collapse" data-parent="#accordion_page" href="#collapsePage" aria-expanded="true" aria-controls="collapsePage">
             Description
             </a>
          </h4>
       </div>
      
       <div id="collapsePage" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingPage">
          <div class="panel-body">
            <div class="form-group form-float">
               <label class="form-label">Title</label>
               <div class="form-line">
                  <input type="text" name="contact_heading" class="form-control @error('contact_heading') is-invalid @enderror" value="{{ old('contact_heading',$page_content->contact_heading ?? '') }}" />
                 
               </div>
            </div>
             <h2 class="card-inside-title">Content</h2>
             <div class="form-group form-float">
                
                    <textarea name="contact_content" cols="30" rows="6"  class="form-control Editor @error('contact_content') is-invalid @enderror">{{ old('contact_content',$page_content->contact_content ?? '') }}</textarea>
                  
                
             </div>
          </div>
       </div>
    </div>
 </div>



 {{-- End Contact Template Content Section --}}
 
 
 
 {{-- Start About Template image and detail --}}
 <div class="panel-group content_template template_contact" id="accordion_about_content" role="tablist" aria-multiselectable="true">
    <div class="panel panel-success">
       <div class="panel-heading" role="tab" id="headingAboutContent">
          <h4 class="panel-title">
             <a role="button" data-toggle="collapse" data-parent="#accordion_about_content" href="#collapseAboutContent" aria-expanded="true" aria-controls="collapseAboutContent">
             Contact Images and Description Module
             </a>
          </h4>
       </div>
       <div id="collapseAboutContent" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingAboutContent">
          <div class="panel-body">
             <div class="form-group form-float">
                <label class="form-label"> Image 1</label>
                <div class="form-line">
                  <div class="row">
                     <div class="col-md-6">
                   <input type="file" name="contact_image1" accept="image/*" onchange="showSelectedImage(this)" class="form-control @error('contact_image1') is-invalid @enderror" />
                     </div>
                     <div class="col-md-6">
                <img src="{{ !empty($page_content->contact_image1) ? asset('storage/pages/'.$page_content->contact_image1) : asset('admin_assets/images/default_img.png') }}" id="SelectedImg1" class="rounded-circle" title="About Content Image" alt="About Content Image" style="width: 90px;" />
               </div>
             </div>
            </div>
         </div>
             <div class="form-group form-float">
                <label class="form-label">Title</label>
                <div class="form-line">
                   <input type="text" name="image_name1" class="form-control @error('image_name1') is-invalid @enderror" value="{{ old('image_name1',$page_content->image_name1 ?? '') }}" />
                  
                </div>
             </div>
 
             <div class="form-group form-float">
                <label class="form-label">Content</label>
              
                   <textarea name="contact_content1" cols="30" rows="6" name="about_content" id="about_content" class="form-control Editor">{{ old('contact_content1', $page_content->contact_content1 ?? '') }}</textarea>
              
             </div>
          </div>
       </div>
       <div id="collapseAboutContent" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingAboutContent">
        <div class="panel-body">
           <div class="form-group form-float">
              <label class="form-label"> Image 2</label>
              <div class="form-line">
               <div class="row">
                  <div class="col-md-6">
                 <input type="file" name="contact_image2" accept="image/*" onchange="showSelectedImage2(this)" class="form-control @error('contact_image2') is-invalid @enderror" />
              </div>
              <div class="col-md-6">
              <img src="{{ !empty($page_content->contact_image2) ? asset('storage/pages/'.$page_content->contact_image2) : asset('admin_assets/images/default_img.png') }}" id="SelectedImg2" class="rounded-circle" title="About Content Image" alt="About Content Image" style="width: 90px;" />
            </div>
         </div>
        </div>
     </div>
           <div class="form-group form-float">
              <label class="form-label">Title</label>
              <div class="form-line">
                 <input type="text" name="image_name2" class="form-control @error('image_name2') is-invalid @enderror" value="{{ old('image_name2',$page_content->image_name2 ?? '') }}"/>
                
              </div>
           </div>

           <div class="form-group form-float">
              <label class="form-label">Content</label>
             
                 <textarea name="contact_content2" cols="30" rows="6" name="about_content" id="about_content" class="form-control Editor">{{ old('contact_content2', $page_content->contact_content2 ?? '') }}</textarea>
           
           </div>
        </div>
     </div>

     <div id="collapseAboutContent" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingAboutContent">
        <div class="panel-body">
           <div class="form-group form-float">
              <label class="form-label"> Image 3</label>
              <div class="form-line">
               <div class="row">
                  <div class="col-md-6">
                 <input type="file" name="contact_image3" accept="image/*" onchange="showSelectedImage3(this)" class="form-control @error('contact_image3') is-invalid @enderror" />
              </div>
              <div class="col-md-6">
              <img src="{{ !empty($page_content->contact_image3) ? asset('storage/pages/'.$page_content->contact_image3) : asset('admin_assets/images/default_img.png') }}" id="SelectedImg3" class="rounded-circle" title="About Content Image" alt="About Content Image" style="width: 90px;" />
           </div>
         </div>
      </div>
   </div>
           <div class="form-group form-float">
              <label class="form-label">Title</label>
              <div class="form-line">
                 <input type="text" name="image_name3" class="form-control @error('image_name3') is-invalid @enderror"  value="{{ old('image_name3',$page_content->image_name3 ?? '') }}"/>
                
              </div>
           </div>

           <div class="form-group form-float">
              <label class="form-label">Content</label>
          
                 <textarea name="contact_content3" cols="30" rows="6" name="about_content" id="about_content" class="form-control Editor">{{ old('contact_content3', $page_content->contact_content3 ?? '') }}</textarea>
           
           </div>
        </div>
     </div>
    </div>
 </div>
 
 {{-- End About Template image and detail--}}
 
 
 
 {{-- Start contact form Template  --}}
 <div class="panel-group content_template template_contact" id="accordion_about_content" role="tablist" aria-multiselectable="true">
    <div class="panel panel-success">
       <div class="panel-heading" role="tab" id="headingAboutContent">
          <h4 class="panel-title">
             <a role="button" data-toggle="collapse" data-parent="#accordion_about_content" href="#collapseAboutContent" aria-expanded="true" aria-controls="collapseAboutContent">
             Contact Form Heading & Description
             </a>
          </h4>
       </div>
       <div id="collapseAboutContent" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingAboutContent">
          <div class="panel-body">
             
             <div class="form-group form-float">
                <label class="form-label">Title</label>
                <div class="form-line">
                   <input type="text" name="form_heading" class="form-control @error('form_heading') is-invalid @enderror" value="{{ old('form_heading',$page_content->form_heading ?? '') }}"/>
                  
                </div>
             </div>
 
             <div class="form-group form-float">
                <label class="form-label">Content</label>
              
                   <textarea name="form_description" cols="30" rows="6" name="about_content" id="about_content" class="form-control Editor">{{ old('form_description', $page_content->form_description ?? '') }}</textarea>
          
             </div>
             <div class="form-group form-float">
                <label class="form-label">Map Link</label>
                <div class="form-line">
               
                        <textarea name="map_link" cols="30" rows="6" name="about_content" id="about_content" class="form-control">{{ old('map_link', $page_content->map_link ?? '') }}</textarea>
                
         </div>
      </div>
          </div>
       </div>
      
    </div>
 </div>
 
 {{-- End contact form Services --}}
 
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