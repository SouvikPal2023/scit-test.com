<div class="mb-3">
    <label class="form-label" for="Name">Name <span class="text-danger">*</span></label>
    <div class="input-group input-group-merge">

        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="Name"
            placeholder="Enter Name" value="{{old('name', isset($testimonial->name) ? $testimonial->name:'')}}"
            required />
    </div>
</div>



<div class="mb-3">
    <label class="form-label" for="Designation">Designation</label>
    <div class="input-group input-group-merge">

        <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror"
            id="Designation" placeholder="Enter Designation"
            value="{{old('designation', isset($testimonial->designation) ? $testimonial->designation:'')}}" />

    </div>
</div>



<div class="mb-3">
    <div class="row">
        <div class="col-md-7">
            <label for="ProfileImage" class="form-label">
                Image
            </label>
            <input type="file" name="image" accept="image/*" id="ProfileImage" onchange="showSelectedImage(this)"
                class="form-control @error('image') is-invalid @enderror" />
        </div>

        <div class="col-md-5">
            <img src="{{  isset($testimonial->image) ? config("app.url").Storage::url($testimonial->image) : asset('assetsnew/images/default-image.png') }}"
                id="SelectedImg" class="w-px-100 h-px-100 rounded-circle" title="Testimonial Image"
                alt="testimonial_image" style="
    height: 100px;
">
        </div>
    </div>
</div>





<div class="mb-3">
    <label class="form-label" for="TestimonialContent">Testimonial <span class="text-danger">*</span></label>
    <div class="input-group input-group-merge">

        <textarea class="nicEdit form-control @error('content') is-invalid @enderror" name="content"
            id="TestimonialContent"
            rows="8">{{old('content', isset($testimonial->content) ? $testimonial->content:'')}}</textarea>
    </div>
</div>





<button type="submit" class="btn btn-primary">{{isset($testimonial) ? 'Update' : 'Create'}}</button>
<a class="btn btn-dark" href="{{ route('admin.testimonial.index') }}">Cancel</a>




<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@include('admin.common.script')