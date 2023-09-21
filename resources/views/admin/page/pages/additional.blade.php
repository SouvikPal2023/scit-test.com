

<div class="panel-group template_additional template_additionals content_template" id="accordion_page" role="tablist" aria-multiselectable="true">
    <div class="panel panel-warning">
       <div class="panel-heading" role="tab" id="headingPage">
          <h4 class="panel-title">
             <a role="button" data-toggle="collapse" data-parent="#accordion_page" href="#collapsePage" aria-expanded="true" aria-controls="collapsePage">
             Page Module
             </a>
          </h4>
       </div>
       


       <div id="collapsePage" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingPage">
          <div class="panel-body">
             <h2 class="card-inside-title">Content</h2>
             <div class="form-group form-float">
             
                <div class="form-line">
                   <textarea name="main_content" cols="30" rows="6" class="form-control Editor @error('main_content') is-invalid @enderror">{!! old('main_content', $page_content->main_content ?? '') !!}</textarea>
                  
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>