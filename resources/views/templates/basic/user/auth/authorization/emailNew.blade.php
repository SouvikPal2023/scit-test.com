@extends('templates.basic.layouts.authNew')
@section('content')

@php

    $bg = getContent('login.content',true);

@endphp
<section class="login-page-form">
    <div class="container">
        <div class="row login-wrap align-items-center">

            <div class="col-md-7 p-0">
                <div class="login-page" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle">
                    <div class="login-page-box" role="document">
                        <div class="modal-content login">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    <a href="{{url('/')}}"> <img src="{{asset('assetsnew/images/logo.png')}}"
                                            alt=""></a>
                                </h5>
                            </div>
                            <div class="modal-body">
                                <ul class="heading" role="tablist">
                                    <li class="nav-item">
                                        <h4>@lang('Email Verification')</h4>

                                    </li>
                                </ul><!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                        <div class="form-sec" id="my_form">
                                            <form class="rd-mailform1" action="{{route('user.verify_email')}}"
                                                method="POST">
                                                @csrf
                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <p class="text-center reg-email">@lang('Your Email'):
                                                                <strong>{{auth()->user()->email}}</strong></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="Verification Code "
                                                                name="email_verified_code" required>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="text-center">
                                                    <button class="contact_submit_btn" type="submit">@lang('Verify
                                                        Code')</button>

                                                </div>
                                                <div class="col-md-12">
                                                        <div class="form-group">

                                                        <div class="checkbox-item">

                                                            <label>@lang('Please check including your Junk/Spam Folder.
                                                                if not found, you can') <a
                                                                    href="{{route('user.send_verify_code')}}?type=email"
                                                                    class="forget-pass"> @lang('Resend
                                                                    code')</a></label>



                                                        </div>

                                                        @if ($errors->has('resend'))

                                                        <small
                                                            class="text-danger">{{ $errors->first('resend') }}</small>

                                                        @endif

                                                    </div>

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


@endsection