@include($activeTemplate.'partials.headerCss')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.css" integrity="sha512-MQXduO8IQnJVq1qmySpN87QQkiR1bZHtorbJBD0tzy7/0U9+YIC93QWHeGTEoojMVHWWNkoCp8V6OzVSYrX0oQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<body>

<section class="page-container ss">
<div class="body-wrapper">
    @yield('content')
    </div>
</section>
   
    @include($activeTemplate.'partials.scripts')
    @include('partials.plugins')
    @include('admin.partials.notify')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js" integrity="sha512-K/oyQtMXpxI4+K0W7H25UopjM8pzq0yrVdFdG21Fh5dBe91I40pDd9A4lzNlHPHBIP2cwZuoxaUSX0GJSObvGA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
    $(".flatpickr").flatpickr({
        dateFormat: "d-m-Y",
        maxDate: "today"
    });
    </script>
    <script>
    (function($) {
        "use strict";
        $(document).on("change", ".langSel", function() {
            window.location.href = "{{url('/')}}/change/" + $(this).val();
        });
    })(jQuery);
    </script>

</body>

</html>