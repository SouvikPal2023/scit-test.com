@extends($activeTemplate.'layouts.homeMaster')

@section('content')

<!--banner sec-->
<section class="banner d-none d-lg-block d-md-block d-sm-none">
    <div class="banner-grid">
        <div class="banner-content">
            <h4>{{$content->banner_heading1}}</h4>
            <h3>{{$content->banner_heading2}}</h3>
            <p>{{ $content->banner_detail }}</p>
            <a href="{{ $content->banner_url }}">{{ $content->banner_button }}</a>
        </div>
        <div class="banner-slider">
            <div id="banner-image" class="owl-carousel owl-theme">
                @foreach($content->banner_id as $id)
                @php
                $banner=App\BannerImage::find($id);

                @endphp
                <div class="item">
                    <img src="{{  isset($banner->banner_image) ? config("app.url").Storage::url($banner->banner_image) :asset('assetsnew/images/banner1.jpg') }}"
                        alt="image" />

                </div>
                @endforeach

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
                @foreach($content->banner_id as $id)
                @php
                $banner=App\BannerImage::find($id);

                @endphp
                <div class="item">
                    <img src="{{  isset($banner->banner_image) ? config("app.url").Storage::url($banner->banner_image) :asset('assetsnew/images/banner1.jpg') }}"
                        alt="image" />
                </div>
                @endforeach

            </div>
        </div>
        <div class="banner-content">
            <h4>{{$content->banner_heading1}}</h4>
            <h3>{{$content->banner_heading2}}</h3>
            <p>{{ $content->banner_detail }}</p>
            <a href="{{url($content->banner_url) }}"> $content->banner_button }}</a>
        </div>
</section>
<!-- banner end -->

<!-- introduction -->
<section class="intro">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="intro-video">
                    {!! $content->youtube !!}
                </div>
            </div>
            <div class="col-md-7">
                <div class="intro-content">
                    {!! $content->youtube_detail !!}
                    <a href="{{url($content->youtube_url)}}">{{$content->youtube_button}}</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- introduction end -->


<!-- best -->
<section class="best">
    <div class="container">
        <h3 class="sec-head">{{$content->why_heading}}</h3>
        <div class="best-wrap">
            <div class="best-wrap-box">
                <h4>{{$content->why_sub_heading1}}</h4>
                <p>{!! $content->why_sub_desc1 !!}</p>
            </div>
            <div class="best-wrap-box">
                <h4>{{$content->why_sub_heading4}}</h4>
                <p>{!! $content->why_sub_desc4!!}</p>
            </div>
            <div class="best-wrap-box">
                <h4>{{$content->why_sub_heading2}}</h4>
                <p>{!! $content->why_sub_desc2 !!}</p>
            </div>
            <div class="best-wrap-box">
                <h4>{{$content->why_sub_heading3}}</h4>
                <p>{!! $content->why_sub_desc3 !!}</p>
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
                <h3 class="sec-head text-left">{{$content->testi_heading}}</h3>
                <div id="testimonial-slider" class="owl-carousel owl-theme">
                    @foreach($content->testimonial_id as $id)
                    @php
                    $testimonial=App\Testimonial::find($id);
                    @endphp
                    <div class="item">
                        <div class="q-icon">
                            <img src="{{asset('assetsnew/images/q1.png')}}" alt="">
                        </div>
                        <p>{!!$testimonial->content!!}<br><br> <span>-{{$testimonial->name}}</span>
                        </p>
                    </div>
                    @endforeach

                </div>
            </div>
            <div class="col-md-6">
                <h3 class="sec-head text-left">{{$content->faq_heading}}</h3>

                <div class="accordion" id="accordionExample">
                    <div class="communication-accordian">
                        @php
                        $i=1;
                        @endphp
                        @foreach($content->testimonial_id as $id)
                        @php
                        $faq=App\Faq::find($id);

                        @endphp
                        <div class="card">
                            <div class="card-header" id="heading1">
                                <h2 class="mb-0">
                                    <button type="button" class="btn btn-link" data-toggle="collapse"
                                        data-target="#collapse{{$i}}" aria-expanded=" @if($i==1) true @else false @endif">@if($i==1) <i
                                            class="fa fa-minus"></i> @else <i class="fa fa-plus"></i>@endif {{$faq->question}}</button>
                                </h2>
                            </div>
                            <div id="collapse{{$i}}" class="collapse @if($i==1) show @endif" aria-labelledby="heading1"
                                data-parent="#accordionExample" style="">
                                <div class="card-body">
                                    <p>
                                        {!! $faq->answer !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @php
                        $i++;
                        @endphp
                        @endforeach

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
            <form class="rd-mailform1" action="{{route('contactUs')}}" method="post" >
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" placeholder="Subject">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="tel" class="form-control" name="phone" placeholder="Phone No.">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email">
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
                <div class="text-center">
                    <button class="read-more contact_submit_btn" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- appointment-end -->



@endsection