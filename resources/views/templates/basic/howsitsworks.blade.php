@extends($activeTemplate.'layouts.frontend')


@section('content')

@include($activeTemplate.'partials.breadcrumb')



<section class="exam-section ptb-80">

    <div class="container">

        <div class="row justify-content-center mb-30-none">

            <div class="col-xl-10 mb-30">

                <div class="faq-wrapper text-justify">

                    @foreach ($howsitsworks as $el)

                            <p >@lang($el->data_values->description)</p>


                    @endforeach

                </div>

            </div>

        </div>

    </div>

</section>

@endsection