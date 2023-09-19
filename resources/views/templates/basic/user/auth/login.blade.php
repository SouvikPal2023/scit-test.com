@extends('templates.basic.layouts.auth')

@php
    $bg = getContent('login.content',true);
@endphp
@push('style')
    <style>
        .bg_img {
            background-color: #040a2c00 !important;
        }
        .bg-overlay-white:before{
            background-color: #040a2c00 !important;
        }
        #video_tag,
        #section_tag {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }
        #video_tag {
            z-index: 10;
        }
        .overlayText {
            position:absolute;
            /* top:30%; */
            left:40%;
            z-index:11;
        }

        #topText {
            color: white;
            font-size: 20px;
            align-self: center;
        }
    </style>
@endpush
@section('content')

@if(@!$is_logout)
    <div class="container">
        <video id="video_tag" style="width: 100vw;height:100vh;object-fit:fill;" muted>
            <source src="{{URL::asset("video/logo_video.mp4")}}" type="video/mp4">
        Your browser does not support the video tag.
        </video>
        <div class="overlayText">
            <p id="topText">Please click on video to play.</p>
        </div>
    </div>
@endif
<section id="section_tag" class="account-section section--bg bg-overlay-white bg_img" data-background="{{getImage('public/assets/images/frontend/login/'.@$bg->data_values->background_image,'1920x1080')}}" style="background-position: 100% 0% !important;background-size: contain !important;background-color: #cae3fb !important;display:none">
        <div class="container">
            <div class="row account-area align-items-center justify-content-first">
                <div class="col-lg-5">
                    <div class="account-form-area" style="background-color: #000c2b !important;">
                        <div class="account-logo-area text-center">
                            <div class="account-logo">
                                <a href="{{url('/')}}"><img src="{{getImage(imagePath()['logoIcon']['path'] .'/logo.png')}}" alt="logo"></a>
                            </div>
                        </div>
                        <div class="account-header text-center">
                            <h2 class="title">@lang('Login')</h2>
                            <h3 class="sub-title"> @lang('Don\'t Have An Account') ? <a href="{{route('user.register')}}">@lang('Register Now')</a></h3>
                        </div>
                        <form class="account-form" action="{{route('user.login')}}" method="POST" onsubmit="return submitUserForm();">
                            @csrf
                            <div class="row ml-b-20">
                                <div class="col-lg-12 form-group">
                                    <label>@lang('Username Or Email') <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form--control" name="username" required value="{{old('username')}}">
                                </div>
                                <div class="col-lg-12 form-group">
                                    <label>@lang('Password') <span>*</span></label>
                                    <input type="password" class="form-control form--control" name="password" required>
                                </div>

                                @include($activeTemplate.'partials.custom-captcha')
                                <div class="form-group col-lg-12">
                                  @php echo recaptcha() @endphp
                                </div>

                                <div class="col-lg-12 form-group">
                                    <div class="checkbox-wrapper d-flex flex-wrap align-items-center">
                                        <div class="checkbox-item">
                                            <label><a href="{{route('user.password.request')}}"> @lang('Forgot Password') ?</a></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 form-group text-center">
                                    <button type="submit" class="submit-btn">@lang('Login Now')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> --}}
    <script>
        "use strict";
        function submitUserForm() {
            var response = grecaptcha.getResponse();
            if (response.length == 0) {
                document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;">@lang("Captcha field is required.")</span>';
                return false;
            }
            return true;
        }
        function verifyCaptcha() {
            document.getElementById('g-recaptcha-error').innerHTML = '';
        }
        $(document).ready(function(){
            $('#video_tag').prop('muted', true).trigger('play'); 
            $(".overlayText").css('z-index',0);
            
            $("#video_tag").on('ended',function(){
                console.log('Video has ended!');
                $("#section_tag").css('z-index',100).css('display','block');
            });
        });

        $( window ).on("load", function() {
            $("#video_tag").click(function(){
                // $('#video_tag').prop('muted', true).trigger('play'); 
                $(this).prop('muted', false);
                // $(".overlayText").css('z-index',0);
            });
            let is_logout = "<?php echo @$is_logout ; ?>";
                console.log(is_logout)
            if(is_logout){
                console.log('klhnlihl')
                $("#section_tag").css('z-index',100).css('display','block');

            }
        });
    </script>
@endpush
