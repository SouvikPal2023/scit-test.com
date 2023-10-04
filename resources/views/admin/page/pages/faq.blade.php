{{-- Start About Template --}}


{{-- Start About Template Banner Section --}}

{{-- End About Template Banner Section --}}

{{--FAQ Template Content--}}
<div class="card shadow mb-4 content_template template_faq">
    <!-- Card Header - Accordion -->
    <a href="#collapseHomeBanner12" class="d-block card-header py-3" data-toggle="collapse" role="button"
        aria-expanded="true" aria-controls="collapseHomeBanner12">
        <h6 class="m-0 font-weight-bold text-primary">FAQs</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseHomeBanner12" style="">
        <div class="card-body">

            <div class="form-group form-float">
                <div class="form-group form-float">

                    <label class="form-label">Choose FAQs</label>
                    <div class="form-line">
                        <select class="form-control show-tick" name="faq_faq_id[]" multiple="">
                            @if ($faqs->count() > 0)
                            @foreach ($faqs as $add)
                            @if (!empty($page_content->faq_faq_id) && in_array($add->id, $page_content->faq_faq_id))
                            <option value="{{ $add->id }}" selected=""> {!! Str::limit($add->question,10) !!} </option>
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
{{--END FAQ Template Content Module--}}







{{-- End About Template --}}