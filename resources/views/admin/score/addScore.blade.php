@extends('admin.layouts.app')
@section('panel')
<div class="container-fluid">
    <form action="{{route('admin.score.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card b-radius--10 ">
            <div class="card-body">
              <h3>@lang('Likert')</h3>
                <div class="row p-3">
                    <div class="col-lg-6">
                      @foreach($score as $key => $result)
                      @if($result->scorecategory == 1)
                      <div class="form-group  d-flex justify-content-between">
                       <div class="form-group">
                           <label class="font-weight-bold">@lang('Score Title') <span class="text-danger">*</span></label>
                           <input  class="form-control" placeholder="@lang('Test Title')" type="text" name="linker[{{ $result->id }}][scorevalue]" value="{{$result->scorevalue}}">
                       </div>
                       <div class="form-group">
                           <label class="font-weight-bold">@lang('Score Number') <span class="text-danger">*</span></label>
                           <input  class="form-control" placeholder="@lang('Score Number')" type="text" name="linker[{{ $result->id }}][scorenumber]" value="{{$result->scorenumber}}">
                       </div>
                        <div class="icon">
                         <button type="button" class="icon-btn btn--danger  text-center text-nowrap remove"><i class="las la-minus-circle"></i></button>
                        </div>
                     </div>
                     @endif
                     @endforeach
                       <div class="append"></div>
                        <div class="form-group text-right">
                            <button type="button" class="btn btn--success mt-2" id="add"> <i class="las la-plus"></i> @lang('Add more options')</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
              <h3>@lang('True & False')</h3>
                <div class="row p-3">
                  @foreach($score as $key => $result)
                    @if($result->scorecategory == 3)
                      <div class="col-lg-6">
                        <div class="form-group">
                           <label class="font-weight-bold">@lang('Score Title') <span class="text-danger">*</span></label>
                           <input  class="form-control" placeholder="@lang('True Value')" type="text" name="truevalue[{{ $result->id }}][scorevalue]" value="{{$result->scorevalue}}">
                        </div>
                        <div class="form-group">
                          <label class="font-weight-bold">@lang('Score Number') <span class="text-danger">*</span></label>
                           <input  class="form-control" placeholder="@lang('True Number')" type="text" name="truevalue[{{ $result->id }}][scorenumber]" value="{{$result->scorenumber}}">
                        </div>
                      </div>
                    @endif
                  @endforeach
                </div>
            </div>
             <div class="card-body">
              <h3>@lang('Radio Button')</h3>
                <div class="row p-3">
                  <div class="col-lg-6">
                    @foreach($score as $key => $result)
                     @if($result->scorecategory == 2)
                      <div class="form-group  d-flex justify-content-between">
                       <div class="form-group">
                           <label class="font-weight-bold">@lang('Score Title') <span class="text-danger">*</span></label>
                           <input  class="form-control" placeholder="@lang('Test Title')" value="{{$result->scorevalue}}" type="text" name="radio[{{ $result->id }}][scorevalue]">
                       </div>
                       <div class="form-group">
                           <label class="font-weight-bold">@lang('Score Number') <span class="text-danger">*</span></label>
                           <input  class="form-control" placeholder="@lang('Score Number')" value="{{$result->scorenumber}}" type="text" name="radio[{{ $result->id }}][scorenumber]">
                       </div>
                       <div class="icon">
                         <button type="button" class="icon-btn btn--danger  text-center text-nowrap remove1"><i class="las la-minus-circle"></i></button>
                      </div>
                      </div>
                    @endif
                  @endforeach
                       <div class="append1"></div>
                        <div class="form-group text-right">
                            <button type="button" class="btn btn--success mt-2" id="add1"> <i class="las la-plus"></i> @lang('Add more options')</button>
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
<script type="text/javascript">
  'use strict'
   
  $(document).on('click', '#add', function () {
    var a =  Math.floor((Math.random() * 99999999) + 1);
    var b = Math.floor((Math.random() * 99999999) + 1);
        var element = `
        <div class="form-group  d-flex justify-content-between">
            <div class="form-group">
                 <label class="font-weight-bold">@lang('Score Title') <span class="text-danger">*</span></label>
                 <input  class="form-control" placeholder="@lang('Test Title')" type="text" name="linker[${a}][scorevalue]">
             </div>
             <div class="form-group">
                 <label class="font-weight-bold">@lang('Score Number') <span class="text-danger">*</span></label>
                 <input  class="form-control" placeholder="@lang('Score Number')" type="text" name="linker[${a}][scorenumber]">
             </div>
             <div class="icon">
             <button type="button" class="icon-btn btn--danger  text-center text-nowrap remove"><i class="las la-minus-circle"></i></button>
            </div>
             `;
        $('.append').append(element);
      })
      $(document).on('click', '.remove', function () {
          $(this).parents('.form-group').find('input').val('');
          $(this).parents('.form-group').remove();
      })
      
      $(document).on('click', '#add1', function () {
        var y = Math.floor((Math.random() * 99999999) + 1);
        var element = `
        <div class="form-group  d-flex justify-content-between">
            <div class="form-group">
                 <label class="font-weight-bold">@lang('Score Title') <span class="text-danger">*</span></label>
                 <input  class="form-control" placeholder="@lang('Test Title')" type="text" name="radio[${y}][scorevalue]">
             </div>
             <div class="form-group">
                 <label class="font-weight-bold">@lang('Score Number') <span class="text-danger">*</span></label>
                 <input  class="form-control" placeholder="@lang('Score Number')" type="text" name="radio[${y}][scorenumber]">
             </div>
             <div class="icon">
                 <button type="button" class="icon-btn btn--danger  text-center text-nowrap remove1"><i class="las la-minus-circle"></i></button>
                </div>
             </div>

          </div>
             `;
        $('.append1').append(element);
      })
      $(document).on('click', '.remove1', function () {
          $(this).parents('.form-group').find('input').val('');
          $(this).parent('.form-group').remove();
      })
</script>   
@endpush
@push('breadcrumb-plugins')
   <!--  <a class="btn btn--primary" href="{{route('admin.score.all')}}"><i class="las la-backward"></i> @lang('Go Back')</a> -->
@endpush
@push('style')
    <style>
         .icon {
              display: flex;
              align-items: center;
              padding-left: 1px;
              margin-top: 14px;
              padding: 2px;
            }

            .icon-btn.btn--danger.text-center.text-nowrap.remove {
              padding: 10px;
            }
            button.icon-btn.btn--danger.text-center.text-nowrap.remove1 {
                padding: 12px;
            }
    </style>
