@include($activeTemplate.'partials.headerCss')

<body>

    @php echo fbcomment() @endphp
    @include($activeTemplate.'partials.headerNew')





    @yield('content')


    @include($activeTemplate.'partials.footerNew')
    @include($activeTemplate.'partials.scripts')

    @include('partials.plugins')
    @include('admin.partials.notify')




</body>

</html>