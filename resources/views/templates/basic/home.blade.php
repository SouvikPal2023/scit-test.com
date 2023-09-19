<style>
    .banner_container{
        width: 45%;
        top: -100px;
    }
</style>
@extends($activeTemplate.'layouts.frontend')

@section('content')

@php

	$banner = @getContent('banner.content',true)->data_values;
// var_dump($banner);
// exit;

@endphp

 <section class="banner-section bg-overlay-white bg_img" data-background="{{getImage('public/assets/images/frontend/banner/'.$banner->background_image,'1920x1080')}}">

    <div class="banner_container">

        <div class="row justify-content-center align-items-center mb-30-none">

            <div class="col-xl-10 text-center mb-30">

                <div class="banner-content">

                    <iframe width="500" height="315" src="https://www.youtube.com/embed/AOWFv7fJN6g" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

                    {{-- <h1 class="title text--base">{{__($banner->heading)}}</h1>

                    <h3 class="sub-title text-white">{{__($banner->sub_heading)}}</h3> --}}

                    <p style="font-size: 18px;padding-top: 100px;" class="sub-title mt-4">If you are unsure of what the SCIT is intended for, or unsure that the SCIT is right for you, please watch the video provided above. The SCIT itself contains images and material that some people may find offensive: since it is intended to survey a wide range of attitudes and behaviours, this is unavoidable.</p>
                    <p style="font-size: 18px;" class="sub-title">By entering the site, you agree that you are of the legal age necessary to provide suitable consent in your jurisdiction.</p>
                    <div class="banner-btn">

                        {{-- <a href="{{url($banner->button_1_link)}}" class="btn--base">{{__($banner->button_1_text)}}</a>

                        <a href="{{url($banner->button_2_link)}}" class="btn--base active">{{__($banner->button_2_text)}}</a> --}}
                        <a href="{{url('/login')}}" class="btn--base">Login</a>
                    </div>

                </div>

            </div>

        </div>

    </div>

 </section>

    @if($sections->secs != null)

        @foreach(json_decode($sections->secs) as $sec)
        
            @if($sec != 'feature')
                @include($activeTemplate.'sections.'.$sec)
            @endif

        @endforeach

    @endif

@endsection

