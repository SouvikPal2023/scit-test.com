{{-- Start About Template --}}


{{-- Start About Template Banner Section --}}

{{-- End About Template Banner Section --}}



{{-- Start contact Template Content Section --}}


<div class="panel-group content_template template_faq" id="accordion_page" role="tablist" aria-multiselectable="true">
    <div class="panel panel-warning">
       <div class="panel-heading" role="tab" id="headingAboutContent">
          <h4 class="panel-title">
             <a role="button" data-toggle="collapse" data-parent="#accordion_page" href="#collapsePage" aria-expanded="true" aria-controls="collapsePage">
            FAQs
             </a>
          </h4>
       </div>
       {{-- <div class="form-group form-float">
        <select class="form-control show-tick" name="faq_id[]" multiple="">
            <option value="" disabled> Please Select Option </option>
           @if ($faqs->count() > 0)
           @foreach ($faqs as $faq)

           @if (!empty($page_content->faq_id) && in_array($faq->id, $page_content->faq_id))
           <option value="{{ $faq->id }}" selected=""> {{ $faq->title }} </option>
           @else
           <option value="{{ $faq->id }}"> {{ $faq->title }} </option>
           @endif

           @endforeach
           @endif
        </select>
    </div> --}}
 </div>
</div>


 {{-- End Contact Template Content Section --}}





 {{-- End About Template --}}
