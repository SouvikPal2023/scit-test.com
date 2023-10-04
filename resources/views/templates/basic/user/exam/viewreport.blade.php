@extends($activeTemplate.'layouts.masterNew')
@section('content')
{{-- @section('panel') --}}
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> --}}
<style type="text/css">
    
    @media screen and (min-width:2460px){
        body{
            font-size: 1.6rem !important;
        }
        h3{
           font-size: 2rem !important; 
        }
        h4{
            font-size: 1.8rem !important;
        }
    }
    .list-logic{
        list-style-type: disc;
        margin-left: 25px;
    }
    th.text-justify {
        font-weight: 300;
    }
    .markAVG {
        background-color: #ed5565;
        padding: 10px;
        border-radius: 5px;
        font-size: 1rem;
        line-height: 20px;
        color: #fff;
    }
    .mx-10 {
        margin: 0 5rem;
    }
    .panel-card-body p, li, a,span {
        font-size: 15px;
        /* color: #000; */
        font-weight: 400;
    }
    .panel-card-body h1, h2, h3, h4, h5, h6 {
        font-weight: 500;
        color: #292929 !important;
        margin: 0;
        line-height: 1.4;
    }
    
   /* .body-wrapper p, li, span {
        color: #292929 !important;
        margin-bottom: 15px;
        line-height: 1.8em;
    }
   */
    @media print {
        body {-webkit-print-color-adjust: exact;}
        #printarea .irs--flat .irs-bar {
            background-color: #ed5565 !important;
            print-color-adjust: exact; 
        }
        body .sidebar-menu, .copyright-wrapper, .footer-botton,.navbar-wrapper{
            display: none !important;
        }
        body .body-header-area{
            display: none !important;
        }
                      
       
    }

    @media (max-width : 1024px){
         .radio-wrapper.carousel-small.d-flex {
            flex-wrap: wrap;
            width: 100%;
        }
        .radio-wrapper .optionimage {
            width: 41%;
            text-align: center;
            margin-right: 20px !important;
        }
    }
    #test_id{
        border: 3px solid black;
        width: 105px;
        text-align: center;
        padding: 5px 0px;
    }
    .carrige_return{
        text-indent: 100px;
    }
    .carrige_return_25{
        text-indent: 25px;
    }
</style>


@php $result_data = json_decode($result[0]->result,true);
    // Get consistency
    $consistency = array();
    if($exam->gender_id == 1 ){  /* male array */
        $mainArray = array('582' , '572' , '571' , '557' , '548' , '538' , '537' , '526');
        $reverseArray = array('507R' , '509R' , '532R' , '597R' , '596R' , '577R' , '590R' , '510R'); 
    }else{  /* female array */
        $mainArray = array('182' , '172' , '171' , '157' , '148' , '138' , '137' , '26');
        $reverseArray = array('107R' , '109R' , '132R' , '197R' , '196R' , '177R' , '190R' , '110R');
    } 

    foreach($result_data['questions_score'] as $questionAns){
        if(!empty($questionAns['test_unique_id'])){
            $originalId = $questionAns['test_unique_id'];
            if( in_array($originalId,$mainArray) ){ 
                $originalkey = array_search($originalId,$mainArray);
                $reversevalue =  $reverseArray[$originalkey];
                $originalkey = array_search($reversevalue,$reverseArray);
                //get key
                $Rmarchkey = array_search($reversevalue,array_column($result_data['questions_score'], 'test_unique_id'));
                // reindex
                $new_result = array_combine(range(0, 
                            count($result_data['questions_score']) + (0-1)),
                            array_values($result_data['questions_score']));
                (int)$reverseval = $new_result[$Rmarchkey]["test_select_option"];
                (int)$originalval = $questionAns["test_select_option"];
                (int)$totaloption = $questionAns['total_option'];
               // echo ' : '.(int)$reverseval.' - '.((int)$totaloption.' - '.(int)$originalval);

                $Ans = (int)$reverseval - ((int)$totaloption - (int)$originalval);
                if($Ans ==  1){
                    $consistency[] = $Ans;
                }
            }
        }    
    }
    $consistency = array_sum($consistency);
@endphp
<div class="transaction-area mt-30">
    <div class="row justify-content-center mb-30-none">
        <div class="col-xl-10 col-md-8 col-sm-10 mb-30" id="printarea">
            <div class="panel-table-area">
                <div class="panel-table border--base">
                    <div class="panel-card-body">
                        <div id="test_id">
                            {{ $test_id }}
                        </div>
                        <h2 class="heading text-center mb-3 mt-3"><u>Your SCIT Report</u></h2>
                        <p class="text-center">Date of Report: {{date('F d, Y',strtotime($result[0]->created_at))}}<span class="datetoday1"></span></p><br>
                        <p class="mx-4 carrige_return">The SCIT scores are based upon the responses you provided.  Each variable is compared with the scores obtained from other people of your sex who have also completed the SCIT.  More people will complete the test after you have, and your views may change over time.  For these reasons, if you take the SCIT again you will likely find some change in your statistics.  If you are undergoing any kind of therapy, it is recommended that you take the SCIT every three months to see what changes may have occurred for you.  Note that the total sample may not be completely representative of the general population and there will likely be some variance between our sample and the general population.
                        </p>
                        <br>
                        <p class="mx-4 carrige_return">Each variable is represented by a percentile score.  A percentile score is a statistical calculation that for our purposes ranges from 1 to 99.  A percentile score shows how your score compared to those from our sample.   A score of 75 for example, means that approximately 74 percent of the sample scored lower than you did.   Conversely, it also means that approximately 25 percent of the sample scored higher than you did.</p>
                        {{-- <span class="mx-4"><b>Overall Percentile</b> : {{ round($result_data['overall_percentile'] , 2 ) }}</span>  --}}
                        <span class="mx-4 sr-only"><b> Consistency Factor</b> : {{ round( $consistency,2) }}</span>
                        <br/>
                        <div class="mx-10">
                            @php $no = 1; $subno = 0; $no_array = 9; $new_group_old_ids = array(); $specialtotal =0; $indextrue= 0;@endphp 
                            @foreach($result_group AS $group_label => $group)
                                <h3 class="text-center m-2">{{ $no }}.&nbsp;{{ $group_label }}</h3> 
                                @php $underno = 1; $new_g= 0;$empty_count =0; $new_group_count = count($result_group); @endphp 
                                @foreach($group['factor'] AS $key =>$factor)

                                    @foreach($new_filter_question['factore_id'] as $factorKey=>$factor_ids)
                                        @php 
                                        $empty_count++; 
                                        $factor_count =  count($new_filter_question['factore_id']);
                                        $countFactor = count($factor); $factore_label = '';  $i = 1; $Todaydate="";
                                        $dummy_factor = '';
                                        foreach ($factor as $fkey => $qestion) {
                                            if($factor_ids == $qestion['factore_id']){     
                                                //136,181,188,508,510,
                                                if($qestion['test_unique_id'] == 136 || $qestion['test_unique_id'] == 181 || $qestion['test_unique_id'] == 188){
                                                    $specialtotal += $qestion['score'];
                                                }
                                                //dd($scoreTrue[0]['scorenumber']);
                                                if($qestion['test_unique_id'] == 117 && $scoreTrue[0]['scorenumber'] == $qestion['score']){
                                                    $indextrue = 1;
                                                }
                                                //echo $factor_ids.'  == '.$qestion['factore_id'].'<br>';
                                                $examlogicsresult = array();
                                                $examlogicsresultfactordescription = array();

                                                if(is_array($new_examLogic) && count($new_examLogic) > 0 ){
                                                    $new_group_ids = array();
                                                    $factor_decri = '';
                                                    foreach($new_examLogic as $logic){

                                                        //echo $qestion['factore_id'].' == '.$qestion['factore_id'].'<br>';
                                                       //dd($logic);
                                                    if($qestion['factore_id'] == $logic['factor_id']){
                                                            $factor_decri =  $logic['facetor_description'];
                                                       }
                                                       
                                                        /*if(!in_array( $logic['facetor_description'],$examlogicsresultfactordescription) ){
                                                            $examlogicsresultfactordescription[]   =  $logic['facetor_description'];
                                                        }  */
                                                        //print_r($examlogicsresultfactordescription);
                                                        $score_que1 = array();  $score_que2 = array();   
                                                        $score1 = 0;  $score2 = 0;
                                                        $operation = $logic['operation'];
                                                        $operation2 = $logic['operation2'];
                                                        $logicop = $logic['logic'];
                                                        $comparison1 = explode(",",$logic['comparison1']);
                                                        $comparison2 = explode(",",$logic['comparison2']);
                                                        $new_comparison1 = array_intersect_key($new_questionAns, array_flip($comparison1) ) ; // comparison1 array matching

                                                        $new_comparison2 = array_intersect_key($new_questionAns, array_flip($comparison2) ) ; // comparison1 array matching
                                                        
                                                        if(empty($new_group_ids)){
                                                            $new_group_ids[] = $new_filter_question['group_id'][$no-1];
                                                        } 
                                                                                                                
                                                        if($logic['factor_id'] == $factor_ids   ){
                                                            //echo $new_group_count.' == '.$new_g;
                                                            $new_g++;
                                                            $new_group_ids[] = $logic['group_id'];
                                                           if($logic['logic'] != 'true')
                                                            {
                                                                if( !empty($logic['comparison2mark']) ){
                                                                    $new_comparison2 = $logic['comparison2mark']; 
                                                                }                          
                                                                    if( is_array($new_comparison1)){
                                                                        if($operation == '+'){
                                                                            $score1  = array_sum($new_comparison1);
                                                                        }else{
                                                                            $j = 0;
                                                                            foreach($new_comparison1 as $nokey => $scrore_ans1){
                                                                                if($j == 0){
                                                                                    $score1 = $scrore_ans1;
                                                                                }else{
                                                                                    $score1 = $score1 - $scrore_ans1;    
                                                                                }
                                                                                $j++;
                                                                            $score1 = ($score1 > 0)? $score1 : $score1 = 0;
                                                                            }
                                                                        }

                                                                    }else{
                                                                        $comp1array = array();
                                                                        $comp1array[] = $comparison1;
                                                                        $new_comparison1 = array_intersect_key($new_questionAns, array_flip($comp1array) ) ; // comparison1 array matching
                                                                        $score1 = (int) $new_comparison1;
                                                                    }

                                                                if(is_array($new_comparison2) ){
                                                                    if(is_array($new_comparison2)){
                                                                        if($operation2 == '+'){
                                                                            $score2  = array_sum($new_comparison2);    

                                                                        }else{    
                                                                            $ii = 0;
                                                                            foreach($new_comparison2 as $nokey => $scrore_ans2){
                                                                                if($ii == 0){
                                                                                    $score2 = $scrore_ans2;
                                                                                }else{
                                                                                    $score2 = ($score2 - $scrore_ans2);    
                                                                                }
                                                                                $ii++;
                                                                            }
                                                                            $score2 = ($score2 > 0)? $score2 : 0;
                                                                        } 
                                                                    }
                                                                }else{
                                                                    $comp2array = array();
                                                                    $comp2array[] = $new_comparison2;
                                                                    $score2 = (int) $new_comparison2;
                                                                } 
                                                                
                                                                $comparison1score = (int)$score1;
                                                                $comparison2score = (int)$score2;
                                                                
                                                                switch($logicop) {
                                                                    case '<': $examlogicsresult[] = ($comparison1score < $comparison2score)? $logic['textmsg1'] : '';
                                                                            break;
                                                                    case '>': $examlogicsresult[] = ($comparison1score > $comparison2score)? $logic['textmsg1'] : '';
                                                                            break;
                                                                    case '=': $examlogicsresult[] = ($comparison1score == $comparison2score)? $logic['textmsg1'] : '';
                                                                            break;
                                                                    default: 
                                                                            $examlogicsresult[] ='';
                                                                }
                                                                $score1 = $score2 = 0; 
                                                            }else{
                                                                $comparison1 = $logic['comparison1'];
                                                                $textmsg1 = $logic['textmsg1'];
                                                                $textmsg2 = $logic['textmsg2'];
                                                                $comparray = array();
                                                                $comparray[] = $comparison1;
                                                                $new_comparison = array_intersect_key($new_questionAns, array_flip($comparray) ) ;
                                                                $scoreone = array_shift($new_comparison);
                                                                
                                                                if($logic['logic'] == 'true'){
                                                                    if($scoreTrue[0]['scorenumber'] == $scoreone ){
                                                                        $examlogicsresult[] =  $textmsg1;
                                                                    }else if($scoreTrue[1]['scorenumber'] == $scoreone ){
                                                                        $examlogicsresult[] =  $textmsg2;
                                                                    }
                                                                }
                                                            }
                                                        } 
                                                    }
                                                }  

                                                $total_score = 0;  $avg = 0; $total_Group=0;
                                                foreach($new_question as $nes=> $ques_factor){
                                                    if($factor_ids == 
                                                    $ques_factor['factore_id']){
                                                        $total_score += $ques_factor['score']; 
                                                    }
                                                    $total_Group += $ques_factor['score'];
                                                }
                                                //$avg = $total_score / $group['total_group'] * 100 ;
                                                 if($group['total_group'] > 0){
                                                    $avg = (float)$total_score / $group['total_group'] * 100;
                                                }else{
                                                    $avg = $total_score;
                                                }   
                                        @endphp
                                        @php $factore_label = (empty($factore_label))? $qestion['factore_label']: ''; 
                                        if ($factore_label == $qestion['factore_label'] && $dummy_factor != $qestion['factore_label']): 
                                        $dummy_factor = $qestion['factore_label'];
                                        @endphp
                                            <input type="hidden" name="Todaydate" class="Todaydate" value="@php echo(!empty($logic['updated_at']) ) ?  $Todaydate =    date('d-m-Y',strtotime($logic['updated_at']))  : ''; @endphp"><hr>
                                            @php 
                                                if($underno == $no_array){
                                                    $subno++;
                                                    $underno = 1;
                                                }
                                            @endphp
                                           <h4><u>{{$subno}}.{{ $underno++ }}&nbsp; {{$factore_label}}{{-- $new_filter_question['factore_label'][$factorKey] --}}</u></h4>
                                            <p> 
                                             {{--$factor_decri--}}
                                             @php echo (!empty($factor_decri))? $factor_decri : ''; @endphp
                                            </p> 
                                        @php endif @endphp 
                                        @php if ($i == $countFactor): @endphp
                                                 <div class="overall_percentile_wrap p-4 pl-2 pr-2">
                                                    <input type="text" id="overall_percentile_slider" class="overall_percentile_slider" name="overall_percentile_slider" value="{{round($avg,2)}}" />
                                                </div>
                                                <div class="text-center">   
                                                    <span class="markAVG" style="background-color: #ed5565 !important;color: #fff !important;">
                                                        @if($avg <= 10) 
                                                            Very Low
                                                        @elseif($avg <= 22)
                                                            Below Average
                                                        @elseif($avg <= 39)
                                                            Low Average
                                                        @elseif($avg <= 59)
                                                            Average
                                                        @elseif($avg <= 76)
                                                            High Average
                                                        @elseif($avg <= 88)
                                                            Above Average
                                                        @elseif($avg <= 100)
                                                            Very High
                                                        @endif
                                                    </span>
                                                </div>
                                                <br>
                                                <ul class="">
                                                    @foreach($examlogicsresult as $msg)
                                                        @php echo (!empty($msg))? '<li class="carrige_return_25"><span style="font-size: xx-large;">&#x2022; </span>'. $msg .'</li>':''; @endphp
                                                    @endforeach
                                                </ul>                                      
                                        @php endif  @endphp
                                        <?php  } //factor check
                                        ?>
                                        @php   $i++; $avg = 0; @endphp
                                    @php }  @endphp
                                @endforeach
                                @endforeach
                                <hr style="border: 2px solid black;">
                                @php $no++;  @endphp
                            @endforeach   
                            <hr/>
                        </div>                       
                    </div>
                </div>
            </div>
            <div class="text-center mt-3 footer-botton">
                <a href="javascript:void(0)" onclick="print_block()" class="btn--primary border--rounded p-1 pl-4 pr-4 text-white mr-2">Print </a>
                <a href="<?php echo route('user.exam.mcq.history') ?>" class="btn--primary border--rounded p-1 pl-4 pr-4 text-white">Back</a> 
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script>
        'use strict'
        var count = 0;
        window.onload = function () {
            if (typeof history.pushState === "function") {
                history.pushState("back", null, null);
                window.onpopstate = function () {
                    history.pushState('back', null, null);
                    if(count == 0){
                        window.location = "{{route('user.exam.list')}}";
                    }
                };
            }
         }
        setTimeout(function(){count = 0;},200);
        // var $d5 = $("#overall_percentile_slider");
        $(".overall_percentile_slider").each(function(){
            var $d5 = $(this);
            var avg = $(this).val();
            $d5.ionRangeSlider({
                type: "single",
                skin: "flat",
                min: 0,
                max: 100,
                disable :true,
                /* from: <?php //echo round($result_data['overall_percentile'],2); ?>,*/
                from: avg,
                step: 1,            // default 1 (set step)
                grid: true,         // default false (enable grid)
                grid_num: 10,
            });
        });
        

        // date get to copy 
        $(document).ready(function(){
            $.each($(".Todaydate"), function(){
                // $(this).parents(".mx-10").prev().val($(this).val());
                console.log($(this).val());
                $(".datetoday").text($(this).val());
            });
        });

        @if($specialtotal > 5 ) 
            (function ($) {
                'use strict';
                    swal({
                      title: "Are you sure?",
                      text: "To procuce the most accurate report for you, it is important that you answer all items truthfully.  You can review and change your answers by pressing the 'Back' button.",
                      icon: "warning",
                      buttons: ['Yes','Back'],
                      dangerMode: true,
                    })
                    .then((willDelete) => {
                      if (willDelete) {
                        window.location.href ='{{ route('user.exam.perticipate.retest',['id'=>$exam->id,'return'=>1]) }}';
                      } 
                    });
            })(jQuery);
                    
        @endif
        
        @if($indextrue == 1) 
            (function ($) {
                'use strict';
                    swal({
                      title: "Are you sure?",
                      text: "If you are taking this test only for your own information, please make sure that you are answering the questions truthfully.  You can review and change your answers by pressing the 'Back' button.  You are under no obligation to share your results with anyone else if you do not want to.",
                      icon: "warning",
                      buttons: ['Yes','Back'],
                      dangerMode: true,
                    })
                    .then((willDelete) => {
                      if (willDelete) {
                        window.location.href ='{{ route('user.exam.perticipate.retest',['id'=>$exam->id,'return'=>1]) }}';
                      } 
                    });
            })(jQuery);
                    
        @endif

        // print report
        function print_block(){
            /*$(".sidebar-menu, .copyright-wrapper, .footer-botton").css("display","none");
            $(".body-header-area").addClass("sr-only");   */                     
            $("#printarea").attr("class","col-xl-12 col-md-12 col-sm-12 mb-10");
            window.print();
        }
    </script>
@endpush
