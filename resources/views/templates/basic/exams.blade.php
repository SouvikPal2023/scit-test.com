@extends($activeTemplate.'layouts.frontend')

@section('content')
@include($activeTemplate.'partials.breadcrumb')

<section class="exam-section ptb-80">
    <div class="container">
        <div class="row justify-content-center mb-30-none">
            <div class="col-xl-9 mb-30">
                <div class="exam-item-area">
                    <div class="row justify-content-center mb-30-none">
                        
                        @forelse ($exams as $exam)
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-30">
                            <div class="exam-item">
                                <div class="exam-thumb">
                                   <a href="{{route('exam.details',$exam->id)}}" class="d-block">
                                       <div id="carouselExampleControls" class="carousel slide avatar-preview" data-interval="3000" data-ride="carousel">
                                           <div class="carousel-inner profilePicPreview">
                                               <?php $i =1 ?>
                                               @foreach($exam->examimages as $image)
                                                   <div class=" carousel-item @if($i ==1)active @endif">
                                                       <img src="{{url(getImage('assets/images/exam/'.$image->image,'850x560') )}}" class="d-block w-100" alt="">
                                                   </div> <?php $i++ ?>
                                               @endforeach
                                           </div>
                                           <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                               <span class="sr-only">Previous</span>
                                           </a>
                                           <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                               <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                               <span class="sr-only">Next</span>
                                           </a>
                                       </div>
                                   </a>
                                </div>
                                <div class="exam-content">
                                    <h3 class="title"><a href="{{route('exam.details',$exam->id)}}">{{$exam->title}}</a></h3>
                                    <ul class="exam-list">
                                        <li>@lang('Question') : {{$exam->questions->count()}}</li>
                                        
                                    </ul>
                                    <div class="exam-btn mt-10">
                                        @if ($exam->last_result)
                                             @php
                                                $year_date = date("d-m-Y",strtotime(date("Y-m-d", strtotime($exam->last_result->created_at)) . " + 364 day"));
                                            @endphp
                                            <button data-resultdate="{{$year_date}}"  class="btn--success border--rounded text-white p-1 d-block ExamPerticipated w-100">@lang('Re-participate')</button>
                                        @else
                                            <button class="btn--success border--rounded text-white p-1 d-block w-100">@lang('Participated')</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                            <h2> @lang('No Exams')</h2>
                        </div>
                        @endforelse
                    </div>
                    <nav class="d-flex justify-content-center mt-3">
                        {{paginateLinks($exams,'')}}
                    </nav>
                </div>
            </div>
            <div class="col-xl-3 mb-30">
                <div class="sidebar">
                    <div class="widget-box mb-30">
                        <h5 class="widget-title">@lang('All Factor')</h5>
                        <ul class="category-content">
                            @foreach ($categories as $item)
                             <li><a href="{{route('category.subjects',$item->slug)}}">{{$item->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
