@extends($activeTemplate.'layouts.masterNew')
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
@section('content')
<div class="transaction-area mt-30">
    <div class="row justify-content-center mb-30-none">
        <div class="col-xl-12 col-md-12 col-sm-12 mb-30">
            <div class="panel-table-area">
                <div class="panel-table border-0">
                    <div class="linksParentContainer" >
                        <div class="linkContainer">
                            <a href="{{route('user.exam.mcq.history')}}">
                                <i class="fas fa-tasks"></i>
                                <span class="title">@lang('MCQ Test History')</span>
                            </a>
                        </div>
                        <div class="linkContainer">
                            <a href="{{route('user.exam.written.history')}}">
                                <i class="fas fa-pen-fancy"></i>
                                <span class="title">@lang('Written Test History')</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection