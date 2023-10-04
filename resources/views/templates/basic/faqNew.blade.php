@extends($activeTemplate.'layouts.homeMaster')

@section('content')


    <!-- inner-banner -->
    <section class="section breadcrumb-wrapper">
        <div class="shell">
            <h2>FAQ</h2>
        </div>
    </section>
    <!-- inner-banner end -->

    <section class="combined-wraper2">
        <div class="container">
            <div class="communication-accordian">
                <div class="accordion" id="accordionExample">
                    @php
                        $i=1;
                    @endphp
                @foreach ($faqs as $el)
                    <div class="card">
                        <div class="card-header" id="heading1">
                            <h2 class="mb-0">
                            <button type="button" class="btn btn-link @if($i!=1) collapsed @endif" data-toggle="collapse"
                                        data-target="#collapse{{$i}}" aria-expanded=" @if($i==1) true @else false @endif">@if($i==1) <i
                                            class="fa fa-minus"></i> @else <i class="fa fa-plus"></i>@endif {{__( $el->data_values->question)}}</button>
                            </h2>
                        </div>
                        <div id="collapse{{$i}}" class="collapse @if($i==1) show @endif" aria-labelledby="heading1"
                            data-parent="#accordionExample" style="">
                            <div class="card-body">
                                <p>
                                @lang($el->data_values->answer)
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
    </section>

    @endsection

</html>