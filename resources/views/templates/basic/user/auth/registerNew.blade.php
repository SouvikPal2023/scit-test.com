@extends('templates.basic.layouts.authNew')
@section('content')
@php
    $bg = getContent('login.content',true);
    $elements = getContent('policy.element',false,'',true)
@endphp
<section class="login-page-form register-page-form">
    <div class="container">
        <div class="row login-wrap align-items-center">

            <div class="col-md-8 p-0">
                <div class="login-page" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle">
                    <div class="login-page-box" role="document">
                        <div class="modal-content login">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                <a href="{{url('/')}}"> <img src="{{asset('assetsnew/images/logo.png')}}" alt=""></a>
                                </h5>
                            </div>
                            <div class="modal-body">
                                <ul class="heading">
                                    <li class="nav-item">
                                        <h4>@lang('Register Your Account Now')</h4>
                                        <p>@lang('Already Have An Account') ? <a href="{{route('user.login')}}">@lang('Login Now')</a></p>
                                    </li>
                                </ul><!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                        <div class="form-sec" id="my_form">
                                            <form class="rd-mailform1" method="POST" action="{{route('user.register')}}" onsubmit="return submitUserForm();">
                                            @csrf
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>@lang('First Name')</label>
                                                            <input type="text" class="form-control" name="firstname" value="{{old('firstname')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>@lang('Last Name')</label>
                                                            <input type="text" class="form-control" name="lastname" value="{{old('lastname')}}">
                                                        </div>
                                                    </div>

                                                    <h5>First Name & Last Name are Optional but recommended - you may
                                                        use a false name.</h5>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>@lang('Username')</label>
                                                            <input type="text" class="form-control" name="username" value="{{old('username')}}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>@lang('Mobile')</label>
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <select class="form-control" id="country-dd-code"
                                                                    name="country_code">
                                                                        @foreach($countries as $data)
                                                        <option  {{ ($data->name) == 'Canada' ? 'selected' : '' }} value="{{$data->phonecode}}">
                                                            +{{$data->phonecode}}
                                                        </option>
                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-8">
                                                                <input type="text" name="mobile" value="{{old('mobile')}}" class="form-control form--control" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>@lang('Gender')</label>
                                                            <div class="form-check">
                                                                <label class="form-check-label" for="flexRadioDefault1">
                                                                <input class="form-check-input" type="radio" name="gender" value="male" id="flexRadioDefault1" checked>Male
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <label class="form-check-label" for="flexRadioDefault2">
                                                                <input class="form-check-input" type="radio" name="gender" value="female" id="flexRadioDefault2" >Female
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>@lang('Country')</label>
                                                            <select class="form-control" id="country-dd"  name="country">
                                                            <option value="">Select Country</option>
                                        @foreach($countries as $data)
                                        <option value="{{$data->id}}">
                                        {{$data->name}}
                                        </option>
                                        @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>@lang('Province/State/Region')</label>
                                                            <select class="form-control" id="state-dd"  name="state">
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>@lang('City')</label>
                                                            <select class="form-control" id="city-dd" name="city">
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>@lang('Email')</label>
                                                            <input type="email" class="form-control" name="email" value="{{old('email')}}" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>@lang('Date of birth')</label>
                                                            <input type="text" class="form-control flatpickr" name="dob" value="{{old('dob')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>@lang('Race')</label>
                                                            <select class="form-control" id="sel1"name="race">
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
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>@lang('Password')</label>
                                                            <input type="password" class="form-control" name="password" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>@lang('Confirm Password')</label>
                                                            <input type="password" class="form-control" name="password_confirmation" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                            
                                                                <input type="checkbox" name="terms" class="form-check-input"
                                                                    value="1">I have read agreed with the  
                                                                    @foreach ($elements as $el)
                                                    <a href="{{route('links',[slug($el->data_values->title),$el->id])}}" target="_blank" class="mr-2">{{__($el->data_values->title)}}</a>
                                                @endforeach
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-left">
                                                    <button class="contact_submit_btn" type="submit">@lang('Register Now')</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-2" role="tabpanel">
                                        <div class="form-sec" id="my_form">
                                            <form class="rd-mailform1">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="Phone No.">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="*Password">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="*Confirm Password">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="text-left">
                                                    <button class="contact_submit_btn" type="submit">Register</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
@endsection