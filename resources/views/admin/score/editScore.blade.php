@extends('admin.layouts.app')

@section('panel')
<div class="container-fluid">

    <form action="{{route('admin.score.update',$score->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card b-radius--10 ">
            <div class="card-body">
                <div class="row p-3">
                    <div class="col-lg-12">
                       <div class="form-group">
                           <label class="font-weight-bold">@lang('Select Subject') <span class="text-danger">*</span></label>
                           <select  class="form-control" name="scorecategory" required>
                               <option value="1">@lang('Multiple Choice Option')</option>
                                <option value="2">@lang('Multiple Choice (no images)')</option>
                                <option value="3">@lang('True or False')</option>
                           </select>
                       </div>
                       <div class="form-group">
                           <label class="font-weight-bold">@lang('Score Title') <span class="text-danger">*</span></label>
                           <input  class="form-control" placeholder="@lang('Test Title')" type="text" name="scorevalue" required value="{{$score->scorevalue}}">
                       </div>

                       <div class="form-group">
                           <label class="font-weight-bold">@lang('Score Number') <span class="text-danger">*</span></label>
                           <input  class="form-control" placeholder="@lang('Score Number')" type="text" name="scorenumber" required value="{{$score->scorenumber}}">
                       </div>
                    </div>
                </div>
            </div>
            <div class="card-footer py-4">
                <button type="submit" class="btn btn--primary btn-block">@lang('Submit')</button>
            </div>
        </div>
    </form>
</div>
   <!-- card end -->

@endsection

@push('script-lib')
<script src="{{asset('public/assets/admin/js/datepicker.min.js')}}"></script>
<script src="{{asset('public/assets/admin/js/datepicker.en.js')}}"></script>
@endpush

@push('script')



@endpush

@push('breadcrumb-plugins')
    <a class="btn btn--primary" href="{{route('admin.score.all')}}"><i class="las la-backward"></i> @lang('Go Back')</a>
@endpush
