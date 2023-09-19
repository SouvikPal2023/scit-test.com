<style>
    .test_container{
        height: 500px;
        overflow: scroll;
    }
    th {
        text-align: center;
        /* padding: 15px 5px!important ; */
    }
    .delete_button{       
        margin-bottom: 3px;
        padding: 2px 8px!important; 
        color: white;
    }
</style>

@extends('admin.layouts.app')
@section('panel')
    <div class="row ">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--md  table-responsive test_container">
                        <table class="table table--light style--two">
                            <thead>
                            <tr>
                                <th scope="col">@lang('User')</th>
                                <th scope="col">@lang('Test ID')</th>
                                <th scope="col">@lang('Sex')</th>
                                <th scope="col">@lang('Age')</th>
                                <th scope="col">@lang('Country')</th>
                                <th scope="col">@lang('Province/State')</th>
                                <th scope="col">@lang('Race')</th>
                                <?php foreach ($categories_list as $key => $value): ?>
                                    <!-- <th scope="col">{{$value['label']}}</th> -->
                                <?php endforeach ?>
                                <th scope="col">@lang('Total Marks')</th>
                                <th scope="col">@lang('Details')</th>
                            </tr>
                            </thead>
                            <tbody>
                          
                            @forelse($results['data'] as  $rkey=>$result)
                            <?php $resultobject = (object) $result; 
                            ?>
                            @if ($result['user_exist'])
                                <tr>
                                    <th scope="col">{{$result['name']}}</th>
                                    <th scope="col">{{$result['test_id']}}</th>
                                    <th scope="col">{{$result['sex']}}</th>
                                    <th scope="col">{{$result['age']}}</th>
                                    <th scope="col">{{$result['country']}}</th>
                                    <th scope="col">{{$result['state']}}</th>
                                    <th scope="col">{{$result['race']}}</th>
                                    <?php 
                                        $a = 1;
                                        while($a < $result['total_categoery']){ ?>
                                            <!-- <th scope="col">{{$result['label'.$a]}}</th> -->
                                        <?php $a++;
                                        }
                                    ?>
                                    <th scope="col">{{$result['resultMark']}}</th>
                                    <th scope="col">
                                        @if($result['resultMark'] >0 )
                                        <a class="btn--dark border--rounded text-white details p-1" href="{{route('admin.exam.getreport',['id'=>$result['id'],'examid'=>$result['examid']])}}" >View Report</a>
                                        @else
                                        <a class="btn--dark border--rounded text-white details p-1" onclick="getmsgnotfound()" >View Report</a>
                                        @endif
                                        <button class="btn--dark border--rounded text-white details p-1" data-details="{{json_encode($result)}}" data-consistency="{{$consistencytotal[$rkey]}}">@lang('More info.')</button>
                                        <a href="#" data_exam_id="{{ $examid }}" data_result_id="{{ $result['id'] }}" class="btn btn-danger delete_button">Delete</a>
                                    </th>
                                </tr>
                            @endif
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">NO DATA</td>
                                </tr>
                            @endforelse
                            
                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                <div class="card-footer py-4">
                  
                </div>
            </div><!-- card end -->
        </div>
    </div>
   <!-- card end -->
@endsection


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
                            <th>@lang('User')</th>
                            <td class="name"></td>
                        </tr>

                        <tr>
                            <th>@lang('Sex')</th>
                            <td class="sex"></td>
                        </tr>

                        <tr>
                            <th>@lang('Age')</th>
                            <td class="age"></td>
                        </tr>

                        <tr>
                            <th>@lang('Country')</th>
                            <td class="country"></td>
                        </tr>

                        <tr>
                            <th>@lang('State')</th>
                            <td class="state"></td>
                        </tr>

                        <tr>
                            <th>@lang('Race')</th>
                            <td class="race"></td>
                        </tr>

                        <?php foreach (array_values($categories_list) as $key => $value): ?>
                            <tr>
                                <th>{{$value['label']}}</th>
                                <td class="label<?php echo $key; ?>"></th>
                            </td>
                        <?php endforeach ?>

                        <tr>
                            <th>@lang('Total Mark')</th>
                            <td class="resultMark"></td>
                        </tr>

                        <tr>
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
                        </tr>

                        <tr>
                            <th>@lang('Consistency')</th>
                            <td class="consistency"></td>
                        </tr>

                        <tr>
                            <th>@lang('Percentile')</th>
                            <td class="overall_percentile"></td>
                        </tr>

                    </table>
                    <div class="overall_percentile_wrap p-2">
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
@push('breadcrumb-plugins')
    <a class="btn btn--primary" href="{{route('admin.exam.all')}}"><i class="las la-backward"></i> @lang('Go Back')</a>
@endpush

@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
@endpush
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
@endpush

{{-- {{ exit('hereee') }} --}}
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
            var details = $(this).data('details');
            var consistency = $(this).data('consistency');
            var categories_list = '<?php echo json_encode(array_values($categories_list)); ?>';
            let categories_listObj = JSON.parse(categories_list);
           
            d5_instance.update({
                skin: "flat",
                from: details.overall_percentile.toFixed(2),
            });
            $('.name').text(details.name);
            $('.sex').text(details.sex);
            $('.age').text(details.age);
            $('.country').text(details.country);
            $('.state').text(details.state);
            $('.race').text(details.race);
            $('.avarage').text(details.avarage.toFixed(2));
            $('.resultMark').text(details.resultMark);
            $('.overall_standard_deviation').text(details.overall_standard_deviation.toFixed(2));
            $('.overall_z_score').text(details.overall_z_score.toFixed(2));
            $('.overall_t_score').text(details.overall_t_score.toFixed(2));
            $('.overall_percentile').text(details.overall_percentile.toFixed(2));
            $(".consistency").text(consistency);
            let arrdetails = Object.entries(details);

            for (const key in categories_listObj) {
                if (categories_listObj.hasOwnProperty(key)) {
                    var add_key = parseInt(key)+1;
                    var daynamickey = 'label'+add_key;
                    $('.label'+key).text(details[daynamickey]);
                }
            }
            
            $('#moreinfoModal').modal('show');
        });
        function getmsgnotfound(){
              swal({
                    position:'top-end',
                    title: "Report not found",
                    icon: "warning",
                    buttons: "okay",
                    dangerMode: true,
                });
        }

        $(".delete_button").click(async function (){  
            let result_id = $(this).attr('data_result_id');
            let exam_id = $(this).attr('data_exam_id');

            console.log("clicked")     
            await swal({
                position:'top-end',
                title: 'Are you sure to wat to delete this report.',
                icon: "warning",
                buttons: "Okay",
                dangerMode: true,
                cancelButtonText: "Cancel",
            }).then(function(isConfirm) {
            console.log("clicked2")     
                console.log(isConfirm)
                if (isConfirm) {
                    let url = '{{ route("admin.exam.delete_result", ["result_id"=>":result_id", "exam_id" => ":exam_id"]) }}';
                    url= url.replace(':result_id', result_id);
                    url= url.replace(':exam_id', exam_id);
                    window.location.href = url;
                    console.log(url)
                }else{
                    // move_to_next_question = false;
                }
            });
        });
    </script>
@endpush