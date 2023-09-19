@extends($activeTemplate.'layouts.master')
@section('content')
<style type="text/css">
    body{
        -webkit-user-select: none; /* Safari */
          -ms-user-select: none; /* IE 10 and IE 11 */
          user-select: none; /* Standard syntax */
    }
    #msform{ min-height: auto; }
    .radio-item-row label {      
        padding-top: 30px !important;
        padding-left: 0 !important;
        text-align: center;
        font-size: 14px !important;
    }
    /*.sidebar-menu{
        display: none;
    }*/
    .body-wrapper{

        margin-left: 0 !important;
        background-color: #00008b;
    }
    .quiz-area {
        background-color: white;
        border-radius: 15px;
        overflow: hidden;
    }
    .complated{
        color: #ffff;
    }
    .copyright-area p {
        color: #ffff;
    }
    #msform fieldset .radio-wrapper .radio-item-row input[type="radio"]:not(:checked) + label::before {
        left: 50%;
        transform: translateX(-50%);
    }

    #msform fieldset .radio-wrapper .radio-item-row input[type="radio"]:checked + label::before{
        left: 50%;
        transform: translateX(-50%);
    }
    #msform fieldset .radio-wrapper .radio-item-row  input[type="radio"]:checked + label::after {
        left: 50%;
        transform: translateX(-50%); /*all of thing msg*/
        transition: 0s !important;
    }

    .carousel-small .optionimage div.carousel {
        width: 70px;
        margin-bottom: 15px;
    }

    .radio-wrapper.carousel-small.d-flex {
        padding-left: 20px;
    }

    #msform fieldset .radio-wrapper input[type="radio"]:not(:checked) + label::before{
        border: 1px solid #2ecc71;
    }
    #msform fieldset .radio-wrapper input[type="radio"]:checked + label::before{
        border: 1px solid #2ecc71;
    }

    .radio-wrapper .optionimage {
        width: 100px;
        text-align: center;
    }

    .question{ font-size: 20px; }
    .progress-bar {
        background-color: #2ecc71;
    }
    .progress-bar h5{
        color: #fff;
    }
    .questions_box{
        background-color: #00008b;
    }
    .copyright-wrapper {
        padding: 30px;
        margin-left: unset; !important;
    }
    .carousel-small .optionimage div.carousel {
        margin: 0 auto 15px auto !important;
    }
    @media (max-width : 1024px){
         .radio-wrapper.carousel-small.d-flex {
            flex-wrap: wrap;
            width: 100%;
        }
        .radio-wrapper .optionimage {
            width: calc((100% - 40px)/2);
            text-align: center;
            margin-right: 20px !important;
        }
    }
    @media (min-width : 2560px){
         .radio-wrapper.carousel-small.d-flex {
            flex-wrap: wrap;
            width: 100%;
        }
        .radio-wrapper .optionimage {
            width: calc((100% - 40px)/2);
            text-align: center;
            margin-right: 20px !important;
        }
        #msform .fieldset .question{
            font-size: 34px !important;
            font-weight: 700;
        }
        .body-header-area .title , .complated,.radio-item-row label,.header-user-content span,.radio-item label,.radio-item-row label{
            font-size: 32px !important;
        }
        .action-button {
            font-size: 30px;
            padding: 22px 32px;
        }
        #msform fieldset .radio-wrapper input[type="radio"]:not(:checked) + label::before,#msform fieldset .radio-wrapper input[type="radio"]:checked + label::before{
                width: 30px;
                height: 30px;
                 padding-bottom: 10px;
        }
        #msform fieldset .radio-wrapper input[type="radio"]:checked + label::after{
            width: 20px;
            height: 20px;
            top: 5px;

        }
        .radio-item-row label{
                padding-top: 50px !important;
                padding-bottom: 20px !important;
                /*width: 170px;
*/
        }
        .carousel-small .optionimage div.carousel{
                width: 110px;
                padding-bottom: 15px;
        }
        /*fieldset.fieldset >.form-row{
            width: 100%;
        }*/
        fieldset.fieldset >.form-row >.form-group{
            width: 70%;
        }
        /*fieldset.fieldset >.form-row >.form-group>.radio-wrapper{
           width: 100%;
        }*/
    }
    .MsoNormal span{
        font-size: 18pt!important;
    }
</style> 
<BR>
<h3 class="complated mb-2">Progress <span id="counting">0</span><span>/<?php echo $exam->questions->count(); ?></span></h3>
<div class="progress progress-striped active">
    <div class="progress-bar bg-progress progress-bar-animated" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax=""><h5 id="count-process" style="padding-top: 12px;"></h5>
    </div>
</div>

 <!-- Modal HTML -->
    <div id="myModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">                  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>All questions must be answered</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

<div class="transaction-area">
    <div class="row flex-row-reverse justify-content-center  mb-30-none pb-50 pt-50 mt-30 questions_box">
        <!-- <div class="col-xl-3 col-md-6 col-sm-6 mb-30">
            <div class="quiz-instruction-area">
                <div class="quiz-instruction-content">
                    <h3 class="title">@lang('Test Instruction')</h3>
                    <p>@php
                        echo $exam->instruction
                    @endphp</p>
                </div>
            </div>
        </div> -->
        <div class="col-xl-8 col-md-12 col-sm-12  pl-0 ">
            <div class="quiz-area">
                <div class="panel-body multi_step_form">
                   <!--  <div class="time-tracker">
                        <p>@lang('Time Remaining') : <span id="demo"></span></p>
                    </div> -->
                    <form id="msform" action="{{route('user.exam.submission.script')}}" method="POST">
                        @csrf
                        <input type="hidden" name="examId" value="{{$exam->id}}">
                        <?php  $question_count = 1; ?>
                        @if ($exam->question_type == 1)
                        @foreach ($questions as $qtn)
                            @php
                           
                             $i = rand(1,2000);
                             if($exam->option_suffle == 1){
                                 $options = $qtn->options->shuffle();
                                } else {
                                 $options = $qtn->options;
                             }
                            @endphp
                            {{-- dd($new_result_option,$new_result_option[$qtn->id],$qtn->id) --}}
                        <fieldset class="fieldset">
                            <div class="d-flex align-items-top">
                                <div class="col-lg-8 p-0 pr-4 pt-2">
                                    {{-- --------------{{ $qtn->unique_id }} --}}
                                    @if(preg_match('~\class="MsoNormal"\b~',__($qtn->question)) && (strpos(__($qtn->question), '<span') !== 0))
                                        <p class="question">
                                            {{$question_count}}.
                                            <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height: normal">@lang($qtn->question)</p>
                                        </p>
                                    {{-- @elseif((strpos(__($qtn->question), 'class="MsoNormal"') !== 0) && (strpos(__($qtn->question), '<span') == 0)) --}}
                                    @elseif(preg_match('~\class="MsoNormal"\b~',__($qtn->question)) && (strpos(__($qtn->question), '<span') == 0))
                                    {{ __($qtn->question)  }}
                                        <p class="question">
                                            {{$question_count}}.
                                            <span style="font-size:10.0pt">@lang($qtn->question)</span>
                                        </p>
                                    @elseif(strpos(__($qtn->question), '<span') == 0)
                                        <p class="question">
                                            {{$question_count}}.
                                            <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height: normal">
                                                <span style="font-size:10.0pt">@lang($qtn->question)</span>
                                            </p>
                                        </p>                                    
                                    @else
                                        <p class="question">{{$question_count}}. @lang($qtn->question)</p>
                                    @endif
                                        {{-- <p class="question">{{$question_count}}. @lang($qtn->question)</p> --}}
                                    </p>
                                </div>
                                <div class="optionimage image-upload col-lg-4 p-0">
                                    <div id="carouselExampleControls111" class="carousel slide avatar-preview thumb" data-interval="false" data-ride="carousel{{$loop->iteration}}">
                                        <div class="carousel-inner profilePicPreview">
                                        <?php $i =1 ?>
                                        @foreach($qtn->questionimages as $optoinimg)
                                            <div class=" carousel-item @if($i ==1)active @endif">
                                                <img src="{{url(getImage('public/assets/images/question/'.$optoinimg->image,'850x560') )}}" class="d-block w-100" alt="">
                                            </div> <?php $i++ ?>
                                        @endforeach
                                        </div>
                                        <?php if ($i > 2): ?>
                                            <a class="carousel-control-prev" href="#carouselExampleControls111" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleControls111" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        <?php endif ?>
                                    </div> 
                                </div>
                            </div>
                            @if(!empty($new_result_option)) 
                                <input type="hidden" name="retest" value="1">
                            @endif
                            @if($qtn->choosecategory == 1)
                            <!-- <p class="title h5 pt-4">@lang('Select Options :')</p> -->
                            <div class="form-row without-image pt-4">
                                <div class="form-group mb-0 col-lg-12 p-0 d-flex justify-content-center">
                                    <div class="radio-wrapper carousel-small d-flex">
                                        @php $new_optkey= 0; $optplus =0; @endphp
                                        @foreach ($options as $optkey=>$opt)
                                            <div class="optionimage pb-2 mr-4 image-upload">
                                                <div id="carouselExampleControls{{$loop->iteration}}" class="carousel slide avatar-preview thumb" data-interval="false" data-ride="carousel{{$loop->iteration}}">
                                                    <div class="carousel-inner profilePicPreview">
                                                        <?php $i =1 ?>
                                                        @foreach($opt->optionsimages as $optoinimg)
                                                            <div class=" carousel-item @if($i ==1)active @endif">
                                                                <img src="{{url(getImage('public/assets/images/option/'.$optoinimg->image,'850x560') )}}" class="d-block w-100" alt="">
                                                            </div> <?php $i++ ?>
                                                        @endforeach
                                                    </div>
                                                    <?php if ($i > 2): ?>
                                                        <a class="carousel-control-prev" href="#carouselExampleControls{{$loop->iteration}}" role="button" data-slide="prev">
                                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                        <a class="carousel-control-next" href="#carouselExampleControls{{$loop->iteration}}" role="button" data-slide="next">
                                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                    <?php endif ?>
                                                </div>
                                                <div class="radio-item radio-item-row">
                                                    @php  $optplus = $optkey + 1 ; @endphp
                                                    <input type="radio" id="test{{$opt->id}}" name="ans[{{$qtn->id}}]" class="test" data-key="{{$optkey}}"  value="{{$opt->id}}" unique_id="{{$qtn->unique_id}}" @if(!empty($new_result_option)) {{ ($new_result_option[$qtn->id][0] == $optplus)? 'checked="checked"':'' }} @endif>
                                                    <label for="test{{$opt->id}}" class="mb-3">{{$opt->option}} </label>
                                                </div>
                                                
                                            </div>
                                        @php $new_optkey = $optkey; @endphp
                                        @endforeach
                                        <input type="hidden" name="uniqueId[{{$qtn->id}}]" value="{{$qtn->unique_id}}">
                                        <input type="hidden" class="" name="testtotalselect[{{$qtn->id}}]" value="{{++$new_optkey}}">
                                        <input type="hidden" class="selectInput" name="testselect[{{$qtn->id}}]" value="">
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if($qtn->choosecategory == 2)
                           <!--  <p class="title h5 pt-4">@lang('Select Options :')</p> -->
                                <div class="form-row pt-4 d-flex justify-content-center">
                                    <div class="form-group mb-2 ">
                                        <div class="radio-wrapper d-flex pl-2">
                                            @php $new_optkey= 0; $optplus1 =0; @endphp
                                            @foreach ($options as $optkey=>$opt)
                                                <div class="optionimage pb-2 mr-4 image-upload">
                                                    <div class="radio-item radio-item-row">
                                                         @php  $optplus1 = $optkey + 1 ; @endphp
                                                        <input type="radio" id="test{{$opt->id}}" name="ans[{{$qtn->id}}]" value="{{$opt->id}}" class="test" data-key="{{$optkey}}" unique_id="{{$qtn->unique_id}}" @if(!empty($new_result_option)) {{ ($new_result_option[$qtn->id][0] == $optplus1)? 'checked="checked"':'' }} @endif>
                                                        <label for="test{{$opt->id}}" class="mb-3">{{$opt->option}} </label>
                                                    </div>
                                                </div>
                                                
                                                @php $new_optkey = $optkey; @endphp
                                            @endforeach
                                            <input type="hidden" name="uniqueId[{{$qtn->id}}]" value="{{$qtn->unique_id}}">
                                            <input type="hidden" class="" name="testtotalselect[{{$qtn->id}}]" value="{{++$new_optkey}}">
                                            <input type="hidden" class="selectInput" name="testselect[{{$qtn->id}}]" value="">
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($qtn->choosecategory == 3)
                            <!-- <p class="title h5 pt-4">@lang('Select Options :')</p> -->
                                <div class="form-row pt-4  ">
                                    <div class="form-group mb-0 col-lg-12 d-flex justify-content-center">
                                        <div class="radio-wrapper d-flex">
                                            @php $new_optkey= 0; $optplus2 =0; @endphp
                                            @foreach ($options as $optkey=>$opt)
                                                <div class="optionimage pb-2 mr-4 image-upload">
                                                    <div class="radio-item radio-item-row">
                                                         @php  $optplus2 = $optkey + 1 ; @endphp
                                                        <input type="radio"  class="test" id="test{{$opt->id}}" name="ans[{{$qtn->id}}]" value="{{$opt->id}}" data-key="{{$optkey}}" unique_id="{{$qtn->unique_id}}" @if(!empty($new_result_option)) {{ ($new_result_option[$qtn->id][0] == $optplus2)? 'checked="checked"':'' }} @endif>
                                                        <label for="test{{$opt->id}}" class="mb-3">{{$opt->option}} </label>
                                                    </div>
                                                </div>
                                                
                                                 @php $new_optkey = $optkey; @endphp
                                            @endforeach
                                            <input type="hidden" name="uniqueId[{{$qtn->id}}]" value="{{$qtn->unique_id}}">
                                            <input type="hidden" class="" name="testtotalselect[{{$qtn->id}}]" value="{{++$new_optkey}}">
                                            <input type="hidden" class="selectInput" name="testselect[{{$qtn->id}}]" value="">
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if ($loop->iteration != 1)
                               <button type="button" class="previous action-button previous_button">@lang('Back')</button>
                            @endif
                            @if ($loop->last)
                                <button class="next action-button submitform finishsubmit finish" id="">@lang("Finish")</button>
                                <a class="finishid action-button" id="" style="color: white; text-align: center;">@lang("Finish")</a>
                            @else
                               <button type="button" class="next action-button">@lang('NEXT')</button>
                            @endif

                            @php $question_count++; @endphp
                        </fieldset>
                        @endforeach
                        @else
                            @foreach ($questions as $key => $qtn)
                            <fieldset class="fieldset">
                                <h3 class="title">@lang($qtn->question)</h3>
                                <div class="form-row">
                                    <div class="form-group col-lg-12">
                                        <textarea rows="8" class="nicEdit" name="written[{{$qtn->id}}]" placeholder="@lang('Write Here')"></textarea>
                                    </div>
                                </div>
                                @if ($loop->iteration != 1)
                                <button type="button" class="previous action-button previous_button">@lang('Back')</button>
                                @endif
                                @if ($loop->last)
                                    <button  class="next action-button submitform finishid" id="">@lang("Finish")</button>
                                @else
                                <button type="button" class="next action-button">@lang('NEXT')</button>
                                @endif

                            </fieldset>
                            @endforeach
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
@endpush
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>

    (function ($) {
        "use strict";
        //* Form js
        // form submit
        $(".finishsubmit").click(function(){
            // alert('submit');
            $('#msform').submit();
        });
        function verificationForm() {
            //jQuery time
            var current_fs, next_fs, previous_fs;
            var left, opacity, scale;
            var animating;
            
            $(".finishid").on('click',function () {
                //alert($(this).parent('.fieldset').find('input[type="radio"]:checked').length);
                if($(this).parent('.fieldset').find('input[type="radio"]:checked').length == 0){
                    swal({
                        position:'top-end',
                        title: "Please select an answer",
                        icon: "warning",
                        buttons: "Okay",
                        dangerMode: true,
                    });

                    $(".swal-button--danger").click(function () {
                        // alert('test');
                        $(".test").addClass("lastquestion");
                    })
                   /*verificationForm();
                  return false;*/
                }else{
                    //alert('ssss');
                    $(".finishid").hide(); 
                    $(".finish").show();
                }  
            });
           /* $("body").on("click",".lastquestion",function(){
                $(".finishid").hide(); 
                $(".finish").show();
            });*/

             $(".next").on('click',async function () {
                if (animating) return false;
                animating = true;                
                let move_to_next_question = false;
                if($(this).parent('.fieldset').find('input[type="radio"]:checked').length > 0)
                {
                    let unique_id = $(this).parent('.fieldset').find(`input[type="radio"]:checked`).attr('unique_id');
                    let its_value = $(this).parent('.fieldset').find(`input[type="radio"]:checked`).attr('data-key');
                    let its_label = $(this).parent('.fieldset').find('input[type="radio"]:checked').parent().text().toLowerCase();
                    // if((unique_id == 136 || unique_id == 181 || unique_id == 188 || unique_id == 517 ) && (its_value < 5)){
                    //     await swal({
                    //         position:'top-end',
                    //         title: 'To produce the most accurate report for you, it is important that you answer all items truthfully.  You can review and change your answers by pressing the "Back" button',
                    //         icon: "warning",
                    //         buttons: "Okay",
                    //         dangerMode: true,
                    //         closeOnClickOutside : false,
                    //         closeOnEsc : false,
                    //     }).then(function(isConfirm) {
                    //         console.log(isConfirm)
                    //         if (isConfirm) {
                    //             move_to_next_question = true;
                    //         }else{
                    //             move_to_next_question = false;
                    //         }
                    //     })
                    // }else if((unique_id == 536 || unique_id == 581 || unique_id == 588|| unique_id == 104 || unique_id == 504 || unique_id == 580 || unique_id == 114 || unique_id == 117) && (its_value < 4)){
                    //     await swal({
                    //         position:'top-end',
                    //         title: 'To produce the most accurate report for you, it is important that you answer all items truthfully.  You can review and change your answers by pressing the "Back" button',
                    //         icon: "warning",
                    //         buttons: "Okay",
                    //         dangerMode: true,
                    //         closeOnClickOutside : false,
                    //         closeOnEsc : false,
                    //     }).then(function(isConfirm) {
                    //         console.log(isConfirm)
                    //         if (isConfirm) {
                    //             move_to_next_question = true;
                    //         }else{
                    //             move_to_next_question = false;
                    //         }
                    //     })
                    // }else if((unique_id == 117) && (its_label == 'true')){
                    //     await swal({
                    //         position:'top-end',
                    //         title: 'If you are taking this test only for your own infomation, please make sure that you are answering the questions truthfully.  You can review and change your answers by pressing the "Back" button.  You are under no obligation to share your results with anyone else if you do not want to.',
                    //         icon: "warning",
                    //         buttons: "Okay",
                    //         dangerMode: true,
                    //         closeOnClickOutside : false,
                    //         closeOnEsc : false,
                    //     }).then(function(isConfirm) {
                    //         console.log(isConfirm)
                    //         if (isConfirm) {
                    //             move_to_next_question = true;
                    //         }else{
                    //             move_to_next_question = false;
                    //         }
                    //     })
                    if((unique_id == 136 || unique_id == 188 || unique_id == 536 || unique_id == 588 ) && (its_value < 3)){
                        await swal({
                            position:'top-end',
                            title: 'To produce the most accurate report for you, it is important that you answer all items truthfully.  You can review and change your answers by pressing the "Back" button',
                            icon: "warning",
                            buttons: "Okay",
                            dangerMode: true,
                            closeOnClickOutside : false,
                            closeOnEsc : false,
                        }).then(function(isConfirm) {
                            console.log(isConfirm)
                            if (isConfirm) {
                                move_to_next_question = true;
                            }else{
                                move_to_next_question = false;
                            }
                        })
                    }else if((unique_id == 517 || unique_id == 581 ) && (its_value > 2)){
                        await swal({
                            position:'top-end',
                            title: 'To produce the most accurate report for you, it is important that you answer all items truthfully.  You can review and change your answers by pressing the "Back" button',
                            icon: "warning",
                            buttons: "Okay",
                            dangerMode: true,
                            closeOnClickOutside : false,
                            closeOnEsc : false,
                        }).then(function(isConfirm) {
                            console.log(isConfirm)
                            if (isConfirm) {
                                move_to_next_question = true;
                            }else{
                                move_to_next_question = false;
                            }
                        })
                    }else if((unique_id == 117 || unique_id == 181 ) && (its_value > 2)){
                        await swal({
                            position:'top-end',
                            title: 'To produce the most accurate report for you, it is important that you answer all items truthfully.  You can review and change your answers by pressing the "Back" button',
                            icon: "warning",
                            buttons: "Okay",
                            dangerMode: true,
                            closeOnClickOutside : false,
                            closeOnEsc : false,
                        }).then(function(isConfirm) {
                            console.log(isConfirm)
                            if (isConfirm) {
                                move_to_next_question = true;
                            }else{
                                move_to_next_question = false;
                            }
                        })
                    }else{
                        move_to_next_question = true;
                    }

                        var totalPrice = 0,
                        values  = [];
                        var percentage = 0;
                        var input_count = 1 ;
                        var select_input = $(this).data("key");
                        // $(".selectInput").val(select_input + 1);
                        $(this).parents(".radio-wrapper").find(".selectInput").val(select_input + 1);
                        $('input[type=radio]').each(function(){
                            if( $(this).is(':checked') ) {
                                values.push($(this).length);
                                totalPrice += parseInt($(this).length);
                              //  valeur += parseInt($("input:radio:checked"));
                              var totalque = <?php echo $exam->questions->count(); ?>;
                              console.log('Total '+totalque);
                              percentage = parseInt((totalPrice/totalque)*100);

                              $('#counting').text(totalPrice);
                              $('.finishid').attr('id', totalPrice);
                              $('#count-process').text(percentage+'%');
                              $('.progress-bar').css('width', percentage+'%').attr('aria-valuenow', percentage); 

                              console.log(percentage);
                                if(percentage == 100){
                                    $(".finishsubmit").show();
                                    $(".finishid").hide();
                                }else{
                                    $(".finishsubmit").hide();
                                }
                                //$(".finishsubmit").show();
                            }
                        });
                    
                    $('.finishid').on('click', function(){
                        // alert('test');
                        var totalPrice = 0,
                        values  = [];
                        var percentage = 0;
                        var input_count = 1 ;
                        var select_input = $(this).data("key");
                        // $(".selectInput").val(select_input + 1);
                        $(this).parents(".radio-wrapper").find(".selectInput").val(select_input + 1);
                        $('input[type=radio]').each(function(){
                            if( $(this).is(':checked') ) {
                                values.push($(this).length);
                                totalPrice += parseInt($(this).length);
                              //  valeur += parseInt($("input:radio:checked"));
                              var totalque = <?php echo $exam->questions->count(); ?>;
                              console.log('Total '+totalque);
                              percentage = parseInt((totalPrice/totalque)*100);

                              $('#counting').text(totalPrice);
                              $('.finishid').attr('id', totalPrice);
                              $('#count-process').text(percentage+'%');
                              $('.progress-bar').css('width', percentage+'%').attr('aria-valuenow', percentage); 

                              console.log(percentage);
                                if(percentage == 100){
                                    $(".finishsubmit").show();
                                    $(".finishid").hide();
                                    $("#msform").submit();
                                }else{
                                    $(".finishsubmit").hide();
                                }
                            }
                        });
                    });

                }else{
                  //alert("plase select Answer");
                    swal({
                        position:'top-end',
                        title: "Please select an answer",
                        icon: "warning",
                        buttons: "Okay",
                        dangerMode: true,
                    });
                  //  Function Calls again 
                   verificationForm();
                  return false;
                } // check question answer select or not.

                
                if(move_to_next_question){
                    current_fs = $(this).parent();
                    next_fs = $(this).parent().next();
                    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active done");
                    next_fs.show();
                    current_fs.animate({
                        opacity: 0
                    },{
                        step: function (now, mx) {
                            scale = 1 - (1 - now) * 0.2;
                            left = (now * 50) + "%";
                            opacity = 1 - now;
                            current_fs.css({
                                'transform': 'scale(' + scale + ')',
                                //'position': 'absolute'
                            });
                            next_fs.css({
                                'left': left,
                                'opacity': opacity
                            });
                        },
                        duration: 0,
                        complete: function () {
                            current_fs.hide();
                            animating = false;
                        },
                        easing: 'easeInOutBack'
                    });    
                }       
                 
            });

            $(".next").on('click',function () {
                if (animating) return false;
                animating = true;                
                
                if($(this).parent('.fieldset').find('input[type="radio"]:checked').length > 0)
                {

                        var totalPrice = 0,
                        values  = [];
                        var percentage = 0;
                        var input_count = 1 ;
                        var select_input = $(this).data("key");
                        // $(".selectInput").val(select_input + 1);
                        $(this).parents(".radio-wrapper").find(".selectInput").val(select_input + 1);
                        $('input[type=radio]').each(function(){
                            if( $(this).is(':checked') ) {
                                values.push($(this).length);
                                totalPrice += parseInt($(this).length);
                              //  valeur += parseInt($("input:radio:checked"));
                              var totalque = <?php echo $exam->questions->count(); ?>;
                              console.log('Total '+totalque);
                              percentage = parseInt((totalPrice/totalque)*100);

                              $('#counting').text(totalPrice);
                              $('.finishid').attr('id', totalPrice);
                              $('#count-process').text(percentage+'%');
                              $('.progress-bar').css('width', percentage+'%').attr('aria-valuenow', percentage); 

                              console.log(percentage);
                                if(percentage == 100){
                                    $(".finishsubmit").show();
                                    $(".finishid").hide();
                                }else{
                                    $(".finishsubmit").hide();
                                }
                                //$(".finishsubmit").show();
                            }
                        });
                    
                    $('.next').on('click', function(){
                        var totalPrice = 0,
                        values  = [];
                        var percentage = 0;
                        var input_count = 1 ;
                        var select_input = $(this).data("key");
                        // $(".selectInput").val(select_input + 1);
                        $(this).parents(".radio-wrapper").find(".selectInput").val(select_input + 1);
                        $('input[type=radio]').each(function(){
                            if( $(this).is(':checked') ) {
                                values.push($(this).length);
                                totalPrice += parseInt($(this).length);
                              //  valeur += parseInt($("input:radio:checked"));
                              var totalque = <?php echo $exam->questions->count(); ?>;
                              console.log('Total '+totalque);
                              percentage = parseInt((totalPrice/totalque)*100);

                              $('#counting').text(totalPrice);
                              $('.finishid').attr('id', totalPrice);
                              $('#count-process').text(percentage+'%');
                              $('.progress-bar').css('width', percentage+'%').attr('aria-valuenow', percentage); 

                                console.log(percentage);
                                if(percentage == 100){
                                    $(".finishsubmit").show();
                                    $(".finishid").hide();
                                }else{
                                    $(".finishsubmit").hide();
                                }
                            }
                        });
                    });

                }else{
                  //alert("plase select Answer");
                    swal({
                        position:'top-end',
                        title: "Please select an answer",
                        icon: "warning",
                        buttons: "Okay",
                        dangerMode: true,
                    });
                  //  Function Calls again 
                   verificationForm();
                  return false;
                } // check question answer select or not.


                current_fs = $(this).parent();
                next_fs = $(this).parent().next();
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active done");
                next_fs.show();
                current_fs.animate({
                    opacity: 0
                },{
                    step: function (now, mx) {
                        scale = 1 - (1 - now) * 0.2;
                        left = (now * 50) + "%";
                        opacity = 1 - now;
                        current_fs.css({
                            'transform': 'scale(' + scale + ')',
                            //'position': 'absolute'
                        });
                        next_fs.css({
                            'left': left,
                            'opacity': opacity
                        });
                    },
                    duration: 0,
                    complete: function () {
                        current_fs.hide();
                        animating = false;
                    },
                    easing: 'easeInOutBack'
                });           
                 
            });
            $(".previous").on('click',function () {
                if (animating) return false;
                animating = true;
                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active done");
                previous_fs.show();
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function (now, mx) {
                        scale = 0.8 + (1 - now) * 0.2;
                        left = ((1 - now) * 50) + "%";
                        opacity = 1 - now;
                        current_fs.css({
                            'left': left
                        });
                        previous_fs.css({
                            'transform': 'scale(' + scale + ')',
                            'opacity': opacity
                        });
                    },
                    duration: 0,
                    complete: function () {
                        current_fs.hide();
                        animating = false;
                    },
                    //this comes from the custom easing plugin
                    easing: 'easeInOutBack'
                });
              //  calculateStepTracker();
            });

            /*$(".submit").on('click',function () {
                return false;
            })*/
        };
        /*Function Calls*/
        verificationForm();
        if (window.performance.getEntriesByType("navigation")){
          var p=window.performance.getEntriesByType("navigation")[0].type;
       if (p=='navigate'){return false}
    //   if (p=='reload'){$('#msform').submit();}
       if (p=='back_forward'){return false}
       if (p=='prerender'){return false}
    }
    var count = 0;
    window.onload = function () {
        if (typeof history.pushState === "function") {
            history.pushState("back", null, null);
            window.onpopstate = function () {
                history.pushState('back', null, null);
                if(count == 0){
                  //  $('#msform').submit();
                 }
             };
            }
        }
    setTimeout(function(){count = 0;},200);
    })(jQuery);
    var duration = '{{$exam->duration}}'
    var countDownDate = new Date();
        countDownDate.setMinutes(countDownDate.getMinutes() + parseInt(duration));
    var x = setInterval(function () {
        var now = new Date().getTime();
        var distance = countDownDate - now;
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        document.getElementById("demo").innerHTML =minutes + "m " + seconds + "s ";
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
           // $('#msform').submit();
        }
    }, 1000);
    document.addEventListener('visibilitychange', function () {
        if (document.visibilityState === 'hidden') {
           // $('#msform').submit();
        }
    });
    $(document).on("contextmenu",function(){
        return false;
    });

    $( document ).ready(function() {
        $(".finishsubmit").hide();
    });

   /* @if(!empty($new_result_option))
        var totalPrice = 0,
        values  = [];
        var percentage = 0;
        var input_count = 1 ;
        var select_input = $(this).data("key");
        // $(".selectInput").val(select_input + 1);
        $(this).parents(".radio-wrapper").find(".selectInput").val(select_input + 1);
        $('input[type=radio]').each(function(){
            if( $(this).is(':checked') ) {
                values.push($(this).length);
                totalPrice += parseInt($(this).length);
              //  valeur += parseInt($("input:radio:checked"));
              var totalque = <?php echo $exam->questions->count(); ?>;
              console.log('Total '+totalque);
              percentage = parseInt((totalPrice/totalque)*100);

              $('#counting').text(totalPrice);
              $('.finishid').attr('id', totalPrice);
              $('#count-process').text(percentage+'%');
              $('.progress-bar').css('width', percentage+'%').attr('aria-valuenow', percentage); 

               console.log(percentage);
                if(percentage == 100){
                    $(".finishsubmit").show();
                    $(".finishid").hide();
                }else{
                    $(".finishsubmit").hide();
                }
            }
        });
    @endif
    $('input').on('click', function(){
        var totalPrice = 0,
        values  = [];
        var percentage = 0;
        var input_count = 1 ;
        var select_input = $(this).data("key");
        // $(".selectInput").val(select_input + 1);
        $(this).parents(".radio-wrapper").find(".selectInput").val(select_input + 1);
        $('input[type=radio]').each(function(){
            if( $(this).is(':checked') ) {
                values.push($(this).length);
                totalPrice += parseInt($(this).length);
              //  valeur += parseInt($("input:radio:checked"));
              var totalque = <?php echo $exam->questions->count(); ?>;
              console.log('Total '+totalque);
              percentage = parseInt((totalPrice/totalque)*100);

              $('#counting').text(totalPrice);
              $('.finishid').attr('id', totalPrice);
              $('#count-process').text(percentage+'%');
              $('.progress-bar').css('width', percentage+'%').attr('aria-valuenow', percentage); 

               console.log(percentage);
                if(percentage == 100){
                    $(".finishsubmit").show();
                    $(".finishid").hide();
                }else{
                    $(".finishsubmit").hide();
                }
            }
        });
    });
*/
    $( ".finishid" ).click(function() {
        var checkedcount = $(this).attr('id');
        var totalcount = <?php echo $exam->questions->count(); ?>;

        /*if(checkedcount ==  totalcount){

            //$('#myModal').modal('show'); 
            //$('#myModal').modal('show'); 
             swal({

                position:'top-end',
                title: "All questions must be answered",
                icon: "warning",
                buttons: "okay",
                dangerMode: true,
            });
            $(".finishsubmit").hide();
        }else{
             $(".finishsubmit").show();
             $(".finishid").hide();
        }*/
        
    });

    // get to option
    $('body').ready(function(){
        // console.log($("fieldset .form-row input[type=radio]").length);
        // console.log('input ',$("fieldset").children('.radio-wrapper').find("input[type=radio]").length);
       // $("fieldset").children('.without-image').children('.form-group').children('.radio-wrapper').find('input[type=radio]').css("background-color","red");
       $("input[type=radio]").on("click",function(){
            console.log('result ',$(this).parents(".optionimage").find("input[type=radio]").length);
       });
       // input_count += $("[type=radio]",this).length;
       //      console.log('this ',input_count);
            
    });

    $(document).ready(function(){
    $(".sidebar-menu").hide(300);
    $(".sidebar-menu").mouseover(function(){
       $(this).data("hover",true); 
    }).mouseout(function(){
        $(this).removeData("hover");
    });
    $(document).mousemove(function(e){
            //console.log(e.pageX);
            if ((e.pageX < 20 || $(".sidebar-menu").data("hover")) && !$(".sidebar-menu").data("displayed")) {
                window.clearTimeout(window.hideMenu);
                $(".sidebar-menu").stop().show(200).data("displayed",true);
            } else if ($(".sidebar-menu").data("displayed")) {
                window.clearTimeout(window.hideMenu);
                $(".sidebar-menu").removeData("displayed");
                window.hideMenu = window.setTimeout(function(){
                    $(".sidebar-menu").stop().hide(200);
                },1000);
            }
        });
    });


</script>
@endpush
@push('style')
<style>
    .nicEdit-main{
        width: 580px !important;
        min-height: 200px !important;
    }
</style>
@endpush