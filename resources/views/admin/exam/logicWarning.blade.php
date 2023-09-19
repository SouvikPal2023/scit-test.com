@extends('admin.layouts.app')
<style>
    .select2 {
        width: 150.078px;
    }
    .extra label{
         font-size: 0.65rem;
    }
    .extra .addaddcomparison1 , .extra .addtextblock, .extra .msgbox{
        width: 25%;
        display: inline-grid;
        position: relative;
    }
    .extra .addOperation, .extra .addlogic {
        width: 8%;       
        display: inline-grid;
        position: relative;
    }
    /*.extra > button:last-child{
        width: 5%;
        display: inline-grid;
    }*/
    .extra{
        border: 2px solid #686565;
        padding: 10px;
        border-radius: 5px;
    }
    .select2-container--default .select2-results__option--disabled {
        cursor: not-allowed;
    }
    .select2-container .select2-selection--single .select2-selection__rendered[title*=" True / False "] {
        font-size: 11px;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        font-size: 11px;
    }
    .error{
        color: red;
    }
    /*.adddiv .form-group.extra >.form-group:nth-child(3) {
        display: flex;
        flex-wrap: wrap;
        height: fit-content;
        height: -moz-fit-content;
        height: -webkit-fit-content;
    }*/
    .adddiv .form-group.extra >.form-group:nth-child(3) .error{ order: 100; position: absolute; bottom: 0;}

    /*.adddiv .form-group.extra:not(.checkboxEnabled) >.form-group.addOperation {
        display: flex;
        flex-wrap: wrap;
        height: fit-content;
        height: -moz-fit-content;
        height: -webkit-fit-content;
    }*/
    .adddiv .form-group.extra >.form-group.addaddcomparison1 .error, .adddiv .form-group.extra >.form-group.addaddcomparison2 .error:nth-child(3),.adddiv .form-group.extra >.form-group.addOperation .error{ order: 100; position: absolute; bottom: -4px; }
    /*.adddiv .form-group.extra:not(.checkboxEnabled) >.form-group.addlogic {
        display: flex ;
        flex-wrap: wrap;
        height: fit-content;
        height: -moz-fit-content;
        height: -webkit-fit-content;
    }*/
    .adddiv .form-group.extra >.form-group.addlogic .error{ order: 100; position: absolute; bottom: -4px; }
    /*.adddiv .form-group.extra:not(.checkboxEnabled) >.form-group.addtextblock {
        display: flex ;
        flex-wrap: wrap;
        height: fit-content;
        height: -moz-fit-content;
        height: -webkit-fit-content;
    }*/
    .adddiv .form-group.extra >.form-group.addtextblock .error:nth-child(3){ order: 100; position: absolute; bottom: 12px; }
    /*.adddiv .form-group.extra:not(.checkboxEnabled) >.form-group.logic {
        display: flex;
        flex-wrap: wrap;
        height: fit-content;
        height: -moz-fit-content;
        height: -webkit-fit-content;
    }*/
    .adddiv .form-group.extra >.form-group.logic .error{ order: 100; position: absolute; bottom: 0; }
    a.Copylogic {
        border: 1px solid #f74e57;
        border-radius: 4px;
        padding: 5px;
        background-color: #f74e57;
        color: #fff;
        font-size: 11px;
    }
    .Copylogic:hover {
        color: #0056b3 !important;
        text-decoration: none !important;
    }
    .select2-container--default .select2-results__option--disabled {
        display: none;
    }
    /*.select2-container--default .select2-selection--single .select2-selection__rendered {
        text-align: center;
    }
    .select2-results__option--selectable {
        text-align: center;
    }*/
</style>
@section('panel')
<div class="container-fluid">
   <div class="row">
        <div class="col-12 col-md-12 text-center mt-5 pt-5">
            <h1 class="text-center">This Test <b>{{ $_GET['exam']}}</b></h1>
            <h3 class="mb-3">Please select factor with group</h3>
            <a href="{{ route('admin.exam.all')}}" title="Back to return All Exams." class="btn btn-primary">Click back to return All Exams.</a>
        </div>
   </div>
</div>
   <!-- card end -->
@endsection
@push('script-lib')
    <script src="{{asset('public/assets/admin/js/datepicker.min.js')}}"></script>
    <script src="{{asset('public/assets/admin/js/datepicker.en.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
@endpush

@push('breadcrumb-plugins')
   <!--  <a class="btn btn--primary" href="{{route('admin.score.all')}}"><i class="las la-backward"></i> @lang('Go Back')</a> -->
@endpush