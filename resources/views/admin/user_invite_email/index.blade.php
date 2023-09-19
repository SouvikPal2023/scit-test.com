@extends('admin.layouts.app')

@section('panel')

    <div class="row">

        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-body">
                    <form action="{{ route('admin.email.userinvite.send') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label class="font-weight-bold">@lang('To') <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-lg" placeholder="@lang('Enter Email address.')" name="email" value="" required/>
                                <small>Note: add mutiple Mail address separated by , (coma).Ex: abc@scit.com,xyz@scit.com</small>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="font-weight-bold">@lang('Subject') <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="@lang('Email subject')" name="subject"  required/>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="font-weight-bold">@lang('Message') <span class="text-danger">*</span></label>
                                <textarea name="message" rows="10" class="form-control nicEdit" placeholder="@lang('Your message')"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-block btn--primary mr-2">@lang('Update')</button>
                    </form>
                </div>
            </div><!-- card end -->
        </div>
    </div>

@endsection

@push('script')
<script>
    $(document).ready(function(){
        console.log('hdihdi')
        $('.nicEdit-main').html('<p style="margin:5px;font-weight: 600;">Your friend has invited you to examine an online test called "The Sexual Compatibility and Intimacy Test", or the "SCIT". Press the "Take a look" button and see if the test is right for you.</p><div style="display:flex;justify-content: center;margin: 15px;"><button style="background-color: blue;color:white;"><a href="https://scit2.sataware.dev/" target="_blank" style="text-decoration: underline;cursor: pointer;color: white;font-weight: bold;">Take a Look</a></button></div>');
    })
</script>
@endpush
