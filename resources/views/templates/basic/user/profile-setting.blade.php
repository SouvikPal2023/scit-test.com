@extends($activeTemplate.'layouts.masterNew')
<style>
    .linksParentContainer{
        display: flex;;
        justify-content: space-around;
        align-items: space-around;
        flex-wrap: wrap;
    }
    .linkContainer{
        width: 35%;
        height: 100px;
        border: 1px solid blue;
        color: blue;
        margin: 35px;
        border-radius: 15px;
        display: flex;
        justify-content: space-around;
        align-items: center;
    }
</style>
@section('content')
    @php
        $user =auth()->user();
    @endphp
    <div class="user-profile-area mt-30">
        <form action="{{route('user.profile-setting')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center mb-30-none">
                <div class="col-xl-5 col-md-12 col-sm-12 mb-30">
                    <div class="panel panel-default">
                        <div class="panel-heading d-flex flex-wrap align-items-center justify-content-between">
                            <div class="panel-title"><i class="las la-user"></i>@lang('Details')</div>
                        </div>
                        <div class="panel-body">
                            <div class="panel-body-inner">
                                <div class="profile-thumb-area text-center">
                                    <div class="profile-thumb">
                                        <div class="image-preview bg_img"
                                        data-background="{{isset(auth()->user()->image) ? url('/assets/images/user/profile/'.auth()->user()->image) : asset('assetsnew/images/default-image.png') }}">
                                             <!-- data-background="{{ getImage(imagePath()['profile']['user']['path'].'/'. auth()->user()->image,imagePath()['profile']['user']['size']) }}"> -->
                                        </div>
                                    </div>
                                    <div class="profile-edit">
                                        <input type="file" name="image" id="imageUpload" class="upload"
                                               accept=".png, .jpg, .jpeg">
                                        <div class="rank-label">
                                            <label for="imageUpload" class="imgUp bg--primary">
                                                @lang('Upload Image')
                                            </label>
                                        </div>
                                    </div>
                                    <div class="profile-content-area text-center mt-20">
                                        <h3 class="name">{{$user->fullName}}</h3>
                                        <h5 class="email">@lang('E-Mail') : {{$user->email}}</h5>
                                        <h5 class="phone">@lang('Phone') : {{$user->mobile}}</h5>
                                        <h5 class="adress">@lang('Address') : {{$user->address->address}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="linksParentContainer" >
                        <div class="linkContainer">
                            <a href="{{route('user.change-password')}}">
                                <i class="las la-key"></i>
                                <span class="title">@lang('Change Password')</span>
                            </a>
                        </div>
                        <div class="linkContainer">
                            <a href="{{route('user.twofactor')}}">
                                <i class="las la-lock-open"></i>
                                <span class="title">@lang('2FA Security')</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-md-12 col-sm-12 mb-30">
                    <div class="panel panel-default">
                        <div class="panel-heading d-flex flex-wrap align-items-center justify-content-between">
                            <div class="panel-title"><i class="las la-user"></i>@lang('Edit')</div>
                        </div>
                        <div class="panel-form-area">
                            <div class="row justify-content-center">
                                <div class="form-group col-sm-6">
                                    <label for="InputFirstname" class="col-form-label">@lang('First Name'):</label>
                                    <input type="text" class="form-control" id="InputFirstname" name="firstname"
                                           placeholder="@lang('First Name')" value="{{$user->firstname}}" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="lastname" class="col-form-label">@lang('Last Name'):</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname"
                                           placeholder="@lang('Last Name')" value="{{$user->lastname}}" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="email" class="col-form-label">@lang('E-mail Address'):</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                           placeholder="@lang('E-mail Address')" value="{{$user->email}}" readonly>
                                </div>
                                <div class="form-group col-sm-6">
                                    <input type="hidden" id="track" name="country_code">
                                    <label for="phone" class="col-form-label">@lang('Mobile Number')</label>
                                    <input type="tel" class="form-control pranto-control" id="phone" name="mobile"
                                           value="{{$user->mobile}}" placeholder="@lang('Your Contact Number')"
                                           readonly>
                                </div>
                                <input type="hidden" name="country" id="country" class="form-control d-none"
                                       value="{{@$user->address->country}}">

                                <div class="form-group col-sm-6">
                                    <label for="date_of_birth" class="col-form-label">@lang('Date of birth'):</label>
                                    <input type="text" class="form-control flatpickr_dob" id="date_of_birth" name="date_of_birth"
                                           placeholder="@lang('DD-MM-YYYY')" value="{{ date('d-m-Y', strtotime($user->date_of_birth ))}}" required>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label for="race" class="col-form-label">@lang('Race'):</label>
                                    <select name="race"  id="race"  class="form-control" required>
                                        <option value=""></option>
                                        <option value="White" <?php echo ($user->race == 'White') ? 'selected' : '';  ?>>White (not of Hispanic origin)</option>
                                        <option value="Black" <?php echo ($user->race == 'Black') ? 'selected' : '';  ?>>Black (not of Hispanic origin)</option>
                                        <option value="Hispanic or Latino" <?php echo ($user->race == 'Hispanic or Latino') ? 'selected' : '';  ?>>Hispanic or Latino</option>
                                        <option value="Asian" <?php echo ($user->race == 'Asian') ? 'selected' : '';  ?>>Asian</option>
                                        <option value="American Indian or Alaska Native" <?php echo ($user->race == 'American Indian or Alaska Native') ? 'selected' : '';  ?>>American Indian or Alaska Native</option>
                                        <option value="Native Hawaiian or Pacific Islander" <?php echo ($user->race == 'Native Hawaiian or Pacific Islander') ? 'selected' : '';  ?>>Native Hawaiian or Pacific Islander</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label for="address" class="col-form-label">@lang('Address'):</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                           placeholder="@lang('Address')" value="{{@$user->address->address}}" required>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label for="state" class="col-form-label">@lang('Country'):</label>
                                    <select id="country-dd"  name="country" class="form-control" required>
                                        
                                        @foreach($countries as $data)
                                        <option value="{{$data->id}}" @if(@$user->address->country == $data->id) Selected @endif>
                                            {{$data->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                    <!-- <input type="text" class="form-control" id="state" name="state"
                                           placeholder="@lang('state')" value="{{@$user->address->state}}" required> -->
                                </div>

                                <div class="form-group col-sm-3">
                                    <label for="state" class="col-form-label">@lang('State'):</label>
                                    <select id="state-dd"  name="state" class="form-control" required>
                                        @foreach($State as $data)
                                        <option value="{{@$user->address->state}}" @if(@$user->address->state == $data->id) Selected @endif>{{@$data->name}}</option>
                                        @endforeach
                                    </select>
                                    <!-- <input type="text" class="form-control" id="state" name="state"
                                           placeholder="@lang('state')" value="{{@$user->address->state}}" required> -->
                                </div>

                                <div class="form-group col-sm-3">
                                    <label for="city" class="col-form-label">@lang('City'):</label>
                                    <select id="city-dd" name="city" class="form-control" required>
                                        @foreach($City as $data)
                                        <option value="{{@$user->address->city}}" @if(@$user->address->city == $data->id) Selected @endif>{{@$data->name}}</option>
                                        @endforeach
                                    </select>
                                    <!-- <input type="text" class="form-control" id="city" name="city"
                                           placeholder="@lang('City')" value="{{@$user->address->city}}" required> -->
                                </div>

                                <div class="form-group col-sm-3">
                                    <label for="zip" class="col-form-label">@lang('Zip Code'):</label>
                                    <input type="text" class="form-control" id="zip" name="zip"
                                           placeholder="@lang('Zip Code')" value="{{@$user->address->zip}}" required>
                                </div>

                                <div class="form-group col-sm-3">
                                    <label for="city" class="col-form-label">@lang('Gender'):</label>
                                    <select class="form-control" name="gender">
                                        <option>-- Select Gender --</option>
                                        <option value="male" @if($user->gender == 'male') selected @endif>Male</option>
                                        <option value="female" @if($user->gender == 'female') selected @endif>Female</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12">
                                    <button type="submit"
                                            class="btn--primary border--rounded text-white btn-block p-2">@lang('Submit')</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#country-dd').on('change', function () {
                var idCountry = this.value;

                $("#state-dd").html('');
                $.ajax({
                    url: "{{url('fetch-states-profile')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state-dd').html('<option value="">Select State</option>');
                        $.each(result.states, function (key, value) {
                            $("#state-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city-dd').html('<option name="city" value="">Select City</option>');
                    }
                });
            });
            $('#state-dd').on('change', function () {
                var idState = this.value;
                $("#city-dd").html('');
                $.ajax({
                    url: "{{url('fetch-cities-profile')}}",
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
    </script>
@endsection
