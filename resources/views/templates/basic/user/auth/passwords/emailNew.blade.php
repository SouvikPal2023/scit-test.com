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
                                        <h4>@lang('Reset Password')</h4>
                                      
                                    </li>
                                </ul><!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                        <div class="form-sec" id="my_form">
                                            <form class="rd-mailform1" action="{{route('user.password.email')}}" method="POST">
                                            @csrf
                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="Enter Email" name="email" value="{{old('email')}}">
                                                        </div>
                                                    </div>
                                                   

                                                </div>
                                                <div class="text-left">
                                                    <button class="contact_submit_btn" type="submit">@lang('Send Password Reset Code')</button>
                                                    
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