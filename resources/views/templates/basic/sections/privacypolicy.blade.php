@php
    $content = getContent('privacypolicy.content',true)->data_values;
    $elements = getContent('privacypolicy.element',false,3,true);
@endphp

<section class="blog-section ptb-80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="section-header">
                    <h2 class="section-title">{{__($content->heading)}}</h2>
                    <span class="title-border"><i class="fas fa-book-reader"></i></span>
                </div>
            </div>
        </div>
         <div class="col-xl-12 mb-10">
            <p>{!! __($content->description) !!}</p>
        </div>
</section>