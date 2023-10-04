@if(!empty($seo))
    <title> {{ $general->sitename(__($page_title)) }}</title>
    <meta name="title" Content="{{ $general->sitename(__($page_title)) }}">
    <meta name="description" content="{{ $seo->description }}">
    <meta name="keywords" content="{{ implode(',',$seo->keywords) }}">
    <link rel="shortcut icon" href="{{asset('assetsnew/images/logo.png')}}" type="image/x-icon">

    {{--<!-- Apple Stuff -->--}}
    <link rel="apple-touch-icon" href="{{asset('assetsnew/images/logo.png')}}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="{{ $general->sitename($page_title) }}">
    {{--<!-- Google / Search Engine Tags -->--}}
    <meta itemprop="name" content="{{ $general->sitename($page_title) }}">
    <meta itemprop="description" content="{{ $general->seo_description }}">
    <meta itemprop="image" content="{{asset('assetsnew/images/logo.png')}}">
    {{--<!-- Facebook Meta Tags -->--}}
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $seo->social_title }}">
    <meta property="og:description" content="{{ $seo->social_description }}">
    <meta property="og:image" content="{{asset('assetsnew/images/logo.png')}}"/>
    <meta property="og:image:type" content="image/{{ @pathinfo(asset('assetsnew/images/logo.png') .'/'. $seo->image)['extension'] }}" />
    @php $social_image_size = explode('x', imagePath()['seo']['size']) @endphp
    <meta property="og:image:width" content="{{ $social_image_size[0] }}" />
    <meta property="og:image:height" content="{{ $social_image_size[1] }}" />
    <meta property="og:url" content="{{ url()->current() }}">
    {{--<!-- Twitter Meta Tags -->--}}
    <meta name="twitter:card" content="summary_large_image">
@endif
