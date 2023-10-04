<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('partials.seo')
    <title>{{ $general->sitename(__($page_title)) }}</title>


    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('frontassets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontassets/css/brands.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontassets/css/fontawesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('frontassets/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('frontassets/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('frontassets/css/OverlayScrollbars.min.css')}}">
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

    <link
        href="{{ asset('assets/templates/basic/css/color.php') }}?color={{$general->base_color}}&color2={{$general->secondary_color}}"
        rel="stylesheet" />

    <!--Plugin CSS file with desired skin-->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css" />
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/fontawesome-all.min.css')}}">
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/bootstrap.min.css')}}">
    <!-- odometer css -->
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/odometer.css')}}">
    @stack('style-lib')
    @stack('style')
    <style type="text/css">
    .irs-disabled {
        opacity: 1;
    }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<section class="page-container ss">
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light exam-footer">
    <ul class="navbar-nav">
        
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">
                @if(!empty($exam->title) && Route::current()->getName() == 'user.exam.perticipate' )
                @lang('Exam Name') : {{__($exam->title)}} &nbsp; @lang('Total Question') : {{$exam->questions->count()}}
                @else
                {{__($page_title)}}
                @endif
            </a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <div class="body-header-right dropdown">
        <button type="button" class="" data-toggle="dropdown" data-display="static" aria-haspopup="true"
            aria-expanded="false">
            <div class="header-user-area d-flex flex-wrap align-items-center justify-content-between">
                <div class="header-user-content mr-4">
                    <span>@lang('Balance : '){{getAmount(auth()->user()->balance)}} {{$general->cur_text}}</span>
                </div>

                <div class="header-user-thumb">
                    <a href="#0"><img
                            src="{{isset(auth()->user()->image) ? url('/assets/images/user/profile/'.auth()->user()->image) : asset('assetsnew/images/default-image.png') }}"
                            alt="user"></a>
                </div>

                <div class="header-user-content">
                    <span>{{auth()->user()->username}}</span>
                </div>
                <span class="header-user-icon"><i class="las la-chevron-circle-down"></i></span>
            </div>
        </button>
        <div class="dropdown-menu dropdown-menu--sm p-0 border-0 dropdown-menu-right">
            <a href="{{route('user.change-password')}}" class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                <i class="dropdown-menu__icon las la-key"></i>
                <span class="dropdown-menu__caption">@lang('Change Password')</span>
            </a>
            <a href="{{route('user.profile-setting')}}" class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                <i class="dropdown-menu__icon las la-user-circle"></i>
                <span class="dropdown-menu__caption">@lang('Profile Settings')</span>
            </a>
            <a href="{{route('user.logout')}}" class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                <i class="dropdown-menu__icon las la-sign-out-alt"></i>
                <span class="dropdown-menu__caption">@lang('Logout')</span>
            </a>
        </div>
    </div>
</nav>
<!-- /.navbar -->
    <div class="body-wrapper">
        <!-- @include($activeTemplate.'partials.dashboardHeader') -->
        @yield('content')
    </div>
    <!-- <div class="copyright-wrapper">
        <div class="copyright-area">
            <p>@lang('Copyright') © {{date('Y')}} @lang('All Rights Reserved by') {{$general->sitename}}</p>
        </div>
    </div> -->
</section>
    <!-- ./wrapper -->
    <footer class="main-footer exam-footer">
        <strong>@lang('Copyright') © {{date('Y')}} @lang('All Rights Reserved by') {{$general->sitename}}</strong>
    </footer>
    <!-- jquery -->
    <script src="{{asset($activeTemplateTrue.'js/jquery-3.6.0.min.js')}}"></script>
    <!-- jQuery -->
    <script src="{{asset('frontassets/js/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('frontassets/js/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('frontassets/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('frontassets/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('frontassets/js/jquery.overlayScrollbars.min.js')}}"></script>
    <script src="{{asset('frontassets/js/adminlte.js')}}"></script>
    <script src="{{ asset($activeTemplateTrue.'js/nicEdit.js') }}"></script>
    <!-- swipper js -->
    <script src="{{asset($activeTemplateTrue.'js/swiper.min.js')}}"></script>
    <!-- viewport js -->
    <script src="{{asset($activeTemplateTrue.'js/viewport.jquery.js')}}"></script>
    <!-- odometer js -->
    <script src="{{asset($activeTemplateTrue.'js/odometer.min.js')}}"></script>
    <!-- lightcase js-->
    <script src="{{asset($activeTemplateTrue.'js/lightcase.js')}}"></script>
    <!-- wow js file -->
    <!-- select2 js -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- flatpickr js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js"></script>

    <script type="text/javascript">
    $(".flatpickr_dob").flatpickr({
        dateFormat: "d-m-Y",
        maxDate: "today"
    });

    $(".flatpickr").flatpickr();
    </script>

    <script>
    (function($, document) {
        "use strict";
        bkLib.onDomLoaded(function() {
            $(".nicEdit").each(function(index) {
                $(this).attr("id", "nicEditor" + index);
                new nicEditor({
                    fullPanel: true
                }).panelInstance('nicEditor' + index, {
                    hasPanel: true
                });
            });
        });
        $(document).on('mouseover ', '.nicEdit-main,.nicEdit-panelContain', function() {
            $('.nicEdit-main').focus();
        });
        jQuery('[data-toggle="tooltip"]').tooltip();
    })(jQuery, document);
    </script>
    <script>
    $(document).ready(function() {
        // $('.page-container').addClass('show');
    });
    </script>
    @stack('script-lib')
    @stack('script')
    @include('admin.partials.notify')
</body>

</html>