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
                                <th scope="col">@lang('Title')</th>
                                {{--<th scope="col">@lang('Subject')</th> --}}
                                {{--<th scope="col">@lang('Test type')</th>--}}
                                {{--<th scope="col">@lang('Pass Percentage')</th>--}}
                                <th scope="col">@lang('Test Fee')</th>
                                <th scope="col">@lang('More Info.')</th>
                                {{--<th scope="col">@lang('Start Date')</th>--}}
                                {{--<th scope="col">@lang('End Date')</th>--}}
                                <th scope="col">@lang('Status')</th>
                                <th scope="col">@lang('Action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($exams as $exam)
                            <tr>
                                <td data-label="@lang('Title')">
                                    <?php   $imgcomma =  preg_split ("/\,/",$exam->image);
                                            $imgbreachet =str_replace('[', '', $imgcomma[0]);
                                            $imageName = (count($exam->examimages) > 0)? $exam->examimages[0]->image:'';
                                           $fnimg=str_replace('"', '', $imgbreachet); 
                                    ?>
                                    <div class="user">
                                        <div class="thumb"><img src="{{getImage('public/assets/images/exam/thumb_'. $imageName)}}" alt="image"></div>
                                        <span class="name" data-toggle="tooltip" title="{{$exam->title}}">{{shortDescription($exam->title,20)}}</span>
                                    </div>
                                </td>
                                {{--<td data-label="@lang('Subject')"><span class="text--small badge font-weight-normal badge--success">{{$exam->subject->name}}</span></td>--}}
                                {{--<td data-label="@lang('Exam type')"><span class="badge badge-pill {{$exam->question_type==1?'bg--primary':'bg--success'}} ">{{$exam->question_type==1?'MCQ':"Written"}}</span></td>--}}
                                {{--<td data-label="@lang('Pass Percentage')">{{$exam->pass_percentage}}%</td>--}}
                                <td data-label="@lang('Exam Fee')">{{$exam->exam_fee ?? 'Free'}} {{$exam->exam_fee? $general->cur_text:'' }}</td>
                                <td data-label="@lang('More Info.')" data-toggle="tooltip" title="More information"><button type="button" class="icon-btn btn--dark options" data-options="{{json_encode($exam)}}"><i class="las la-eye"></i> @lang('see')</button></td>
                                {{--<td data-label="@lang('Start Date')">{{$exam->start_date}}</td>--}}
                                {{--<td data-label="@lang('End Date')">{{$exam->end_date}}</td>--}}
                                <td data-label="@lang('Status')">
                                    @if($exam->status == 1)
                                        <span class="text--small badge font-weight-normal badge--success" data-toggle="tooltip" title="Test active">@lang('active')</span>
                                    @else
                                       <span class="text--small badge font-weight-normal badge--warning" data-toggle="tooltip" title="Test inactive">@lang('inactive')</span>
                                    @endif
                                </td>
                                <td data-label="Action">
                                    <a href="{{route('admin.exam.logic',$exam->id)}}" class="icon-btn btn--dark mr-2" data-toggle="tooltip" title="" data-original-title="Logic">
                                        @lang('Logic')
                                    </a>
                                    <a href="{{route('admin.exam.questions',$exam->id)}}" class="icon-btn btn--dark mr-2" data-toggle="tooltip" title="" data-original-title="Questions">
                                        @lang('Questions')
                                    </a>
                                    <a href="{{route('admin.exam.edit',$exam->id)}}" class="icon-btn mr-2" data-toggle="tooltip" title="" data-original-title="edit">
                                        <i class="las la-edit text--shadow"></i>
                                    </a>

                                    <a href="{{route('admin.exam.viewreport',['id'=>$exam->id])}}" class="icon-btn mr-2" data-toggle="tooltip" title="" data-original-title="View Report">
                                        <i class="las la-eye text--shadow"></i>
                                    </a>

                                    <a href="javascript:void(0)" data-category="{{$exam}}" data-route="{{ route('admin.exam.delete', $exam->id) }}"  class="icon-btn delete mr-2" data-toggle="tooltip" title="" data-original-title="@lang('Delete')">
                                        <i class="las la-trash text--shadow"></i>
                                    </a>

                                    <div class="btn-group">
                                        <button class="btn icon-btn btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="las la-file-export text--shadow"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{route('admin.exam.report',['id'=>$exam->id, 'type'=>'CSV'])}}">
                                                CSV
                                            </a>
                                            <a class="dropdown-item" href="{{route('admin.exam.report',['id'=>$exam->id,'type'=>'PDF'])}}">
                                                PDF
                                            </a>
                                        </div>
                                    </div>
                                   <!--  <a href="{{route('admin.exam.report',['id'=>$exam->id, 'type'=>$exam->id])}}" class="icon-btn" data-toggle="tooltip" title="" data-original-title="export report">
                                        <i class="las la-file-export text--shadow"></i>
                                    </a> -->
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
                    {{paginateLinks($exams)}}
                </div>
            </div><!-- card end -->
        </div>
           <!-- option list Modal -->
    <div class="modal fade" id="optionModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header bg--primary">
              <h5 class="modal-title text-white" id="exampleModalLabel">@lang('More Info.')</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <ul class="list-group">
              </ul>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
            </div>
          </div>
        </div>
      </div>
@endsection
@push('breadcrumb-plugins')
    <!-- Button trigger modal -->
    <a  href="{{route('admin.exam.add')}}" class="btn btn--primary mr-2 mt-2">
       @lang('+ Add Test')
    </a>
    <form action="{{route('admin.exam.all')}}" method="GET" class="form-inline float-sm-right bg--white mt-2">
        <div class="input-group has_append">
            <input type="text" name="search" class="form-control" placeholder="@lang('Search by title')" value="" autocomplete="off">
            <div class="input-group-append">
                <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>
@endpush
@push('script')
   <script>
       'use strict';
       $('.options').on('click',function () {
            var val = $(this).data('options')
            $('#optionModal').find('.list-group').empty()
                var el = ` <li class="list-group-item d-flex justify-content-between font-weight-bold">@lang('Duration')<span class="">${val.duration} @lang('minutes')
                </span></li>
                <li class="list-group-item d-flex justify-content-between font-weight-bold">@lang('Total Mark')<span class="">${val.totalmark}
                </span></li>
                <li class="list-group-item d-flex justify-content-between font-weight-bold">@lang('Attempt Count')<span class="">${val.attempt_count} @lang('times')
                </span></li>
                <li class="list-group-item d-flex justify-content-between font-weight-bold">@lang('Negative Marking')<span class="">${val.negative_marking==0?'No':'Yes'}
                </span></li>
                <li class="list-group-item d-flex justify-content-between font-weight-bold">@lang('Reduce Mark')<span class="">${val.reduce_mark??'N/A'}
                </span></li>
                `
                 $('#optionModal').find('.list-group').append(el)
            $('#optionModal').modal('show')
        });

        (function ($) {
            'use strict';
            $('.delete').on('click',function () { 

                swal({
                  title: "Are you sure?",
                  text: "Once deleted, you will not be able to recover this exam!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    window.location.href = $(this).data('route');
                  } 
                });
            });
        })(jQuery);
   </script>
@endpush