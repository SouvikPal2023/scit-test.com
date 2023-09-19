@extends($activeTemplate.'layouts.master')
@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-body">
                    <form action="{{ route('user.email.userinvite.send') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label class="font-weight-bold">@lang('Email Sent To') <span class="text-danger">*</span></label>
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
                            <div class="ok">

                            </div>
                        </div>
                        <button type="submit" class="btn btn-block btn--primary mr-2 text-white">@lang('Update')</button>
                    </form>
                </div>
            </div><!-- card end -->
        </div>
    </div>
@endsection
@push('style')
	<link rel="stylesheet" href="https://exam.webtech-evolution.com/assets/admin/css/vendor/nice-select.css">
	<style>

		.nicEdit-main{
			width: 99% !important;
		}
		.nicEdit-main:focus-visible {
		    outline: unset !important;
		}
		.nicEdit-selectTxt{
			height: 17px !important;
			margin-top: 0 !important;
		}
	</style>
@endpush

@push('script')
<script>
    $(document).ready(function(){
        console.log('hdihdi')
        $('.nicEdit-main').html(`
            <p style="margin:5px">
                Your friend has invited you to examine an online test called "The Sexual Compatibility and Intimacy Test", or the "SCIT". Press the "Take a look" button and see if the test is right for you.
            </p>
            <br/>
            <div style="display:flex;justify-content: center;">
                <button style="background-color: blue;color:white;">
                    <a href="https://scit2.sataware.dev/" target="_blank" style="text-decoration: underline;cursor: pointer;">
                        Take a Look
                    </a>
                </button>
            </div>
            <br/>
            <p style="margin:5px">
                <b>Your friend's personal message:</b>  
            </p>
        `);
    })
</script>
@endpush