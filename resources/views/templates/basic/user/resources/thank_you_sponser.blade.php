@extends($activeTemplate.'layouts.master')
@section('content')
<div class="transaction-area mt-30">
    <div class="row justify-content-center mb-30-none">
        <div class="col-xl-12 col-md-12 col-sm-12 mb-30">
            <div class="panel-table-area">
                <div class="panel-table border-0">
                    <?php echo $thank_you_sponser->content ?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection