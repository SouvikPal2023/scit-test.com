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

                                <th scope="col">@lang('Group Factor Name')</th>

                                <th scope="col">@lang('Slug')</th>

                                <th scope="col">@lang('Status')</th>

                                <th scope="col">@lang('Action')</th>

                                

                            </tr>

                            </thead>

                            <tbody class="sortable">
                            @php  $i = 1; @endphp 
                            @forelse($categories as $category)

                            <tr id="{{$i++}}">

                                <td data-label="@lang('Category Name')">{{$category->name}}</td>

                                <td data-label="@lang('Slug')">{{$category->slug}}</td>

                                <td data-label="@lang('Status')">
                                    <input type="hidden" name="groupid[]" value="{{ $category['id']}}"/>
                                    <input type="hidden" name="order[]" value="">
                                    @if ($category->status == 1)

                                    <span class="text--small badge font-weight-normal badge--success">@lang('active')</span>

                                    @else

                                    <span class="text--small badge font-weight-normal badge--warning">@lang('inactive')</span>

                                    @endif

                                </td>

                                <td data-label="@lang('Action')">

                                    <a href="javascript:void(0)" data-category="{{$category}}" data-route="{{route('admin.exam.group_factor.update',$category->id)}}" class="icon-btn edit mr-2" data-toggle="tooltip" title="@lang('edit category')">
                                        <i class="las la-edit text--shadow"></i>
                                    </a>

                                    <a href="javascript:void(0)" data-category="{{$category}}" data-route="{{route('admin.exam.group_factor.delete',$category->id)}}" class="icon-btn delete" data-toggle="tooltip" title="@lang('delete')">
                                        <i class="las la-trash text--shadow"></i>
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

                    {{-- paginateLinks($categories) --}}

                </div>

            </div><!-- card end -->

        </div>





         <!-- Add Modal -->

    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog" role="document">

            <form action="{{route('admin.exam.group_factor.store')}}" method="POST">

                @csrf

                <div class="modal-content">

                    <div class="modal-header bg--primary">

                    <h5 class="modal-title text-white" id="exampleModalLabel">@lang('Add Group Factor')</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                    </div>

                        <div class="modal-body">

                        

                            <div class="form-group">

                                <label >@lang('Group Factor Name')</label>

                                <input type="text" class="form-control" name="name"  placeholder="@lang('Group Factor name')">

                            

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

                    <h5 class="modal-title text-white" id="exampleModalLabel">@lang('Edit Group Factor')</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                    </div>

                        <div class="modal-body">

                        

                            <div class="form-group">

                                <label >@lang('Group Factor Name')</label>

                                <input type="text" class="form-control" name="name"  placeholder="@lang('Group Factor name')">

                            

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

      <i class="las la-plus"></i>  @lang('Add Group Factor')

    </button>


    <form action="{{route('admin.exam.group_factor')}}" method="GET" class="form-inline float-sm-right bg--white mt-2">

        <div class="input-group has_append">

            <input type="text" name="search" class="form-control" placeholder="@lang('Search by name')"  autocomplete="off">

            <div class="input-group-append">

                <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>

            </div>

        </div>

    </form>

@endpush

@push('script')

    <script>

        (function ($) {
            'use strict';

            $('.edit').on('click',function () { 
                var category = $(this).data('category')
                var route = $(this).data('route')

                $('#editModal').find('input[name=name]').val(category.name)

                $('#editModal').find('form').attr('action',route)
                if(category.status == 1){
                    $('#editModal').find('input[name=status]').bootstrapToggle('on')
                }
                $('#editModal').modal('show')
            });

        })(jQuery);

        (function ($) {
            'use strict';
            $('.delete').on('click',function () { 

                swal({
                  title: "Are you sure?",
                  text: "Once deleted, you will not be able to recover this Group Factor!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    window.location.href = $(this).data('route');
                    // swal("Group Factor has been deleted!", {
                    //   icon: "success",
                    // });
                  } 
                });

                // var category = $(this).data('category')
                // var route = $(this).data('route')
                // $('#editModal').find('input[name=name]').val(category.name)
                // $('#editModal').find('form').attr('action',route)
                // $('#editModal').modal('show');
            });
        })(jQuery);
    </script>
    /* drag and drop*/
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>

      $(function() {
            $("tbody.sortable").sortable({
              update: function() {
                  $.map($(this).find('tr'), function(el) {
                      var id = el.id;
                      var sorting_index = $(el).index();
                      $(el).find('input[name="order[]"]').val(sorting_index)
                      id = $(el).find('input[name="groupid[]"]').val();
                      $(el).find('.sr_no').text(sorting_index+1);
                      //console.log(id);
                      $.ajax({
                        url: '<?php echo route('admin.exam.group_factor.updateorder') ?>',
                        type: 'POST',
                        data: {
                          _token: "{{ csrf_token() }}",
                          order: sorting_index,
                          id: id,
                        },
                      })
                      .done(function() {
                        //console.log("success");
                      })
                      .fail(function() {
                        //console.log("error");
                      })
                      .always(function() {
                        //console.log("complete");
                      });
                  });
              }
          });
      });
    </script>
@endpush