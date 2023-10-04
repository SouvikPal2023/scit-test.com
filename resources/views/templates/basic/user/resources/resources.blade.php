@extends($activeTemplate.'layouts.masterNew')
@section('content')
<style>
    .linksParentContainer{
        display: flex;
        justify-content: space-around;
        align-items: space-around;
        flex-wrap: wrap;
    }
    .linkContainer{
        width: 25%;
        height: 100px;
        border: 1px solid blue;
        color: blue;
        margin: 35px;
        border-radius: 15px;
        display: flex;
        justify-content: space-around;
        align-items: center;
    }
</style>
<div class="transaction-area mt-30 dashboard-resource">
    <div class="row justify-content-center mb-30-none">
        <div class="col-xl-12 col-md-12 col-sm-12 mb-30">
            <div class="panel-table-area">
                <div class="panel-table border-0">
                    <div class="linksParentContainer" >
                        <a class="linkContainer" target="_blank" href="{{route('user.resources.news_letter')}}">
                            <div>
                                <i class="fas fa-tasks"></i>
                                <span class="title">@lang('News Letter')</span>
                            </div>
                        </a>
                        <a class="linkContainer" target="_blank" href="{{route('user.resources.announcement')}}">
                            <div>
                                <i class="fas fa-tasks"></i>
                                <span class="title">@lang('Announcement')</span>
                            </div>
                        </a>
                        <a class="linkContainer" target="_blank" href="{{route('user.resources.about_the_app')}}">
                            <div>
                                <i class="fas fa-tasks"></i>
                                <span class="title">@lang('About The App')</span>
                            </div>
                        </a>
                        <a class="linkContainer" target="_blank" href="{{route('user.resources.upcoming_event')}}">
                            <div>
                                <i class="fas fa-tasks"></i>
                                <span class="title">@lang('Upcoming Event')</span>
                            </div>
                        </a>
                        <a class="linkContainer" target="_blank" href="{{route('user.resources.thank_you_sponser')}}">
                            <div>
                                <i class="fas fa-tasks"></i>
                                <span class="title">@lang('Thank You Sponser')</span>
                            </div>
                        </a>
                        <a class="linkContainer" target="_blank" href="{{route('user.resources.health_recommendation')}}">
                            <div>
                                <i class="fas fa-tasks"></i>
                                <span class="title">@lang('Health Recommendation')</span>
                            </div>
                        </a>
                        <a class="linkContainer" target="_blank" href="{{route('user.resources.guideline_of_who')}}">
                            <div>
                                <i class="fas fa-tasks"></i>
                                <span class="title">@lang('Guideline of WHO')</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection