@extends($activeTemplate.'layouts.homeMaster')

@section('content')
  <!-- inner-banner -->
  <section class="section breadcrumb-wrapper">
        <div class="shell">
            <h2>{{$page_title}}</h2>
        </div>
    </section>
    <!-- inner-banner end -->


    <section class="featured-service">
        <div class="container">
            <div class="row">
            @foreach ($blogElements as $el)
                <div class="col-md-6 col-sm-12 col-lg-4 col-xl-4">
                    <div class="service-box">
                        <div class="service-box-img">
                            <img src="{{getImage('assets/images/frontend/blog/thumb_'.$el->data_values->cover_image,'360x250')}}">
                        </div>
                        <div class="service-box-content text-center">
                            <h3>{{__(shortDescription($el->data_values->title,40))}}</h3>
                            <h4><i class="fa fa-calendar" aria-hidden="true"></i>  {{showDateTime($el->created_at,'d M')}}</h4>
                            <a href="{{route('blog.details',[$el->id,slug($el->data_values->title)])}}" class="custom-btn">@lang('Read More') <i class="las la-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
               
                @endforeach

            </div>
            <div class="mt-5">
            {{paginateLinks($blogElements,'')}}
        </div>
        </div>
    </section>

@endsection