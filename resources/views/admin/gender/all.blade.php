@extends('admin.layouts.app')

@section('panel')

    <div class="row">

        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--md  table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                            <tr>
                                <th scope="col">@lang('Gender Name')</th>
                                <th scope="col">@lang('Status')</th>
                                <th scope="col">@lang('Action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($genders as $gender)
                            <tr>
                               
                                <td data-label="@lang('Gender Name')">{{$gender->name}}</td>
                                <td data-label="@lang('Status')">
                                    @if ($gender->status == 1)
                                    <span class="text--small badge font-weight-normal badge--success">@lang('active')</span>
                                    @else
                                    <span class="text--small badge font-weight-normal badge--warning">@lang('inactive')</span>
                                    @endif
                                </td>
                                <td data-label="@lang('Action')">
                                    <a href="javascript:void(0)" data-gender="{{$gender}}" data-route="{{route('admin.exam.gender.update',$gender->id)}}" class="icon-btn edit" data-toggle="tooltip" title="@lang('edit category')">
                                        <i class="las la-edit text--shadow"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ $empty_message }}</td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                <div class="card-footer py-4">
                    {{paginateLinks($genders)}}
                </div>
            </div><!-- card end -->
        </div>


         <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{route('admin.exam.gender.store')}}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header bg--primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">@lang('Add Gender')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                        <div class="modal-body">
                        
                            <div class="form-group">
                                <label >@lang('Gender Name')</label>
                                <input type="text" class="form-control" name="name"  placeholder="@lang('Gender name')">
                            
                            </div>
                            <div class="form-group">
                                <label >@lang('Short Details')</label>
                                <textarea type="text" class="form-control" name="short_details"  placeholder="@lang('Short Details')"></textarea>
                            
                            </div>

                            <div class="form-group">
                                <label class="form-control-label font-weight-bold">@lang('Status') </label>
                                <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger" data-toggle="toggle" data-on="@lang('Active')" data-off="@lang('Inactive')" name="status">
                            </div>
                        </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                    <button type="submit" class="btn btn--primary">@lang('Submit')</button>
                    </div>
                </div>
        </form>
        </div>
      </div>


      
         <!-- edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header bg--primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">@lang('Edit Gender')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label >@lang('Gender Name')</label>
                                <input type="text" class="form-control" name="name"  placeholder="@lang('Gender name')">
                            
                            </div>
                            <div class="form-group">
                                <label >@lang('Short Details')</label>
                                <textarea type="text" class="form-control" name="short_details"  placeholder="@lang('Short Details')"></textarea>
                            
                            </div>

                            <div class="form-group">
                                <label class="form-control-label font-weight-bold">@lang('Status') </label>
                                <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger" data-toggle="toggle" data-on="@lang('Active')" data-off="@lang('Inactive')" name="status">
                            </div>
                           
                        </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                    <button type="submit" class="btn btn--primary">@lang('Submit')</button>
                    </div>
                </div>
        </form>
        </div>
      </div>

    </div>
@endsection



@push('breadcrumb-plugins')

    <!-- Button trigger modal -->
    <button type="button" class="btn btn--primary mr-3 mt-2" data-toggle="modal" data-target="#addModal">
      @lang('+ Add Gender')
    </button>
    
   
    

    <form action="{{route('admin.exam.genders')}}" method="GET" class="form-inline float-sm-right bg--white mt-2">
        <div class="input-group has_append">
            <input type="text" name="search" class="form-control" placeholder="@lang('Search by name')" value="" autocomplete="off">
            <div class="input-group-append">
                <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>
@endpush


@push('script')
    

    <script>

        $(function () {
            'use strict';
            $('.edit').on('click',function () { 
                var gender = $(this).data('gender')
                var route = $(this).data('route')

                $('#editModal').find('select[name=category_id]').val(gender.category_id)
                $('#editModal').find('input[name=name]').val(gender.name)
                $('#editModal').find('textarea[name=short_details]').val(gender.short_details)
                $('#editModal').find('form').attr('action',route)
                if(gender.status == 1){
                    $('#editModal').find('input[name=status]').bootstrapToggle('on')
                }
                if(gender.is_popular == 1){
                    $('#editModal').find('input[name=is_popular]').bootstrapToggle('on')
                }
                $('#editModal').modal('show')
                
            });
        });

    </script>

@endpush

