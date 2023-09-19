@extends($activeTemplate.'layouts.master')
@section('content')


<div class="transaction-area mt-30">
    <div class="row justify-content-center mb-30-none">
        <div class="col-xl-12 col-md-12 col-sm-12 mb-30">
            <div class="panel-table-area">
                <div class="panel-table border-0">
                    <div class="panel-card-widget-area pt-0 d-flex flex-wrap align-items-center justify-content-end">
                        <form action="" method="GET">
                            <div class="panel-card-widget-right">
                                <div class="panel-widget-search-area d-flex flex-wrap align-items-center">
                                        <div class="input-group">
                                            <input type="text" name="search" placeholder="@lang('Test Title')" value="{{$search??''}}">
                                            <div class="input-group-append">
                                                <button type="submit" class="input-group-text" id="my-addon"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                    </div>
                    <div class="panel-card-body table-responsive">
                        <table class="custom-table">
                            <thead>
                                <tr class="bg--primary">
                                    <th>@lang('Title')</th>
                                    {{--<th>@lang('Category')</th>
                                    <th>@lang('Subject')</th>
                                    <th>@lang('Status')</th>--}}
                                    <th>@lang('Details')</th>
                                    <th>@lang('Certificate')</th>
                                    <th>@lang('Reports')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($histories as $history)
                                    <tr>
                                        <td data-label="@lang('Title')">{{$history->exam->title}}</td>
                                        {{--<td data-label="@lang('Category')">{{$history->exam->subject->category->name}}</td>
                                        <td data-label="@lang('Subject')">{{$history->exam->subject->name}}</td>--}}
                                        {{--<td data-label="@lang('Subject')">
                                            @if ($history->result_status == 1)
                                                <span class="badge badge--success text-white">@lang('PASSED')</span>
                                            @else
                                            <span class="badge badge--danger text-white">@lang('FAILED')</span>
                                            @endif
                                        </td>--}}
                                        <td data-label="@lang('Details')"><button class="btn--dark border--rounded text-white details" data-details="{{$history}}" data-tq="{{$history->exam->questions->count()}}" data-exam="{{$history->exam}}" data-result="{{$history->result}}">@lang('More info.')</button></td>
                                        <td data-label="@lang('Reports')">
                                            @if ($history->result_status == 1)
                                            <a target="_blank" href="{{route('user.exam.mcq.certificate',$history->id)}}" class="btn--primary border--rounded p-1 text-white">@lang('view')</a>
                                            @else
                                                @lang('N/A')
                                            @endif
                                        </td>
                                        <td data-label="@lang('Certificate')">
                                            @if ($history->result_status == 1)
                                            <a target="_blank" href="{{route('user.exam.mcq.getreport',[$history->id,$history->exam_id])}}" class="btn--primary border--rounded p-1 text-white">@lang('view')</a>
                                            @else
                                                @lang('N/A')
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="12">@lang('No results available')</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        {{paginateLinks($histories,'')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="moreinfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">@lang('More info.')</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                <div class="panel-card-body ">
                    <table class="table  table-striped table-bordered">
                        <tr>
                            <th>@lang('Total Question')</th>
                            <td class="tq"></td>
                        </tr>
                        <!-- <tr>
                            <th>@lang('Total Mark')</th>
                            <td class="tm"></td>
                        </tr> -->
                        <!-- <tr>
                            <th>@lang('Pass Mark')</th>
                            <td class="pm"></td>
                        </tr>
                        <tr>
                            <th>@lang('Pass Mark Percentage')</th>
                            <td class="pmp"></td>
                        </tr>
                        <tr>
                            <th>@lang('Negative Marking')</th>
                            <td class="nm"></td>
                        </tr> -->
                        <!-- <tr>
                            <th>@lang('Total Time')</th>
                            <td class="tt"></td>
                        </tr> -->
                        <!-- <tr>
                            <th>@lang('Your mark')</th>
                            <td class="ym"></td>
                        </tr> -->
                        <!-- <tr>
                            <th>@lang('Total Correct Answer')</th>
                            <td class="tca"></td>
                        </tr>
                        <tr>
                            <th>@lang('Total Wrong Answer')</th>
                            <td class="twa"></td>
                        </tr> -->

                       <!--  <tr>
                            <th>@lang('Avarage')</th>
                            <td class="avarage"></td>
                        </tr>

                        <tr>
                            <th>@lang('Standard Deviation')</th>
                            <td class="overall_standard_deviation"></td>
                        </tr>

                        <tr>
                            <th>@lang('Z Score')</th>
                            <td class="overall_z_score"></td>
                        </tr>

                        <tr>
                            <th>@lang('T Score')</th>
                            <td class="overall_t_score"></td>
                        </tr> -->

                        <tr>
                            <th>@lang('Percentile')</th>
                            <td class="overall_percentile"></td>
                        </tr>

                        <!-- <tr>
                            <th>@lang('Result')</th>
                            <td class="res"></td>
                        </tr> -->
                    </table>
                    <div class="overall_percentile_wrap">
                        <input type="text" id="overall_percentile_slider" name="overall_percentile_slider" value="" />
                    </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn--secondary border--rounded text-white" data-dismiss="modal">@lang('Close')</button>
      </div>
    </div>
  </div>
</div>
@endsection
@push('script')
    <script>
        'use strict';

        var $d5 = $("#overall_percentile_slider");

        $d5.ionRangeSlider({
            type: "single",
            skin: "flat",
            min: 0,
            max: 99,
            from: 10,
            step: 1,       // default 1 (set step)
            grid: true,         // default false (enable grid),
            disable :true,
            grid_num: 10,
        });

        var d5_instance = $d5.data("ionRangeSlider");

        $('.details').on('click',function () {
            var result = $(this).data('result')

            d5_instance.update({
                skin: "flat",
                from: result.overall_percentile.toFixed(2),
            });

            var passed = "{{trans('PASSED')}}"
            var failed = "{{trans('FAILED')}}"
            var yes = "{{trans('Yes')}}"
            var no = "{{trans('No')}}"
            var minutes = "{{trans('minutes')}}"
            var details = $(this).data('details')
            var exam = $(this).data('exam')
            var tq = $(this).data('tq')
            
            var pm = (exam.totalmark*exam.pass_percentage)/100;
            $('.tq').text(tq);
            $('.tm').text(exam.totalmark);
            $('.pm').text(pm);
            $('.ym').text(details.result_mark);
            $('.tca').text(details.total_correct_ans);
            $('.twa').text(details.total_wrong_ans);
            $('.res').text(details.result_status == 1 ? passed:failed);
            $('.pmp').text(exam.pass_percentage);
            $('.nm').text(exam.negative_marking == 1 ? yes:no);
            $('.tt').text(exam.duration+' '+ minutes);
            
            // $('.avarage').text(result.avarage.toFixed(2));
            // $('.overall_standard_deviation').text(result.overall_standard_deviation.toFixed(2));
            // $('.overall_z_score').text(result.overall_z_score.toFixed(2));
            // $('.overall_t_score').text(result.overall_t_score.toFixed(2));
            $('.overall_percentile').text(result.overall_percentile.toFixed(2));
            $('#moreinfoModal').modal('show');
        });
    </script>
@endpush