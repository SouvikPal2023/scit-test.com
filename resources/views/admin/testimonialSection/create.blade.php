@extends('admin.layouts.app')

@section('title', 'Create New Testimonial')

@section('panel')



<div class="row">
  <div class="col-xl-12">
    <div class="card mb-4">
      <!-- <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Create New Testimonial</h5>
      </div> -->
      <div class="card-body">
         <form class="forms-sample" 
               action="{{route('admin.testimonial.store')}}"
               method="POST" 
               autocomplete="off"
               enctype="multipart/form-data">

          @csrf
          @include('admin.testimonialSection.form')
        </form>
      </div>
    </div>
  </div>
</div>


@endsection