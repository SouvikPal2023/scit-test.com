<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $general->sitename($page_title ?? '') }}</title>
    <!-- site favicon -->
    <link rel="shortcut icon" type="image/png" href="{{getImage(imagePath()['logoIcon']['path'] .'/favicon.png')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap">
    <!-- bootstrap 4  -->
    <link rel="stylesheet" href="{{ asset('public/assets/admin/css/vendor/bootstrap.min.css') }}">
    <!-- bootstrap toggle css -->
    <link rel="stylesheet" href="{{asset('public/assets/admin/css/vendor/bootstrap-toggle.min.css')}}">
    <!-- fontawesome 5  -->
    <link rel="stylesheet" href="{{asset('public/assets/admin/css/all.min.css')}}">
    <!-- line-awesome webfont -->
    <link rel="stylesheet" href="{{asset('public/assets/admin/css/line-awesome.min.css')}}">
    @stack('style-lib')

    <!-- flatpickr css links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    
    <!-- custom select box css -->
    <link rel="stylesheet" href="{{asset('public/assets/admin/css/vendor/nice-select.css')}}">
    <!-- code preview css -->
    <link rel="stylesheet" href="{{asset('public/assets/admin/css/vendor/prism.css')}}">
    <!-- select 2 css -->
    <link rel="stylesheet" href="{{asset('public/assets/admin/css/vendor/select2.min.css')}}">
    <!-- jvectormap css -->
    <link rel="stylesheet" href="{{asset('public/assets/admin/css/vendor/jquery-jvectormap-2.0.5.css')}}">
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{asset('public/assets/admin/css/vendor/datepicker.min.css')}}">
    <!-- timepicky for time picker css -->
    <link rel="stylesheet" href="{{asset('public/assets/admin/css/vendor/jquery-timepicky.css')}}">
    <!-- bootstrap-clockpicker css -->
    <link rel="stylesheet" href="{{asset('public/assets/admin/css/vendor/bootstrap-clockpicker.min.css')}}">
    <!-- bootstrap-pincode css -->
    <link rel="stylesheet" href="{{asset('public/assets/admin/css/vendor/bootstrap-pincode-input.css')}}">
   
    <!-- sweetalert css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css" />
    
    <!--Plugin CSS file with desired skin-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css"/>

    <!-- dashdoard main css -->
    <link rel="stylesheet" href="{{asset('public/assets/admin/css/app.css')}}">

    <!-- Custom main css -->
    <link rel="stylesheet" href="{{asset('public/assets/admin/css/custom.css')}}">

    <style>
        /*  Add Custom css      */
        .carousel-control-next, .carousel-control-prev {
            height: 10% !important;
            margin: auto !important;
        }
        /*icon spacing*/
        .image-upload .thumb .profilePicPreview .remove-image {
            top: 4px !important;
            right: 3px !important;
            border-radius: 5px !important;
            width: 35px;
            height: 35px;
            font-size: 15px;
        }
        .image-upload .thumb .profilePicUpload{
            height: 0;
        }

        .swal-overlay {
            position: fixed !important;
        }

        .swal-footer, .swal-text {
          text-align: center;
        }

        .irs-disabled{
            opacity: 1;
        }
        .select2-container .select2-selection--single .select2-selection__rendered[title*=" True / False "] {
            font-size: 10px;
        }
    </style>
    @stack('style')
</head>
<body>
@yield('content')
<!-- jQuery library -->
<script src="{{asset('public/assets/admin/js/vendor/jquery-3.6.0.min.js')}}"></script>

<!-- sweetalert js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- rangeSlider js-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script> 

<!-- bootstrap js -->
<script src="{{asset('public/assets/admin/js/vendor/bootstrap.bundle.min.js')}}"></script>
<!-- bootstrap-toggle js -->
<script src="{{asset('public/assets/admin/js/vendor/bootstrap-toggle.min.js')}}"></script>
<!-- slimscroll js for custom scrollbar -->
<script src="{{asset('public/assets/admin/js/vendor/jquery.slimscroll.min.js')}}"></script>
<!-- custom select box js -->
<script src="{{asset('public/assets/admin/js/vendor/jquery.nice-select.min.js')}}"></script>
@include('admin.partials.notify')
@stack('script-lib')
<script src="{{ asset('public/assets/admin/js/nicEdit.js') }}"></script>
<!-- code preview js -->
<script src="{{asset('public/assets/admin/js/vendor/prism.js')}}"></script>
<!-- seldct 2 js -->
<script src="{{asset('public/assets/admin/js/vendor/select2.min.js')}}"></script>
<!-- main js -->

<!-- flatpickr js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js"></script>

<script src="{{asset('public/assets/admin/js/app.js')}}"></script>
{{-- LOAD NIC EDIT --}}
<style type="text/css">
div#hidefullmain .carousel.slide .carousel-inner.profilePicPreview.imagemultiple {
    height: auto !important;
}
div#hidefullmain .carousel.slide {
    width: 40%;
    height: auto !important;
}
.main-image .profilePicPreview {
    height: auto !important;
}
.main-image {
    width: 40%;
}
.profilePicPreview.new-box {
    height: 200px !important;
    width: 40% !important;
}
<style>
    #custom-checkbox input[type="checkbox"]{
  width: 20px; 
  height: 20px !important; 
  position: relative;
  top: 8px;
}
    </style>
</style>

<script type="text/javascript">
    $(".flatpickr_dob").flatpickr({
        dateFormat: "d-m-Y",
        maxDate: "today",
        //static:true,
    });

    $(".flatpickr").flatpickr();
</script>

<script>

    $(document).ready(function() {
        $('.select2').select2();
    });

    (function($,document){
        "use strict";
        bkLib.onDomLoaded(function() {
            $( ".nicEdit" ).each(function( index ) {
                $(this).attr("id","nicEditor"+index);
                new nicEditor({fullPanel : true}).panelInstance('nicEditor'+index,{hasPanel : true});
            });
        });
    })(jQuery, document);
</script>
@stack('script')
</body>
</html>