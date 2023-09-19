@extends('templates.basic.layouts.auth')
@php
    $bg = getContent('login.content',true);
    $elements = getContent('policy.element',false,'',true)
@endphp
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
<div class="container">
    <video id="video_tag" style="width: 100vw;height:100vh;object-fit:fill;" muted>
        <source src="{{URL::asset("public/video/logo_video.mp4")}}" type="video/mp4">
    Your browser does not support the video tag.
    </video>
    <div class="overlayText">
        <p id="topText">Please click on video to play.</p>
    </div>
</div>
<section id="section_tag" style="display:none" class="account-section section--bg bg-overlay-white bg_img pt-50 pb-30" data-background="{{getImage('public/assets/images/frontend/login/'.@$bg->data_values->background_image,'1920x1080')}}">
        <div class="container">
            <div class="row account-area align-items-center justify-content-center">
                <div class="col-lg-8">
                    <div class="account-form-area">
                        <div class="account-logo-area text-center">
                            <div class="account-logo">
                                <a href="{{url('/')}}"><img src="{{getImage(imagePath()['logoIcon']['path'] .'/logo.png')}}" alt="logo"></a>
                            </div>
                        </div>
                        <div class="account-header text-center">
                            <h2 class="title">@lang('Register Your Account Now')</h2>
                            <h3 class="sub-title"> @lang('Already Have An Account') ? <a href="{{route('user.login')}}">@lang('Login Now')</a></h3>
                        </div>
                        <form class="account-form" method="POST" action="{{route('user.register')}}" onsubmit="return submitUserForm();">
                            @csrf
                            <div class="row ml-b-20">
                                <div class="col-lg-6 form-group">
                                    <label>@lang('First Name')</label>
                                    <input type="text" class="form-control form--control" name="firstname" value="{{old('firstname')}}">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label>@lang('Last Name')</label>
                                    <input type="text" class="form-control form--control" name="lastname" value="{{old('lastname')}}">
                                </div>
                                <span style="color:white;margin-top: -5px;margin-bottom: 15px;">First Name & Last Name are Optional but recommended - you may use a false name.</span>
                                <div class="col-lg-12 form-group">
                                    <label>@lang('Username')</label>
                                    <input type="text" class="form-control form--control" name="username" value="{{old('username')}}" required>
                                </div>
                                    <div class="form-group col-lg-12 country-code">
                                        <label>@lang('Mobile')</label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <select id="country-dd-code" name="country_code">
                                                        @foreach($countries as $data)
                                                        <option  {{ ($data->name) == 'Canada' ? 'selected' : '' }} value="{{$data->phonecode}}">
                                                            +{{$data->phonecode}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </span>
                                            </div>
                                            <input type="text" name="mobile" value="{{old('mobile')}}" class="form-control form--control" required>
                                        </div>
                                    </div>
                                <div class="col-lg-4 form-group">
                                    <label>@lang('Gender')</label>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="gender" value="male" id="flexRadioDefault1" checked>
                                        <label class="form-check-label " for="flexRadioDefault1">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="gender" value="female" id="flexRadioDefault2" >
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Female
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>@lang('Country')</label>
                                    <select id="country-dd"  name="country" class="form--control" required>
                                        <option value="">Select Country</option>
                                        @foreach($countries as $data)
                                        <option value="{{$data->id}}">
                                        {{$data->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                    
                                   <!--  <input type="text" name="country" class="form-control form--control" required readonly> -->
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>@lang('Province/State/Region')</label>
                                    <select id="state-dd"  name="state" class="form--control" required>
                                    </select>
                                    <!-- <input type="text" name="state" class="form-control form--control" value="{{old('state')}}" required> -->
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>@lang('City')</label>
                                    <select id="city-dd" name="city" class="form--control" required>
                                    </select>
                                   <!--  <input type="text" name="city" class="form-control form--control"  value="{{old('city')}}" required> -->
                                </div>

                                <div class="col-lg-12 form-group">
                                    <label>@lang('Email')</label>
                                    <input type="email" class="form-control form--control" name="email" value="{{old('email')}}" required>
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label>@lang('Date of birth')</label>
                                    <input type="text" class="form-control form--control flatpickr" name="dob" value="{{old('dob')}}" required>
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label>@lang('Race')</label>
                                    <div class="input-group-prepend">
                                        <select name="race" class="form-control form--control" required>
                                            <option></option>
                                            <option value="White">White (not of Hispanic origin)</option>
                                            <option value="Black">Black (not of Hispanic origin)</option>
                                            <option value="Hispanic or Latino">Hispanic or Latino</option>
                                            <option value="Asian">Asian</option>
                                            <option value="American Indian or Alaska Native">American Indian or Alaska Native</option>
                                            <option value="Native Hawaiian or Pacific Islander">Native Hawaiian or Pacific Islander</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label>@lang('Password')</label>
                                    <input type="password" class="form-control form--control" name="password" required>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label>@lang('Confirm Password')</label>
                                    <input type="password" class="form-control form--control" name="password_confirmation" required>
                                </div>
                                <div class="col-lg-12 form-group">
                                    <div class="checkbox-wrapper d-flex flex-wrap align-items-center">
                                        <div class="checkbox-item">
                                            <input type="checkbox" id="c1" name="terms">
                                            <label for="c1">@lang('I have read agreed with the')
                                                 @foreach ($elements as $el)
                                                    <a href="{{route('links',[slug($el->data_values->title),$el->id])}}" target="_blank" class="mr-2">{{__($el->data_values->title)}}</a>
                                                @endforeach
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 form-group text-center">
                                    <button type="submit" class="submit-btn">@lang('Register Now')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('style')
<style type="text/css">
    .country-code .input-group-prepend .input-group-text{
        background-color: rgba(255, 255, 255, 0.1) !important;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    .country-code select{
        border: none;
        background-color: transparent;
        color: #fff;
    }
    .country-code select:focus{
        border: none;
        outline: none;
    }
</style>
@endpush
@push('script')

    <script type="text/javascript">
        $('[name="mobile"]').keypress(function(event){
         
        if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
            event.preventDefault();
        }});
    </script>
    <script>
      "use strict";

        

       @if('CA')
        var t = $(`option[data-code={{ 'CA' }}]`).attr('selected','');
       @endif
        $('select[name=country_code]').on('change',function(){
            $('input[name=country]').val($('select[name=country_code] :selected').data('country'));
        }).change();
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
    </script>
    <script>

        $(document).ready(function(){ 
            var idCountry = $('select#country-dd option:selected').val();
            $.ajax({
                url: "{{url('fetch-states')}}",
                type: "POST",
                data: {
                    country_id: idCountry,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#state-dd').html('<option value="">Select State</option>');
                    $.each(result.states, function (key, value) {
                        $("#state-dd").append('<option name="state" value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    $('#city-dd').html('<option value="">Select City</option>');
                }
            });
        });


        $(document).ready(function () {
            $('#country-dd').on('change', function () {
                var idCountry = this.value;
                $("#state-dd").html('');
                $.ajax({
                    url: "{{url('fetch-states')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state-dd').html('<option value="">Select State</option>');
                        $.each(result.states, function (key, value) {
                            $("#state-dd").append('<option name="state" value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city-dd').html('<option value="">Select City</option>');
                    }
                });
            });
            $('#state-dd').on('change', function () {
                var idState = this.value;
                $("#city-dd").html('');
                $.ajax({
                    url: "{{url('fetch-cities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#city-dd').html('<option value="">Select City</option>');
                        $.each(res.cities, function (key, value) {
                            $("#city-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
        $('#video_tag').prop('muted', true).trigger('play'); 
        $(".overlayText").css('z-index',0);

        $("#video_tag").on('ended',function(){
            console.log('Video has ended!');
            $("#section_tag").css('z-index',100).css('display','block');
        });
        $( window ).on("load", function() {
            $("#video_tag").click(function(){
                // $('#video_tag').prop('muted', true).trigger('play'); 
                $(this).prop('muted', false);
                // $(".overlayText").css('z-index',0);
            });
        });
    </script>
@endpush