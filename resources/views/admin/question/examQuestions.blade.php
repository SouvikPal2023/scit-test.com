@extends('admin.layouts.app')

<style type="text/css">
table.table .image-col-td {max-width: 740px;}
table.table .image-col-td .user .name {white-space: normal;}
body.dragging, body.dragging * {
  cursor: move !important;
}
span.name.data-qtn {
    /*min-width: 610px;*/
    min-width: 325px;
    white-space: initial;
}
.dragged {
  position: absolute;
  opacity: 0.5;
  z-index: 2000;
}

tbody.sortable tr.placeholder {
  position: relative;
  /** More li styles **/
}
tbody.sortable tr.placeholder:before {
  position: absolute;
  /** Define arrowhead **/
}

.ui-sortable-handle {
    background: #fff !important;
}
input.unique_id {
    /* height: 27px !important; */
    width: 100px;
    padding: 10px 7px !important;
    border: 1px solid #000;
    font-weight: 700;
    text-align: center;
}
</style>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--md  table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                            <tr>
                                <th scope="col">@lang('S.No')</th>
                                <th scope="col">@lang('Index No.')</th>
                                <th scope="col" colspan="2" class="image-col-th">@lang('Test')</th>
                                <th scope="col">@lang('Question Type')</th>
                                {{-- <th scope="col">@lang('Type')</th>--}}
                                <th scope="col">@lang('Ques. & Ans')</th>
                                {{-- <th scope="col">@lang('Mark')</th>--}}
                                <th scope="col">@lang('Action')</th>
                            </tr> 
                            </thead>
                            <tbody class="sortable">
                              @php $i=1; @endphp
                            @forelse($qstns as $qtn)
                            <tr id="{{$i}}">
                              
                                <td class="sr_no">{{$i++}}</td>
                                <td data-label="@lang('UniqueID')" >
                                    <input type="hidden" class="qid" value="{{$qtn->id}}">
                                    <input type="text" class="unique_id" style="width: 70px" value="{{$qtn->unique_id}}">

                                <td data-label="@lang('Test')" class="image-col-td">
                                    <?php  $imgcomma =  preg_split ("/\,/",$qtn->exam->image);
                                           $imgbreachet =str_replace('[', '', $imgcomma[0]);
                                           $fnimg=str_replace('"', '', $imgbreachet); ?>
                                    {{$qtn->exam->questionimages}}
                                    @if(!empty($qtn['questionimages'][0]))
                                    <div class="user">
                                        <div class="thumb"><img src="{{getImage('public/assets/images/question/'. $qtn['questionimages'][0]['image'])}}" alt="image"></div>
                                    </div>
                                    @else
                                    <div class="user">
                                        <div class="thumb"><img src="{{getImage('public/assets/images/exam/'. $fnimg)}}" alt="image"></div>
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="user">
                                      <span class="name data-qtn text-left" data-qtn="{{$qtn->question}}"></span>
                                    </div>
                                </td>
                              <td data-label="@lang('Question Type')">
                                <input type="hidden" name="order[]" value="">
                              <input type="hidden" name="question[]" value="{{$qtn->id}}">
                                <?php 
                                if ($qtn->choosecategory == 1) {
                                   echo 'Likert';
                                }elseif($qtn->choosecategory == 2){
                                  echo 'Radio button';
                                }else {
                                  echo 'True & False';
                                } ?>
                              </td> 
                              {{--<td data-label="@lang('Test type')"><span class="badge badge-pill {{$qtn->exam->question_type==1?'bg--primary':'bg--success'}} ">{{ $qtn->exam->question_type==1?'MCQ':"Written"}}</span></td>  --}}
                                <td data-label="@lang('Options')"><button type="button" class="icon-btn  btn--dark options" data-options="{{$qtn->options}}" data-qtn="{{$qtn->question}}"><i class="las la-eye"></i> @lang('see')</button></td>
                                {{-- @if ($exam->question_type==1)
                                <td data-label="@lang('Options')"><button type="button" class="icon-btn  btn--dark options" data-options="{{$qtn->options}}" data-qtn="{{$qtn->question}}"><i class="las la-eye"></i> @lang('see')</button></td>
                                @else
                                <td data-label="@lang('Answer')"><button type="button" class="icon-btn  btn--dark ans" data-ans="{{$qtn->written_ans}}" data-qtn="{{$qtn->question}}"><i class="las la-eye"></i> @lang('see')</button></td>
                                @endif 
                                <td data-label="@lang('Mark')"><span class="text--small badge font-weight-normal badge--success">{{$qtn->marks}}</span></td>  --}}

                                <td data-label="@lang('Action')">
                                      <a href="{{route('admin.exam.edit.mcq',$qtn->id)}}" class="icon-btn" data-toggle="tooltip" title="" data-original-title="edit">
                                          <i class="las la-edit text--shadow"></i>
                                      </a>
                                    {{--@if ($exam->question_type==1)
                                      <a href="{{route('admin.exam.edit.mcq',$qtn->id)}}" class="icon-btn" data-toggle="tooltip" title="" data-original-title="edit">
                                          <i class="las la-edit text--shadow"></i>
                                      </a>
                                    @elseif ($exam->question_type==2)
                                      <a href="{{route('admin.exam.edit.mcq',$qtn->id)}}" class="icon-btn" data-toggle="tooltip" title="" data-original-title="edit">
                                          <i class="las la-edit text--shadow"></i>
                                      </a>
                                    @else
                                      <a href="{{route('admin.exam.written.edit',$qtn->id)}}" class="icon-btn edit" data-toggle="tooltip" title="" data-original-title="edit">
                                          <i class="las la-edit text--shadow"></i>
                                      </a>
                                    @endif --}}
                                    <a href="javascript:void(0)" data-route="{{route('admin.question.remove',$qtn->id)}}" class="icon-btn btn--danger ml-2 delete" data-toggle="tooltip" title="" data-original-title="remove">
                                      <i class="las la-trash-alt text--shadow"></i>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ __($empty_message) }}</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                
            </div><!-- card end -->
        </div>
    <!-- option list Modal -->
    <div class="modal fade" id="optionModal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header bg--primary">
            <h5 class="modal-title text-white" id="exampleModalLabel">@lang('Question and Answer')</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="qtn mb-3 font-weight-bold"></div>
            <ul class="list-group">
            </ul>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Answer Modal -->
    <div class="modal fade" id="ansModal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header bg--primary">
            <h5 class="modal-title text-white" id="exampleModalLabel">@lang('Question and Answer')</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <div class="qtn mb-3 font-weight-bold"></div>
           <p class="answer border p-3"></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
         <button type="button" class="close ml-auto m-3" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
              <form action="" method="POST">
                  @csrf
                  <div class="modal-body text-center">
                      <i class="las la-exclamation-circle text-danger display-2 mb-15"></i>
                      <h4 class="text--secondary mb-15">@lang('Are You Sure Want to Delete This?')</h4>
                  </div>
              <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
                <button type="submit"  class="btn btn-danger del">@lang('Delete')</button>
              </div>
              </form>
        </div>
      </div>
  </div>
@endsection
@push('breadcrumb-plugins')
  <a  href="{{route('admin.exam.add.mcq',$exam->id)}}" class=" btn btn--primary mr-2 mt-2" >
    <i class="las la-plus"></i> @lang('Add Question')
  </a>
  {{-- @if ($exam->question_type==1)
   <a  href="{{route('admin.exam.add.mcq',$exam->id)}}" class=" btn btn--primary mr-2 mt-2" >
    <i class="las la-plus"></i> @lang('Add Question')
   </a>
   @else
   <a  href="{{route('admin.exam.question.written',$exam->id)}}" class="btn btn--primary mr-2 mt-2">
      <i class="las la-plus"></i> @lang('Add Question')
   </a>
   @endif --}}
    <a  href="{{route('admin.exam.all')}}" class="adM btn btn--primary mt-2">
     <i class="las la-list"></i>  @lang('Test List')
    </a>
@endpush
@push('script')
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>

      $(function() {
        $("tbody.sortable").sortable({
          update: function() {
              $.map($(this).find('tr'), function(el) {
                  var id = el.id;
                  var sorting_index = $(el).index();
                  $(el).find('input[name="order[]"]').val(sorting_index)
                  question_id = $(el).find('input[name="question[]"]').val();
                  $(el).find('.sr_no').text(sorting_index+1);
                  //console.log(sorting);
                  /*$.ajax({
                      url: '',
                      type: 'GET',
                      data: {
                          id: id,
                          sorting: sorting
                      },
                  });*/

                  $.ajax({
                    url: '<?php echo route('admin.exam.question.updateorder') ?>',
                    type: 'POST',
                    data: {
                      _token: "{{ csrf_token() }}",
                      order: sorting_index,
                      id: question_id,
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

    <script>
        'use strict';
        $('.options').on('click',function () {
            var options = $(this).data('options')
            var qtn = $(this).data('qtn')
            $('#optionModal').find('.list-group').empty()
            $('#optionModal').find('.qtn').empty()
            $.each(options, function (i, val) {
                var cls = val.correct_ans == 1 ? 'btn--success':'btn--danger'
                var ans = val.correct_ans == 1 ? 'las la-check-circle':'las la-times-circle'
                var el = ` <li class="list-group-item d-flex justify-content-between font-weight-bold">${val.option} </li>`
                 $('#optionModal').find('.list-group').append(el)
            });
            $('#optionModal').find('.qtn').append($.parseHTML(qtn))
            $('#optionModal').modal('show')
        });
        $('.ans').on('click',function () {
            var ans = $(this).data('ans')
            var qtn = $(this).data('qtn')
            $('#ansModal').find('.qtn').html(qtn)
            $('#ansModal').find('.answer').html(ans)
            $('#ansModal').modal('show')
        });
        $('.delete').on('click',function(){
          var route = $(this).data('route')
          var modal = $('#deleteModal');
          modal.find('form').attr('action',route)
          modal.modal('show');
        })


        $('.data-qtn').each(function(index, el) {
            $(this).html($(this).data('qtn'));
        });

        // $(document).on('change', '.orderUpdate', function(event) {
        //   event.preventDefault();
        //   /* Act on the event */
        //   $.ajax({
        //     url: '<?php echo route('admin.exam.question.updateorder') ?>',
        //     type: 'POST',
        //     data: {
        //       _token: "{{ csrf_token() }}",
        //       order: $(this).val(),
        //       id: $(this).data('id'),
        //     },
        //   })
        //   .done(function() {
        //     console.log("success");
        //   })
        //   .fail(function() {
        //     console.log("error");
        //   })
        //   .always(function() {
        //     console.log("complete");
        //   });
          
        // });
        // edit uniqueid code



        
        $(document).on('change', 'input.unique_id', function ()  {
          event.preventDefault();
          var quest_id = $(this).prev('input').val();
          var new_value = $(this).val();
          var className = $(this).attr("class");
          var _this = $(this);
          var url ="{{route('admin.exam.index.update')}}";
          $.ajax({
              url : url,
              method:'post',
              data:  '_token={{ csrf_token() }}&quest_id='+quest_id+'&unique_id='+new_value,
              dataType:'json',
              success:function(response){
                  
                  if (response.status == 0) {
                    //alert(response.message);
                    swal({
                      position:'top-end',
                      title: 'Oops...',
                      text :response.message,
                      button: "okay",
                      dangerMode:true,
                    });
                    _this.val(response.question_value);
                  }
              },
              error:function(response){
                 // var errors = response.responseJSON;
                 // console.log(response.message);
                 // var aaa = Object.keys(errors).map(function (key) { return errors[key]; });
                 // var b = aaa[1];
                 // var c = b["unique_id"];
                 // var error_msg = c.toString();
                 //  console.log(error_msg);
                 //  alert(error_msg);
                 //  console.log('class '+className);
                 //  var empty = "";
                 //  _this.val('');
                 //  // new_value.text(empty);
              }
          });
        })
    </script>
@endpush
@push('style')
    <style>
      .answer{
        text-align: justify
      }
    </style>
@endpush
   