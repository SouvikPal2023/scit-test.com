@extends('admin.layouts.master')
@push('style')
    <style>
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
    <div id="section_tag" style="display:block" class="page-wrapper default-version">

        <div class="form-area bg_img" data-background="{{asset('assets/admin/images/1.jpg')}}">

            <div class="form-wrapper">

                <h4 class="logo-text mb-15">@lang('Welcome to') <strong>{{__($general->sitename)}}</strong></h4>

                <p>{{__($page_title)}} @lang('to')  {{__($general->sitename)}} @lang('dashboard')</p>

                <form action="{{ route('admin.login') }}" method="POST" class="cmn-form mt-30">

                    @csrf

                    <div class="form-group">

                        <label for="email">@lang('Username')</label>

                        <input type="text" name="username" class="form-control b-radius--capsule" id="username" value="{{ old('username') }}" placeholder="@lang('Enter your username')">

                        <i class="las la-user input-icon"></i>

                    </div>

                    <div class="form-group">

                        <label for="pass">@lang('Password')</label>

                        <input type="password" name="password" class="form-control b-radius--capsule" id="pass" placeholder="@lang('Enter your password')">

                        <i class="las la-lock input-icon"></i>

                    </div>

                    <div class="form-group d-flex justify-content-between align-items-center">

                        <a href="{{ route('admin.password.reset') }}" class="text-muted text--small"><i class="las la-lock"></i>@lang('Forgot password?')</a>

                    </div>

                    <div class="form-group">

                        <button type="submit" class="submit-btn mt-25 b-radius--capsule">@lang('Login') <i class="las la-sign-in-alt"></i></button>

                    </div>

                </form>

            </div>

        </div><!-- login-area end -->

    </div>

@endsection
@push('script')
    <script>
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


