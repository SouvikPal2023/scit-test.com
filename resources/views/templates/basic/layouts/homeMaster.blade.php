@include($activeTemplate.'partials.headerCss')

<body>


    @include($activeTemplate.'partials.headerNew')




 
    @yield('content')

    
    @include($activeTemplate.'partials.footerNew')
    @include($activeTemplate.'partials.scripts')

</body>

</html>