{{-- Start About Template --}}


{{-- Start About Template Banner Section --}}

{{-- End About Template Banner Section --}}



{{-- Start About Template About Content Section --}}
<div class="panel-group content_template template_about" id="accordion_about_content" role="tablist"
    aria-multiselectable="true">
    <div class="panel panel-success">
        <div class="panel-heading" role="tab" id="headingAboutContent">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion_about_content"
                    href="#collapseAboutContent" aria-expanded="true" aria-controls="collapseAboutContent">
                    About Content Module
                </a>
            </h4>
        </div>
        <div id="collapseAboutContent" class="panel-collapse collapse in" role="tabpanel"
            aria-labelledby="headingAboutContent">
            <div class="panel-body">
                <div class="form-group form-float">
                    <label class="form-label">Content Image</label>
                    <div class="form-line">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="file" name="about_image" accept="image/*"
                                    onchange="showSelectedImages(this)"
                                    class="form-control @error('about_image') is-invalid @enderror" />
                            </div>
                            <div class="col-md-6">
                                <img id="SelectedImghome"
                                    src="{{ !empty($page_content->about_image) ? asset('storage/pages/'.$page_content->about_image) :asset('admin_assets/images/default_img.png') }}"
                                    id="contentImage" class="rounded-circle" title="About Content Image"
                                    alt="About Content Image" style="width: 90px;" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group form-float">
                    <label class="form-label">Title</label>
                    <div class="form-line">
                        <input type="text" name="about_titles"
                            class="form-control @error('about_titles') is-invalid @enderror"
                            value="{{ old('about_titles', $page_content->about_titles ?? '') }}" />

                    </div>
                </div>
                <div class="form-group form-float">
                    <label class="form-label">Content</label>
                    <div class="form-line">
                        <textarea name="about_contents" cols="30" rows="6" id="about_content"
                            class="form-control Editor">{{ old('about_contents', $page_content->about_contents ?? '') }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End About Template About Content Section --}}



{{-- Start About Product --}}
<div class="panel-group content_template template_about template_about-only" id="accordion_home_featured_frame" role="tablist"
    aria-multiselectable="true">
    <div class="panel panel-success">
        <div class="panel-heading" role="tab" id="headingFeaturedFrame">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion_home_featured_frame"
                    href="#collapseHomeFeaturedFrame" aria-expanded="true" aria-controls="collapseHomeFeaturedFrame">
                    Product Module
                </a>
            </h4>
        </div>
        <div id="collapseHomeFeaturedFrame" class="panel-collapse collapse in" role="tabpanel"
            aria-labelledby="headingContent">
            <div class="panel-body">
                <div class="form-group form-float">
                    <label class="form-label">Product Background Image</label>
                    <div class="form-line">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="file" name="product_background_image" accept="image/*"
                                    onchange="showSelectedImagess(this)"
                                    class="form-control @error('product_background_image') is-invalid @enderror" />
                            </div>
                            <div class="col-md-6">
                                <img id="SelectedImghome2"
                                    src="{{ !empty($page_content->product_background_image) ? asset('storage/pages/'.$page_content->product_background_image) : asset('assets/img/default_img.png') }}"
                                    id="bannerFgImage" class="rounded-circle" title="About BG Image"
                                    alt="About BG Image" style="width: 90px;" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group form-float">
                    <label class="form-label">Title</label>
                    <div class="form-line">
                        <input type="text" name="about_product_title"
                            value="{{ old('about_product_title', $page_content->about_product_title ?? '') }}"
                            class="form-control @error('about_product_title') is-invalid @enderror" />
                    </div>
                </div>
                <div class="form-group form-float inpt-specific template_home-only">
                    <label class="form-label">Content</label>
                    <div class="form-line">
                        <textarea name="about_product_content" cols="30" rows="6" name="content"
                            class="form-control Editor @error('about_product_content') is-invalid @enderror">{!! old('about_product_content', $page_content->about_product_content ?? '') !!}</textarea>
                    </div>
                </div>
                <div class="form-group form-float">
                    <label class="form-label">Label</label>
                    <div class="form-line">
                        <input type="text" name="about_product_label"
                            value="{{ old('about_product_label', $page_content->about_product_label ?? '') }}"
                            class="form-control @error('about_product_label') is-invalid @enderror" />
                    </div>
                </div>
                <div class="form-group form-float">
                    <label class="form-label">Url</label>
                    <div class="form-line">
                        <input type="text" name="about_product_url"
                            value="{{ old('about_product_url', $page_content->about_product_url ?? '') }}"
                            class="form-control @error('about_product_url') is-invalid @enderror" />
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
{{-- End About  Product --}}



{{-- Start About Template Services --}}

{{-- End About Template Services --}}

{{-- End About Template --}}
<script>
function showSelectedImages(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#SelectedImghome').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}


function showSelectedImagess(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#SelectedImghome2').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>