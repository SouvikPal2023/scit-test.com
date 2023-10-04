{{--How-it-works Module--}}
<div class="card shadow mb-4 content_template template_privacy">
    <!-- Card Header - Accordion -->
    <a href="#collapseHomeBanner12" class="d-block card-header py-3" data-toggle="collapse" role="button"
        aria-expanded="true" aria-controls="collapseHomeBanner12">
        <h6 class="m-0 font-weight-bold text-primary">Privacy Module</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseHomeBanner12" style="">
        <div class="card-body">

            <div class="form-group form-float">
                <div class="form-group form-float">
                   

                    <label class="form-label">Content</label>
                    <div class="form-line">

                        <textarea name="privacy_content"  name="content"
                            class="form-control nicEdit @error('privacy_content') is-invalid @enderror">{!! old('privacy_content', $page_content->privacy_content ?? '') !!}</textarea>


                    </div>


                </div>

            </div>
        </div>
    </div>
</div>
    {{--END How-it-works Module Module--}}