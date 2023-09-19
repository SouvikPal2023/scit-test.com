<style>
    .breadcrumb-item.active::before{
        color:white!important;
    }
</style>
@php
    $breadcrumb = getContent('breadcrumb.content',true)->data_values;
@endphp

<section class="inner-banner-section banner-section bg-overlay-white bg_img" data-background="{{getImage('public/assets/images/frontend/breadcrumb/End.png','1920x1280')}}">
    <div class="container">
        <div class="row align-items-center justify-content-center mb-30-none">
            <div class="col-xl-12 text-center mb-30">
                <div class="banner-content">
                    <h1 class="title text--base" style="color:white!important">{{__($page_title)}}</h1>
                    <div class="breadcrumb-area">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}" style="color:white!important">@lang('Home')</a></li>
                                <li class="breadcrumb-item active" aria-current="page" style="color:white!important">{{__($page_title)}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>