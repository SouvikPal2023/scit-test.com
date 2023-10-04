@extends($activeTemplate.'layouts.homeMaster')

@section('content')
<!-- inner-banner -->
    <section class="section breadcrumb-wrapper">
        <div class="shell">
            <h2> Blog Details</h2>
        </div>
    </section>
    <!-- inner-banner end -->

    <!-- about -->
    
    <section class="about inner">
        
        <div class="container">
            <div class="about-wrap">
                <img src="{{ getImage('assets/images/frontend/blog/'.$blog->data_values->cover_image,'800x800') }}" alt="">
                <div class="about-wrap-cont">
                    <div class="heading">
                        <h3>{{__($blog->data_values->title)}}</h3>
                        <h4><i class="fa fa-calendar" aria-hidden="true"></i>{{showDateTime($blog->created_at,'d M')}}</h4>
                    </div>
                    <p>
                    @php echo $blog->data_values->body @endphp</p>
                </div>

            </div>
            <div class="share-post-wrap">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p>Share This Post</p>
                    </div>
                    <div class="col-md-6">
                        <ul class="header-contact">
                                <li><a href="https://www.facebook.com/sharer/sharer.php?u={{urlencode(url()->current()) }}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="https://twitter.com/intent/tweet?text=Post and Share &amp;url={{urlencode(url()->current()) }}"
                                   target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{urlencode(url()->current()) }}"
                                   target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection


    