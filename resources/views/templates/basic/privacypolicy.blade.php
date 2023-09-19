@extends($activeTemplate.'layouts.frontend')

@section('content')

@php
    $privacypolicys = getContent('privacypolicy.content',true)->data_values
@endphp
@include($activeTemplate.'partials.breadcrumb')

<section class="subject-section ptb-80">
    <div class="container">
        <div class="row justify-content-center mb-30-none">
            @forelse ($privacypolicys as $pp)
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-30">
                <div class="subject-item section--bg">
                    <div class="subject-content">
                        <h3 class="title">{{__($pp->heading)}}</h3>
                        <p>{{$pp->details}}</p>
                      
                    </div>

                </div>
            </div>
            @empty
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-30">
                <div class="subject-item section--bg text-white">
                    @lang('No Subjects')
                </div>
            </div>
            @endforelse

        </div>
    </div>
</section>
@endsection