@extends($activeTemplate.'layouts.homeMaster')

@section('content')
  
  <!--banner sec-->
    <section class="banner d-none d-lg-block d-md-block d-sm-none">
        <div class="banner-grid">
            <div class="banner-content">
                <h4>Welcome to</h4>
                <h3>SCIT</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                <a href="#">Contact Us</a>
            </div>
            <div class="banner-slider">
                <div id="banner-image" class="owl-carousel owl-theme">
                    <div class="item">
                        <img src="{{asset('assetsnew/images/banner1.jpg')}}" alt="">
                    </div>
                    <div class="item">
                        <img src="{{asset('assetsnew/images/banner1.jpg')}}" alt="">
                    </div>
                    <div class="item">
                        <img src="{{asset('assetsnew/images/banner1.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner end -->


    <!--banner sec mobile-->
    <section class="banner d-block d-sm-block d-md-none d-lg-none">
        <div class="banner-grid">
            <div class="banner-slider">
                <div id="banner-imageM" class="owl-carousel owl-theme">
                    <div class="item">
                        <img src="{{asset('assetsnew/images/banner1.jpg')}}" alt="">
                    </div>
                    <div class="item">
                        <img src="{{asset('assetsnew/images/banner1.jpg')}}" alt="">
                    </div>
                    <div class="item">
                        <img src="{{asset('assetsnew/images/banner1.jpg')}}" alt="">
                    </div>
                </div>
            </div>
            <div class="banner-content">
                <h4>Welcome to</h4>
                <h3>SCIT</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                <a href="#">Contact Us</a>
            </div>
    </section>
    <!-- banner end -->

    <!-- introduction -->
    <section class="intro">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="intro-video">
                        <iframe width="100%" height="300" src="https://www.youtube.com/embed/CiNh3LSChe0"
                            title="Our Owl Rafting Adventure" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="intro-content">
                        <p>If you are unsure of what the SCIT is intended for, or unsure that the SCIT is right for you,
                            please watch the video provided above. The SCIT itself contains images and material that
                            some people may find offensive: since it is intended to survey a wide range of attitudes and
                            behaviours, this is unavoidable.

                            By entering the site, you agree that you are of the legal age necessary to provide suitable
                            consent in your jurisdiction.</p>
                        <a href="{{route('user.login')}}">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- introduction end -->


    <!-- best -->
    <section class="best">
        <div class="container">
            <h3 class="sec-head">Why Take The SCIT?</h3>
            <div class="best-wrap">
                <div class="best-wrap-box">
                    <h4>Testing</h4>
                    <p>Choose the exam category based on your subject. This helps you typically differentiate between
                        subjects that are essential for studying a particular course and subjects.</p>
                </div>
                <div class="best-wrap-box">
                    <h4>Divorce</h4>
                    <p>Divorce advice</p>
                </div>
                <div class="best-wrap-box">
                    <h4>Attend The Examination</h4>
                    <p>On a good thing, Here you can give an online exam that is required based on your preferable
                        subject. This is too easy, you just need to register and get ready for the exam.</p>
                </div>
                <div class="best-wrap-box">
                    <h4>Get Your Result Fast</h4>
                    <p>After finished your examination, you can get your result very easily. Go to your dashboard and
                        see the result of the examination you attend. Isn't so easy!</p>
                </div>
            </div>
        </div>
    </section>
    <!-- best-end -->

    <!-- faq-testimonial -->
    <section class="faq-testimonial">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="sec-head text-left">Testimonials</h3>
                    <div id="testimonial-slider" class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="q-icon">
                                <img src="{{asset('assetsnew/images/q1.png')}}" alt="">
                            </div>
                            <p>I used to be very bored - but now he won't leave me alone!
                                He's insatiable... but then again, so am I now!" <br><br> <span>-Seka Lovelace</span>
                            </p>
                        </div>
                        <div class="item">
                            <div class="q-icon">
                                <img src="{{asset('assetsnew/images/q1.png')}}" alt="">
                            </div>
                            <p>I used to be very bored - but now he won't leave me alone!
                                He's insatiable... but then again, so am I now!" <br><br> <span>-Seka Lovelace</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3 class="sec-head text-left">Frequently Asked Questions</h3>

                    <div class="accordion" id="accordionExample">
                        <div class="communication-accordian">
                            <div class="card">
                                <div class="card-header" id="heading1">
                                    <h2 class="mb-0">
                                        <button type="button" class="btn btn-link" data-toggle="collapse"
                                            data-target="#collapse1" aria-expanded="true"><i
                                                class="fa fa-minus"></i>What happens with my data?</button>
                                    </h2>
                                </div>
                                <div id="collapse1" class="collapse show" aria-labelledby="heading1"
                                    data-parent="#accordionExample" style="">
                                    <div class="card-body">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading2">
                                    <h2 class="mb-0">
                                        <button type="button" class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapse2" aria-expanded="false"><i class="fa fa-plus"></i>How
                                            confidential is my data?</button>
                                    </h2>
                                </div>
                                <div id="collapse2" class="collapse" aria-labelledby="heading2"
                                    data-parent="#accordionExample" style="">
                                    <div class="card-body">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                            cillum dolore eu fugiat nulla pariatur.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading3">
                                    <h2 class="mb-0">
                                        <button type="button" class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapse3" aria-expanded="false"><i class="fa fa-plus"></i>How
                                            scientific/accurate are the results?</button>
                                    </h2>
                                </div>
                                <div id="collapse3" class="collapse" aria-labelledby="heading3"
                                    data-parent="#accordionExample" style="">
                                    <div class="card-body">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat. Duis aute irure dolor in
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading4">
                                    <h2 class="mb-0">
                                        <button type="button" class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapse4" aria-expanded="false"><i
                                                class="fa fa-plus"></i>What is a percentile score?</button>
                                    </h2>
                                </div>
                                <div id="collapse4" class="collapse" aria-labelledby="heading4"
                                    data-parent="#accordionExample" style="">
                                    <div class="card-body">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                            cillum dolore eu fugiat nulla.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading5">
                                    <h2 class="mb-0">
                                        <button type="button" class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapse5" aria-expanded="false"><i class="fa fa-plus"></i>Why
                                            can I only complete the SCIT no </br> more than once every three
                                            months?</button>
                                    </h2>
                                </div>
                                <div id="collapse5" class="collapse" aria-labelledby="heading5"
                                    data-parent="#accordionExample" style="">
                                    <div class="card-body">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                                            non
                                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                                            non
                                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- appointment -->
<section class="appointment contact-us">
          <div class="container">
              <h3 class="sec-head">Drop Us a Line</h3>
            <div class="form-sec" id="my_form">
              <form class="rd-mailform1">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Name">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Service">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="tel" class="form-control" placeholder="Phone No.">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="email" class="form-control" placeholder="Email">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <div class="form-group">
                      <textarea class="form-control" placeholder="Message*"></textarea>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <button class="read-more contact_submit_btn" type="submit">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </section>
<!-- appointment-end -->


   
    @endsection