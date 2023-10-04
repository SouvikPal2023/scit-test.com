@extends($activeTemplate.'layouts.homeMaster')

@section('content')


    <!-- inner-banner -->
    <section class="section breadcrumb-wrapper">
        <div class="shell">
            <h2>Contact us</h2>
        </div>
    </section>
    <!-- inner-banner end -->


    <section class="inner_page_wrap about_inner_pg_wrap sec-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-12">
                    <div class="form-sec form_bg" id="my_form">
                    
                        <form class="rd-mailform1" method="post" action="{{route('contactUs')}}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Your Name*">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" name="subject" class="form-control" placeholder="Subject">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" name="email" class="form-control" placeholder="Email Address*">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" placeholder="Message*"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button class="contact_submit_btn" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12">
                    <div class="contact-item">
                        <div class="content">
                            <h5>Address : </h5>
                            <p>{!! $general->contact_loc !!}</p>
                        </div>
                        <span class="icon"><i class="fa fa-rocket"></i></span>
                    </div>
                    <div class="contact-item">
                        <div class="content">
                            <h5>Call Us :</h5>
                            <p><a href="tel:0411606649">{{ $general->contact_phone }}</a></p>
                        </div>
                        <span class="icon"><i class="fa fa-volume-control-phone"></i></span>
                    </div>
                    <div class="contact-item">
                        <div class="content">
                            <h5>Mail Us :</h5>
                            <p><a href="mailto:webmaster@scit-test.com">
                            {{ $general->contact_email }}</a>
                            </p>
                        </div>
                        <span class="icon"><i class="fa fa-envelope-open-o"></i></span>
                    </div>
                    <div class="map_section">
                    {!! $general->contact_map !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endsection