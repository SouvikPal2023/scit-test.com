@php
    $content = getContent('howsitsworks.content',true)->data_values;
    $elements = getContent('howsitsworks.element',false,5,true);
@endphp

<section class="howsitswork-section ptb-80">
    <div class="container">
        
        <div class="row justify-content-center mb-30-none">
            <div class="col-xl-10 mb-30">
                <div class="faq-wrapper text-justify">
                    @foreach ($elements as $el)
                        <p>@lang($el->data_values->description)</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>  