@extends('templates.basic.layouts.authNew')
@section('content')


<section class="login-page-form">
    <div class="container">
        <div class="row login-wrap align-items-center">

            <div class="col-md-7 p-0">
                <div class="login-page" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle">
                    <div class="login-page-box" role="document">
                        <div class="modal-content login">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                <a href="{{url('/')}}">  <img src="{{asset('assetsnew/images/logo.png')}}" alt=""></a>
                                </h5>
                            </div>
                            <div class="modal-body">
                                <ul class="heading" role="tablist">
                                    <li class="nav-item">
                                        <h4>@lang('Login')</h4>
                                        <p>@lang('Don\'t Have An Account') ?<a href="{{route('user.register')}}">@lang(' Register Now')</a></p>
                                    </li>
                                </ul><!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                        <div class="form-sec" id="my_form">
                                            <form class="rd-mailform1" action="{{route('user.login')}}" method="POST" onsubmit="return submitUserForm();">
                                            @csrf
                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="Email or Phone Number" name="username" value="{{old('username')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="password" class="form-control"
                                                                placeholder="*Password" name="password">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="text-left">
                                                    <button class="contact_submit_btn" type="submit">@lang('Login Now')</button>
                                                    <a href="{{route('user.password.request')}}"> @lang('Forgot Password') ?</a>
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