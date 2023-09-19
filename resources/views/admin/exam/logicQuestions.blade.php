@extends('admin.layouts.app')
<style>
    .select2 {
        width: 150.078px;
    }
    .select2-container--open{7
        width: 220px !important;
    }
    .extra label{
         font-size: 0.65rem;
    }
    .extra .addaddcomparison1 , .extra .addtextblock, .extra .msgbox{
        width: 25%;
        display: inline-grid;
        position: relative;
    }
    .extra .addOperation, .extra .addlogic {
        width: 8%;       
        display: inline-grid;
        position: relative;
    }
    .extra{
        border: 2px solid #686565;
        padding: 10px;
        border-radius: 5px;
    }
    .select2-container--default .select2-results__option--disabled {
        cursor: not-allowed;
    }
    .select2-container .select2-selection--single .select2-selection__rendered[title*=" True / False "] {
        font-size: 11px;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        font-size: 11px;
    }
    .error{
        color: red;
    }
    .adddiv .form-group.extra >.form-group:nth-child(3) .error{ order: 100; position: absolute; bottom: 0;}

    .adddiv .form-group.extra >.form-group.addaddcomparison1 .error, .adddiv .form-group.extra >.form-group.addaddcomparison2 .error:nth-child(3),.adddiv .form-group.extra >.form-group.addOperation .error{ order: 100; position: absolute; bottom: -4px; }
    
    .adddiv .form-group.extra >.form-group.addlogic .error{ order: 100; position: absolute; bottom: -4px; }
    
    .adddiv .form-group.extra >.form-group.addtextblock .error:nth-child(3){ order: 100; position: absolute; bottom: 12px; }
    
    .adddiv .form-group.extra >.form-group.logic .error{ order: 100; position: absolute; bottom: 0; }
    a.Copylogic {
        border: 1px solid #f74e57;
        border-radius: 4px;
        padding: 5px;
        background-color: #f74e57;
        color: #fff;
        font-size: 11px;
    }
    .Copylogic:hover {
        color: #0056b3 !important;
        text-decoration: none !important;
    }
    .select2-container--default .select2-results__option--disabled {
        display: none;
    }
    
    body.dragging, body.dragging * {
      cursor: move !important;
    }
    span.name.data-qtn {
        /*min-width: 610px;*/
        min-width: 325px;
        white-space: initial;
    }
    .load-block{
        width: 100%;
        background-color: #dbdbdb;
        height: 100px;
        position: relative;
    }
    .loder{
        position: absolute;
        top: 29%;
        width: 4%;
        left: 48%;
    }
    span.factor_block {
        border: 1.5px solid #2a4a97;
        display: block;
        padding-top: 5px;
        padding-right: 13px;
        border-radius: 5px;
        margin-bottom: 8px;
    }
    .card-header{
      cursor: pointer;
      border-bottom: none;
    }
    .card{
      border: 1px solid #ddd;
    }
    .card-body{
      border-top: 1px solid #ddd;
    }
    .card-header:not(.collapsed) .rotate-icon {
      transform: rotate(180deg);
    }
    textarea {
     min-height: 0px !important; 
   
    }
</style>
@section('panel')
<!-- option code -->
<?php $option ='<option value=""> Select </option>'; 
    $questionIds = array(); 
    foreach($Newquestions AS $ques){
         $cat = ($ques['category'] == 3)? ' ( True & False ) ': '';
        if(!in_array($ques['id'], $questionIds)){
            $questionIds[] = $ques['id']; 
            $option .= "
                    <option data-quecategory='".$ques['category']."' value='".$ques['id']."' >(".$ques['uniqueid'].") ".$ques['name'] .' '. $cat ."</option>"; 
        }
    }   
?>
<div class="container-fluid">
    <form action="{{route('admin.exam.logics.store')}}" method="POST" enctype="multipart/form-data" id="testvalidation">
        @csrf
        <input type="hidden" name="examid" value="{{$examid}}">
        <div class="card b-radius--10 ">
            <div class="card-body group_append" id="load_data"> 
                @if(count($new_factor) > 0 )
                    @foreach($new_factor as $key => $result)
                        <span class="group_block">
                            <h3 class="text-center mt-4">{{ $result['group_lable'] }}</h3>
                            <input type="hidden" name="groupid[]" value="{{ $result['group_id']}}"/>
                            @foreach($result['factors_ids'] AS $Fkey => $questions)
                                @php $factor_id = array();                                
                                    if(!empty($get_factor_array['group_id'])){
                                    foreach($get_factor_array['group_id'] as $newfkey=>$group_id ){
                                        
                                        if($key == $group_id && $get_factor_array['factor_id'][$newfkey] == $Fkey && !in_array($get_factor_array['factor_id'][$newfkey],$factor_id)){
                                            $factor_id[] = (empty($factor_id))? $get_factor_array['factor_id'][$newfkey] : '' ;   
                                @endphp
                                    <span class="factor_block">
                                        <input type="hidden" name="factorid[{{$result['group_id']}}][{{$Fkey}}]" value="{{$Fkey}}">
                                        <div class="accordion" id="accordionExample{{$Fkey}}">
                                          <div class="card">
                                            <div class="card-header collapsed examoldlogic" id="headingOne" data-toggle="collapse" data-target="#collapseOne{{$Fkey}}" aria-expanded="true"  data-exam="{{$examid}}" data-groupid="{{ $result['group_id']}}" data-factorid="{{$Fkey}}">     
                                                <span class="title" style="font-weight:600;">{{ str_replace("_"," ",key($questions) ) }}</span>
                                                <span class="accicon float-right"><i class="fas fa-angle-down rotate-icon"></i></span>
                                            </div>
                                            <div id="collapseOne{{$Fkey}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample{{$Fkey}}">
                                              <div class="card-body pb-0">
                                                <label class="ml-1 form-check-label"><b>Short description</b></label>
                                             <!--    <input type="text" class="form-control m-2 facetor_description" name="facetor_description[{{$result['group_id']}}][{{$Fkey}}]" style="display: none;" placeholder="Enter short description" value="" > -->
                                             <textarea class="form-control m-2 facetor_description" name="facetor_description[{{$result['group_id']}}][{{$Fkey}}]" style="display: none;"  rows="2" placeholder="Enter short description" ></textarea>
                                                <span class="logicappend"></span>
                                                <div class="load-block" style="display: none;">
                                                    <img src="{{asset('public/assets/images/loader.gif')}}" alt="Loder image" class="loder">
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    </span>                                
                                @php } //endif                            
                                    } //endforeach */
                                } // endif group id check 
                                @endphp
                            </span>                                   
                            @endforeach                       
                    @endforeach
                @else
                    <h2 class="text-center">Please add question....!</h2>
                    <p class="text-center mb-3">then add logic...
                        <a href="{{route('admin.exam.all')}}" class="btn-link btn  text-center">  Go back</a>
                    </p>
                @endif    
            </div>
            <div class="card-footer py-4">
                <button type="submit" class="btn btn--primary btn-block" id="submit">@lang('Submit')</button>
            </div>
        </div>
    </form>
</div>
   <!-- card end -->
@endsection
@push('script-lib')
    <script src="{{asset('public/assets/admin/js/datepicker.min.js')}}"></script>
    <script src="{{asset('public/assets/admin/js/datepicker.en.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
@endpush
@push('script')
    <script type="text/javascript">
      'use strict'
            
            function comparison1_check(){               
                $.each($(".comparison1"),function(){
                    $('option[data-quecategory="1"]',this).removeAttr('disabled');
                    $('option[data-quecategory="2"]',this).removeAttr('disabled');
                });
                $.each($(".comparison2"),function(){
                    $('option[data-quecategory="1"]',this).removeAttr('disabled');
                    $('option[data-quecategory="2"]',this).removeAttr('disabled');
                });
            }
            comparison1_check(); // call function

            function logic_fun(){
                $(".logic").each(function(){
                    var drop_val = $(this).find(":selected").val();
                    if (drop_val == "true") {
                        $(this).parents(".extra").prev().find(".checkquestion").prop('checked', true);
                    }
                })
                var logic_counter = 0;
                $.each($(".logic"),function(){
                    var setTrue = $(this).find(":selected").val();
                    if( setTrue == 'true'){    
                       $(this).parents(".extra").find(".comparison1 option[data-quecategory=2]").attr('disabled','disabled');
                       $(this).parents(".extra").find(".comparison1 option[data-quecategory='2']").attr('disabled','disabled');
                       $(this).parent().prev().prev().find(".comparison1 option[data-quecategory='1']").attr('disabled','disabled');
                       $(this).parent().prev().prev().find(".comparison1 option[data-quecategory='2']").attr('disabled','disabled');
                        $(this).parent().prev().prev().find(".logic option[value='<']").attr('disabled','disabled');
                        $(this).parent().prev().prev().find(".logic option[value='>']").attr('disabled','disabled');
                        $(this).parent().prev().prev().find(".logic option[value='=']").attr('disabled','disabled');
                        $(this).parent().parent().next().find(".addOperation").css('display','inline-grid');   
                        $(this).parent().next().find(".addtextblock").css('display','inline-grid');
                        $(this).parent().parent().next().find(".msgbox").css('display','inline-grid');
                        $(this).parent().parent().next().find(".comparison1").removeAttr('multiple');
                    }else{
                       $( 'option[value="true"]',this).attr('disabled','disabled');
                    }                    
                });  
            }
            
            logic_fun();// logic_fun() function call
            function LogicCheck(){
                 $(".logic").each(function(){
                    var drop_val = $(this).find(":selected").val();
                    if (drop_val == "true") {
                        $(this).parents(".extra").prev().find(".checkquestion").prop('checked', true);
                    }
                })
                $.each($(".logic"), function(){
                    if($(this).val() == 'true' ){
                        $(this).parents(".d-flex").find(".addOperation").css('display','none');
                        $(this).parents(".extra").find(".comparison1 option[data-quecategory=2]").attr('disabled','disabled');
                        $(this).parents(".d-flex").find(".addtextblock").css('display','none');
                        $(this).parents(".d-flex").find(".addtextblock .addtext3").attr('disabled','disabled'); 
                        $(this).parents(".d-flex").find(".msgbox").css('display','block');
                        $(this).parents(".d-flex").find(".comparison1").removeAttr('multiple');
                        $('option[value="<"]',this ).attr('disabled','disabled');
                        $('option[value=">"]',this ).attr('disabled','disabled');
                        $('option[value="="]',this ).attr('disabled','disabled');
                    }else{
                        $(this).parents(".d-flex").find(".addOperation").css('display','inline-grid');
                        $(this).parents(".d-flex").find(".addtextblock").css('display','inline-grid');
                        $(this).parents(".d-flex").find(".msgbox").css('display','none');
                        $(this).parents(".d-flex").find(".comparison1").attr('multiple','multiple');                    
                    }
                });            
            }    
            LogicCheck();
            //submit validation  
            $(document).ready(function () {
                $("#submit").click(function(){
                     $('#testvalidation').validate({
                        submitHandler: function (form) { // for demo
                            form.submit();
                        }
                     });

                    // must be called after validate()
                    $('select.comparison1').each(function () {
                        $(this).rules('add', {
                            required: true
                        });
                    });
                    $('select[name^="operation"]').each(function () {
                        $(this).rules('add', {
                            required: true
                        });
                    });
                    $('select[name^="logic"]').each(function () {
                        $(this).rules('add', {
                            required: true
                        });
                    });
                    $('[name^="textmsg1"]').each(function () {
                        $(this).rules('add', {
                            required: true
                        });
                    });
                });
            });
            
            $(document).ready(function () {
               
                $("#submit").click(function(){
                       
                     $('#testvalidation').validate({
                        submitHandler: function (form) { // for demo
                            //alert('valid form'); // for demo
                           //return false; // for demo
                            form.submit();
                        }
                     });
                     $('[name^="textmsg2"]').each(function () {
                        $(this).rules('add', {
                            required: true
                        });
                    });
                    $('[name^="textmsg3"]').each(function () {
                        $(this).rules('add', {
                            required: true
                        });
                    });
                });
            });

                
        $(document).on('click', '#add', function () {
            // optoin declaer
            var option ='<option value=""> Select </option>';
            var Newquestions = <?php  echo json_encode($Newquestions);?>;      
            var questionIds = []; 
            var cat = '';

            $.each(Newquestions,function(indexkey,ques){
                var uniqueid = (ques['uniqueid'])?ques['uniqueid']:'';
                cat = (ques['category'] == 3)? ' ( True & False ) ': '';
                    option += "<option data-quecategory='"+ques['category']+"' value='"+ques['id']+"' >("+uniqueid+") "+ques['name'] +' '+ cat +"</option>"; 
            }); 
            //console.log(option);
            var numItems = $(this).parents(".adddiv").find(".extra").length;
            // console.log('no',numItems);
            var key = $(this).data('key');
            var question = $(this).data('question');
            // var option = $(this).data('option');
            var option = option;
            var groupid = $(this).data('groupid');
            var Examkey = $(this).data('examkey');
            var element = `<div class="copyBlock"> 
                                <div>
                                    <div class="form-check-inline checkBox">
                                        <label class="form-check-label" for="checkA_${key}"><b>Is  True & False logic ? </b> </label> &nbsp;&nbsp;
                                        <input type="checkbox" class="form-check-input checkquestion" name=
                                                        "isCheck[${groupid}][${key}][${numItems}]" id="checkA_${key}" value="1">
                                    </div>
                                    <div class="float-right">
                                        <a href="javascript:void(0)"  class="Copylogic btn-link " id="Copylogic" title="Copy Block" data-key="${key}" data-examkey="${Examkey}" data-groupid ="${groupid}" >Copy</a>
                                    </div>
                                </div>
                                <div class="form-group extra d-flex justify-content-between">
                                    <div class="form-group addaddcomparison1">
                                       <label class="font-weight-bold">@lang('Comparison 1') <span class="text-danger">*</span></label>
                                       <select class="form-control select2 comparison1"  multiple name="comparison1[${groupid}][${key}][${numItems}][]" required>
                                            ${option}
                                       </select> 

                                    </div>
                                    <div class="form-group addOperation">
                                       <label class="font-weight-bold">@lang('Operation') <span class="text-danger">*</span></label>
                                       <select class="form-control select2 Operations"  name="operation[${groupid}][${key}][${numItems}]" >
                                           <option value="">Select</option>
                                           <option value="+"> + </option>
                                           <option value="-"> - </option>
                                       </select> 
                                    </div>
                                    <div class="form-group addlogic" style="display: inline-grid;">
                                       <label class="font-weight-bold">@lang('Logic') <span class="text-danger">*</span></label>
                                       <select class="form-control select2 logic"  name="logic[${groupid}][${key}][${numItems}]" required>
                                           <option value="">Select</option>
                                           <option value="<"> < </option>
                                           <option value=">"> > </option>
                                           <option value="="> = </option>
                                           <option value="true"><span class="truelabel"> True / False </span></option>
                                       </select> 
                                    </div>
                                    <div class="form-group addtextblock addaddcomparison2">
                                       <label class="font-weight-bold">@lang('Comparison 2') <span class="text-danger">*</span></label>
                                       <select class="form-control select2 comparison2" multiple name="comparison2[${groupid}][${key}][${numItems}][]" >
                                            ${option}
                                       </select> 
                                       <input type="number" name="comparison2Val[${groupid}][${key}][${numItems}]" placeholder="Enter value" class="form-control comparison2Input" required>
                                    </div>
                                    <div class="form-group addOperation">
                                       <label class="font-weight-bold">@lang('Operation') <span class="text-danger">*</span></label>
                                       <select class="form-control select2 Operations Operations2"  name="operation2[${groupid}][${key}][${numItems}]" >
                                           <option value="">Select</option>
                                           <option value="+"> + </option>
                                           <option value="-"> - </option>
                                       </select> 
                                    </div>
                                    <span class="msgbox" style="display:none;">
                                        <div class="form-group">
                                            <label class="font-weight-bold">@lang('True Text') <span class="text-danger">*</span></label>
                                            
                                            <textarea class="form-control addtext addtext1" placeholder="@lang('True Text')" rows="2" type="text" name="textmsg2[${groupid}][${key}][${numItems}]" ></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold">@lang('False Text') <span class="text-danger">*</span></label>
                                           
                                            <textarea cclass="form-control addtext addtext2" placeholder="@lang('False Text')" rows="2" type="text" name="textmsg3[${groupid}][${key}][${numItems}]" ></textarea>
                                        </div>
                                    </span>
                                    <div class="form-group addtextblock">
                                       <label class="font-weight-bold">@lang('Add Text') <span class="text-danger">*</span></label>
                                       
                                       <textarea class="form-control addtext addtext3" style="margin-bottom: 28px;" placeholder="@lang('Add Text')" type="text" rows="2" name="textmsg1[${groupid}][${key}][${numItems}]" ></textarea>

                                    </div>
                                    <button type="button" class="icon-btn btn--danger  text-center text-nowrap remove  my-5" style="height: 52px;"><i class="las la-minus-circle"></i></button>
                                </div> 
                                <div class="Copyappend"></div> 
                            </div>
                             `;
             console.log(element);
            $(this).parents('.adddiv').find(".append").append(element);
            $('.select2').select2();
            comparison1_check(); 
            logic_fun();
            checkComp2Value();
          })
          $(document).on('click', '.remove', function () {
            $(this).parent(".extra").prev().remove();
            $(this).parents('.form-group').find('input').val('');
            $(this).parents('.form-group').remove();
          })
          
          // select true or false
          $(document).ready(function(){            
               $('body').on('change',".logic", function(){
                 if($(this).val() == 'true'){
                    console.log($(this).val());
                    $(this).parents(".d-flex").find(".addOperation").css('display','none');
                    $(this).parents(".d-flex").find(".addtextblock").css('display','none');
                    $(this).parents(".d-flex").find(".msgbox").css('display','inline-grid');
                    $(this).parents(".d-flex").find(".comparison1").removeAttr('multiple');
                 }else{
                    $(this).parents(".d-flex").find(".addOperation").css('display','inline-grid');
                    $(this).parents(".d-flex").find(".addtextblock").css('display','inline-grid');
                    $(this).parents(".d-flex").find(".msgbox").css('display','none');
                    $(this).parents(".d-flex").find(".comparison1").attr('multiple','multiple');
                 }
              });
              $('.select2').select2();
          });   
          
          $('body').on('click','.checkquestion',function () {
              var catId = 0;
              var question = (this.checked === true)? this.value : '';
              if($(this).prop('checked')){
                catId = $(this).attr('value');
              }else{
               catId = 0;
              }
              if(catId == 1){   
                $(this).parent().parent().next().find('.comparison1 option[data-quecategory="1"]').attr('disabled','disabled');
                $(this).parent().parent().next().find('.comparison1 option[data-quecategory="2"]').attr('disabled','disabled');
                $(this).parent().parent().next().find('.comparison2 option[data-quecategory="1"]').attr('disabled','disabled');
                $(this).parent().parent().next().find('.comparison2 option[data-quecategory="2"]').attr('disabled','disabled');
                $(this).parent().parent().next().find(".addOperation").css('display','none');
                $(this).parent().parent().next().find(".addtextblock").css('display','none');
                $(this).parent().parent().next().find(".msgbox").css('display','inline-grid');
                $(this).parent().parent().next().find(".comparison1").removeAttr('multiple');
                $(this).parent().parent().next().find('.addtext').val('');
                $(this).parent().parent().next().find('.comparison1').val('');
                $(this).parent().parent().next().find('.logic option[value="true"]').removeAttr('disabled');
                $(this).parent().parent().next().children('.form-group').find('.logic option[value=""]').removeAttr('selected');
                $(this).parent().parent().next().find('.logic option[value="<"]').attr('disabled','disabled');
                $(this).parent().parent().next().find('.logic option[value=">"]').attr('disabled','disabled');
                $(this).parent().parent().next().find('.logic option[value="="]').attr('disabled','disabled');
                $(this).parent().parent().next(".extra").addClass('checkboxEnabled');
                $(this).parent().parent().next().children('.form-group').find('.logic option[value="true"]').attr('selected','selected');
                 $(this).parent().parent().next().children('.form-group').find('.logic').select2();
                $(this).parent().parent().next().find(".addtextblock .addtext3").attr('disabled','disabled'); 
              }else{          
                $(this).parent().parent().next().children('.form-group').find('.comparison1 option[data-quecategory="1"]').removeAttr('disabled');
                $(this).parent().parent().next().children('.form-group').find('.comparison1 option[data-quecategory="2"]').removeAttr('disabled');
                $(this).parent().parent().next().children('.form-group').find('.comparison2 option[data-quecategory="1"]').removeAttr('disabled');
                $(this).parent().parent().next().children('.form-group').find('.comparison2 option[data-quecategory="2"]').removeAttr('disabled');
                $(this).parent().parent().next().find(".addOperation").css('display','inline-grid');
                $(this).parent().parent().next().find(".addtextblock").css('display','inline-grid'); 
                $(this).parent().parent().next().find(".addtextblock .addtext3").removeAttr('disabled'); 
                $(this).parent().parent().next().find(".msgbox").css('display','none');
                $(this).parent().parent().next().find(".comparison1").attr('multiple','multiple');
                $(this).parent().parent().next().children('.form-group').find('.logic option[value=""]').attr('selected','selected');
                $(this).parent().parent().next().children('.form-group').find('.comparison2').val('');
                $(this).parent().parent().next().children('.form-group').find('.Operations').val('');
                $(this).parent().parent().next().find('.logic option[value="true"]').attr('disabled','disabled');
                $(this).parent().parent().next().find('.logic option[value="<"]').removeAttr('disabled');
                $(this).parent().parent().next().find('.logic option[value=">"]').removeAttr('disabled');
                $(this).parent().parent().next().find('.logic option[value="="]').removeAttr('disabled');
            }

            $('.logic').select2();
            $('.comparison1').select2({
                hideSelected: true
            });
          });
         /* comparison2 with check */
         function checkComp2Value(){            
            $.each($(".comparison2Input"),function(){
                if($(this).val() != ''){
                    $(this).parent().find(".comparison2").val('');
                    $(this).parent().next().css("display","none");
                    $('.select2').select2();
                }
            });            
         }
         checkComp2Value();
         $("body").on("change",".comparison2",function(){
                $(this).parent().find(".comparison2Input").val('');
                $(this).parent().next().css("display","inline-grid");
                $('.select2').select2();
         });
        $("body").on("change",".comparison2Input",function(){
                $(this).parent().find(".comparison2").val('');
                $(this).parent().next().css("display","none");
                $('.select2').select2();
        });      
        
        /* selected onchange add  */
            $('body').on("change",".comparison1",function(){
                var comp1sel = $(this).val();
                console.log('com1 ',$.isArray(comp1sel));
                $("option",this).removeAttr("selected");     
                for(var i=0; i <= comp1sel.length; i ++){
                    $("option[value='"+comp1sel[i]+"']",this).attr("selected","selected");     
                }
                // true and false active
                if($.isArray(comp1sel) == false){
                    $("option[value='"+comp1sel+"']",this).attr("selected","selected");   
                }
            });

            $('body').on("change",".comparison2",function(){
                var comp2sel = $(this).val();
                $("option",this).removeAttr("selected");
                for(var i=0; i <= comp2sel.length; i ++){
                    $("option[value='"+comp2sel[i]+"']",this).attr("selected","selected");
                }
                //console.log('c2 ',comp2sel.length);
                if(comp2sel.length == 0){
                    $(this).next().next().attr("required","required");
                }else{
                    $(this).next().next().removeAttr("required");    
                }
                
            });
            $('body').on("change",".Operations",function(){
                var oper1sel = $(this).val();
               $("option[value='"+oper1sel+"']",this).attr("selected","selected");
            });
            $('body').on("change",".Operations2",function(){
                var oper2sel = $(this).val();
                $("option",this).removeAttr("selected");
                $("option[value='"+oper2sel+"']",this).attr("selected","selected");
                $('.select2').select2();
            });
            $('body').on("change",".logic",function(){
                var logicsel = $(this).val();
               $("option[value='"+logicsel+"']",this).attr("selected","selected");
            });
        /* clone logic */
            $('body').on("click",".Copylogic",function(event){
                
                var comp1Option = $(this).closest(".copyBlock").find(".comparison1").html();
                //alert( comp1Option);
                var operation1 = $(this).closest(".copyBlock").find(".Operations").html();   
                var logic = $(this).closest(".copyBlock").find(".logic").html(); 
                var operation2 = $(this).closest(".copyBlock").find(".Operations2").html(); 
                var comp2Option = $(this).closest(".copyBlock").find(".comparison2").html();
                var comp2Input = $(this).closest(".copyBlock").find(".comparison2Input").val();
                var addtext1 = $(this).closest(".copyBlock").find(".addtext1").val();  
                var addtext2 = $(this).closest(".copyBlock").find(".addtext2").val();  
                var addtext3 = $(this).closest(".copyBlock").find(".addtext3").val();  
                var numItems = $(this).parents(".adddiv").find(".extra").length;
                var key = $(this).data('key');
                var groupid = $(this).data('groupid');
                var Examkey = $(this).data('examkey') + 1;
               //alert(addtext3);
                var element = `<div class="copyBlock">
                                <div class="">
                                    <div class="form-check-inline checkBox">
                                        <label class="form-check-label" for="checkA_${key}"><b>Is  True & False logic ? </b> </label> &nbsp;&nbsp;
                                        <input type="checkbox" class="form-check-input checkquestion" name=
                                                        "isCheck[${groupid}][${key}][${numItems}]" id="checkA_${key}" value="1">
                                    </div>
                                    <div class="float-right">
                                        <a href="javascript:void(0)"  class="Copylogic btn-link" id="Copylogic" title="Copy Block" data-key="${key}" data-examkey="${Examkey}" data-groupid ="${groupid}">Copy</a>
                                    </div>
                                </div>
                                <div class="form-group extra d-flex justify-content-between">
                                <!--<input type="hidden" name="groupid[]" value="${groupid}">-->
                                <!--<input type="hidden" name="factorid[${groupid}][]" value="${key}">-->
                                <div class="form-group addaddcomparison1">
                                   <label class="font-weight-bold">@lang('Comparison 1') <span class="text-danger">*</span></label>
                                   <select class="form-control select2 comparison1"  multiple name="comparison1[${groupid}][${key}][${numItems}][]" required>
                                        ${comp1Option}
                                   </select> 

                                </div>
                                <div class="form-group addOperation">
                                   <label class="font-weight-bold">@lang('Operation') <span class="text-danger">*</span></label>
                                   <select class="form-control select2 Operations"  name="operation[${groupid}][${key}][${numItems}]" >
                                       ${operation1} 
                                   </select> 
                                </div>
                                <div class="form-group addlogic" style="display: inline-grid;">
                                   <label class="font-weight-bold">@lang('Logic') <span class="text-danger">*</span></label>
                                   <select class="form-control select2 logic"  name="logic[${groupid}][${key}][${numItems}]" required>
                                       ${logic}        
                                   </select>
                                </div>
                                <div class="form-group addtextblock addaddcomparison2">
                                   <label class="font-weight-bold">@lang('Comparison 2') <span class="text-danger">*</span></label>
                                   <select class="form-control select2 comparison2" multiple name="comparison2[${groupid}][${key}][${numItems}][]" >
                                        ${comp2Option}
                                   </select> 
                                   <input type="number" name="comparison2Val[${groupid}][${key}][${numItems}]" placeholder="Enter marks" class="form-control comparison2Input" value="${comp2Input}">
                                </div>
                                <div class="form-group addOperation">
                                   <label class="font-weight-bold">@lang('Operation') <span class="text-danger">*</span></label>
                                   <select class="form-control select2 Operations Operations2"  name="operation2[${groupid}][${key}][${numItems}]" >
                                        ${operation2}
                                   </select> 
                                </div>
                                <span class="msgbox" style="display:none;">
                                    <div class="form-group">
                                        <label class="font-weight-bold">@lang('True Text') <span class="text-danger">*</span></label>
                                        <textarea class="form-control addtext addtext1" rows="2" placeholder="@lang('True Text')" type="text" name="textmsg2[${groupid}][${key}][${numItems}]" >'.${addtext1}.'</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold">@lang('False Text') <span class="text-danger">*</span></label>
                                         <textarea class="form-control addtext addtext2" rows="2" placeholder="@lang('False Text')" type="text" name="textmsg3[${groupid}][${key}][${numItems}]" >'.${addtext2}.'</textarea>
                                    </div>
                                </span>
                                <div class="form-group addtextblock">
                                   <label class="font-weight-bold">@lang('Add Text') <span class="text-danger">*</span></label>
                                   <textarea class="form-control addtext addtext3" rows="2" style="margin-bottom: 28px;" placeholder="@lang('Add Text')" type="text" name="textmsg1[${groupid}][${key}][${numItems}]" >'.${addtext3}.'</textarea>
                                </div>
                                <button type="button" class="icon-btn btn--danger  text-center text-nowrap remove  my-5" style="height: 52px;"><i class="las la-minus-circle"></i></button>
                            </div>
                             <div class=" copyBlock"></div>  
                 `;
                $(this).parents('.copyBlock').find(".Copyappend").append(element);
                $('.select2').select2();
                comparison1_check();
                logic_fun();
                LogicCheck();
                checkComp2Value();
            });
            // text factor_decription  data copy 
            $(document).ready(function(){
                $.each($(".factor_dec"), function(){
                    $(this).parents(".p-3").prev().prev().val($(this).val());
                    $(this).parents(".p-3").prev().prev().css("display","block")
                });
            });   

        $(".examoldlogic").click(function(e){
            //alert($(this).data('groupid'));
            $(this).next().find(".load-block").show();
            var groupid = $(this).data('groupid');
            var factorid = $(this).data('factorid');
            var examid = $(this).data('exam');
            var examoldlogic = $(this);
            
            $.ajax({
                url:'{{route("admin.exam.examoldexam")}}',
                type:'POST',
                data:{
                    _token:'{{csrf_token()}}',
                    groupid:groupid,
                    factorid:factorid,
                    examid:examid
                },
                success:function(res){
                    setTimeout(function(){
                        examoldlogic.next().find(".logicappend").html(res);
                        // examoldlogic.parents(".card-header").next().find(".logicappend").html(res);
                        comparison1_check();
                        logic_fun();
                        LogicCheck();
                        checkComp2Value();
                        $('.select2').select2();
                    },1000);
                    setTimeout(function(){
                        examoldlogic.parents(".accordion").find(".facetor_description").val(examoldlogic.next().find(".factor_dec").val());
                        examoldlogic.parents(".accordion").find(".facetor_description").css("display","block");
                        $(".load-block").hide();
                        examoldlogic.removeClass("examoldlogic");
                        //alert(examoldlogic.parents(".card-header").next().find(".factor_dec").val());
                    },1100);
                    //console.log(res);
                },
                error:function(err){}
                });
        });
    
    </script>
@endpush
@push('breadcrumb-plugins')
   <!--  <a class="btn btn--primary" href="{{route('admin.score.all')}}"><i class="las la-backward"></i> @lang('Go Back')</a> -->
@endpush