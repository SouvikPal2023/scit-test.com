{{-- Start About Template --}}


{{-- Start About Template Banner Section --}}

{{-- End About Template Banner Section --}}


{{--How-it-works Module--}}
<div class="card shadow mb-4 content_template template_about">
    <!-- Card Header - Accordion -->
    <a href="#collapseHomeBanner12" class="d-block card-header py-3" data-toggle="collapse" role="button"
        aria-expanded="true" aria-controls="collapseHomeBanner12">
        <h6 class="m-0 font-weight-bold text-primary">How-it-works Module</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseHomeBanner12" style="">
        <div class="card-body">

            <div class="form-group form-float">
                <div class="form-group form-float">
                    <label class="form-label">Section Heading</label>
                    <div class="form-line">



                        <input type="text" name="how_section_heading"
                            class="form-control @error('how_section_heading') is-invalid @enderror"
                            value="{{ old('how_section_heading', $page_content->how_section_heading ?? '') }}"
                            placeholder="Section Heading" />



                    </div>

                    <label class="form-label">Sub Heading</label>
                    <div class="form-line">



                        <input type="text" name="how_sub_heading"
                            class="form-control @error('how_sub_heading') is-invalid @enderror"
                            value="{{ old('how_sub_heading', $page_content->how_sub_heading ?? '') }}"
                            placeholder="Sub Heading" />



                    </div>

                    <label class="form-label">Content</label>
                    <div class="form-line">

                        <textarea name="how_content" cols="30" rows="6" name="content"
                            class="form-control nicEdit @error('how_content') is-invalid @enderror">{!! old('how_content', $page_content->how_content ?? '') !!}</textarea>


                    </div>


                </div>

            </div>
        </div>
    </div>
</div>
    {{--END How-it-works Module Module--}}








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