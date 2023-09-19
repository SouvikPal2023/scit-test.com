@extends($activeTemplate.'layouts.frontend')



@section('content')

@include($activeTemplate.'partials.breadcrumb')
	<section class="exam-section ptb-80">

	    <div class="container">

	        <div class="row justify-content-center mb-30-none">

	            <div class="col-xl-10 mb-30">

	                <div class="faq-wrapper">
	                	
	                    @foreach (json_decode($about,true) as $el)
	                    	{!! $el['data_values']['description'] !!}
	                    @endforeach

	                </div>

	            </div>

	        </div>

	    </div>

	</section>


@endsection