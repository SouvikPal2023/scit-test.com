
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('partials.seo')
    <title>{{ $general->sitename(__($page_title)) }}</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great|Josefin+Sans:400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">
    <!-- fontawesome css link -->
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/fontawesome-all.min.css')}}">
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/bootstrap.min.css')}}">
    <!-- odometer css -->
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/odometer.css')}}">
    <!-- lightcase css links -->

    <!-- flatpickr css links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/lightcase.css')}}">
    <!-- swipper css link -->
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/swiper.min.css')}}">
    <!-- line-awesome-icon css -->
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/line-awesome.min.css')}}">
    <!-- animate.css -->
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/animate.css')}}">
    <!-- main style css link -->
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/style.css')}}">

    <link href="{{ asset('assets/templates/basic/css/color.php') }}?color={{$general->base_color}}&color2={{$general->secondary_color}}" rel="stylesheet" />

    <!--Plugin CSS file with desired skin-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css"/>
    @stack('style-lib')
    @stack('style')

    <style type="text/css">
        .irs-disabled{
            opacity: 1;
        }
        
    </style>
</head>
<body class="bg--gray">
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Preloader
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="preloader">
    <div class="loader book">
        <figure class="page"></figure>
        <figure class="page"></figure>
        <figure class="page"></figure>
    </div>
    @if ($_SERVER['REQUEST_URI'] == '/user/exam/list' )
        <div class="loader" style="margin-top: 60px;color:white;font-size:25px">Loading your SCIT</div>
    @endif
</div>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Preloader
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Dashboard
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="page-container ss">
    @include($activeTemplate.'partials.sidemenu')
    <div class="body-wrapper">
        @include($activeTemplate.'partials.dashboardHeader')
        @yield('content')
    </div>
    <div class="copyright-wrapper">
        <div class="copyright-area">
            <p>@lang('Copyright') © {{date('Y')}} @lang('All Rights Reserved by') {{$general->sitename}}</p>
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Dashboard
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<!-- jquery -->
<script src="{{asset($activeTemplateTrue.'js/jquery-3.6.0.min.js')}}"></script>
<!-- bootstrap js -->
<script src="{{asset($activeTemplateTrue.'js/bootstrap.bundle.min.js')}}"></script>

<!-- flatpickr js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js"></script>

<!-- select2 js -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- rangeSlider js-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script> 

<!-- swipper js -->
<script src="{{asset($activeTemplateTrue.'js/swiper.min.js')}}"></script>
<!-- viewport js -->
<script src="{{asset($activeTemplateTrue.'js/viewport.jquery.js')}}"></script>
<!-- odometer js -->
<script src="{{asset($activeTemplateTrue.'js/odometer.min.js')}}"></script>
<!-- lightcase js-->
<script src="{{asset($activeTemplateTrue.'js/lightcase.js')}}"></script>
<!-- wow js file -->
<script src="{{asset($activeTemplateTrue.'js/wow.min.js')}}"></script>
<!-- main -->
<script src="{{asset($activeTemplateTrue.'js/jquery.easing.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/main.js')}}"></script>
<script src="{{ asset($activeTemplateTrue.'js/nicEdit.js') }}"></script>


<script type="text/javascript">
    $(".flatpickr_dob").flatpickr({
        dateFormat: "d-m-Y",
        maxDate: "today"
    });

    $(".flatpickr").flatpickr();
</script>

<script>
    (function($,document){
        "use strict";
        bkLib.onDomLoaded(function() {
            $( ".nicEdit" ).each(function( index ) {
                $(this).attr("id","nicEditor"+index);
                new nicEditor({fullPanel : true}).panelInstance('nicEditor'+index,{hasPanel : true});
            });
        });
        $( document ).on('mouseover ', '.nicEdit-main,.nicEdit-panelContain',function(){
            $('.nicEdit-main').focus();
        });
        jQuery('[data-toggle="tooltip"]').tooltip();
    })(jQuery, document);
</script>
<script>
    $(document).ready(function(){
        // $('.page-container').addClass('show');
    });    
</script>   
@stack('script-lib')
@stack('script')




@include('admin.partials.notify')

</body>
</html>