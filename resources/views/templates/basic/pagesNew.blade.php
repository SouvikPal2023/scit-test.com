@extends($activeTemplate.'layouts.homeMaster')

@section('content')
<section class="section breadcrumb-wrapper">
    <div class="shell">
        <h2>{{$page_title}}</h2>
    </div>
</section>
<section class="about inner">
    <div class="container">
        <div class="about-wrap">
            <div class="about-wrap-cont">
                @if($sections->secs != null)
                @foreach(json_decode($sections->secs) as $sec)
                @include($activeTemplate.'sections.'.$sec)
                @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
@endsection