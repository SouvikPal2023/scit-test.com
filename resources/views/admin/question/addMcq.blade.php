@extends('admin.layouts.app')
<style type="text/css">
    .op .image-upload .thumb .avatar-edit label {
        text-align: center;
        line-height: 37px;
        font-size: 14px;
        cursor: pointer;
        padding: 2px 21px;
        max-width: 40%;
        border-radius: 5px;
        box-shadow: 0 5px 10px 0 rgb(0 0 0 / 16%);
        transition: all 0.3s;
        width: 100%;
    }
    .op.mt-3 {
        padding: 20px 20px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .op label.font-weight-bold {
        background-color: #7367f0 !important;
        color: #fff;
        padding: 5px 20px;
        border-radius: 3px;
    }
    input.unique_id {
        padding: 8px 5px !important;
        width: 70px;
        font-weight: 700;
        text-align: center;
    }
</style>
@section('panel')
<div class="container-fluid">
    <form action="{{route('admin.exam.question.store')}}" method="POST" enctype="multipart/form-data">
        @csrf 
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card b-radius--10 p-4">
                    <div class="card-body">
                        <div class="form-group">
                          <label class="font-weight-bold">@lang('Index NO.') &nbsp; : &nbsp;
                          <input type="text" name="unique_id" value=""  class="unique_id"> </label>
                        </div> 
                        <div class="form-group">
                            <div class="image-upload" >
                                <div class="thumb" style="margin: 0 auto;">
                                    <div class="avatar-preview">
                                        <div class="profilePicPreview new-box" style="background-image: url({{ getImage('','300x200') }}); background-position: center; margin: 0 auto;">
                                            <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                    <div class="avatar-edit">
                                        <input type="file" class="profilePicUpload" name="image[]" id="profilePicUpload1" accept=".png, .jpg, .jpeg" multiple>
                                        <label for="profilePicUpload1" class="bg--success">@lang('Upload Image')</label>
                                        <small class="mt-2 text-facebook">@lang('Supported files'): <b>@lang('jpeg'), @lang('jpg').</b> @lang('Image will be resized into 850x560px') </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="examid" value="{{$exam->id}}">
                        <label class="font-weight-bold">@lang('Factor')</label>
                        <select class="form-control select2" multiple id="category" name="categorymain[]">
                            @foreach($categories as $row)
                            <option value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                        </select>
                        <!-- <div class="form-group">
                              <label class="font-weight-bold">@lang('Index')</label>
                              <input type="number" name="order" class="form-control">
                        </div> -->
                        <div class="form-group">
                              <label class="font-weight-bold">@lang('Question')</label>
                              <textarea class="form-control nicEdit"  name="question" rows="6" placeholder="@lang('Question')">{{old('question')}}</textarea>
                        </div>
                        <!-- <div class="form-group">
                          <label class="font-weight-bold">@lang('Mark')</label>
                          <input class="form-control" type="text" name="mark" placeholder="@lang('Mark')" value="{{old('mark')}}" >
                        </div> -->
                        <div class="form-group">
                            <label class="font-weight-bold">@lang('Question Type')</label>
                            <select class="form-control bydefult-select" id="clickoption" name="choosecategory">
                                <option value="1">@lang('Likert')</option>
                                <option value="2">@lang('Radio Button')</option>
                                <option value="3">@lang('True or False')</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold d-flex align-items-center"><input class="mr-2"  type="checkbox" id="reverse" name="reverse" value="1">@lang('Reverse')
                            </label>
                        </div>

                        <div class="form-group">
                            <div id="true-false-row">
                                <div class="custom-control custom-radio form-check-primary d-flex align-items-center">
                                    @foreach($scores as $score)
                                        @if($score->scorecategory == 3 )
                                            <div class="op">
                                                <div class="w-20 mt-2">
                                                    <!-- <label class="font-weight-bold">{{$score->scorevalue}}</label> -->
                                                    <input  type="hidden" name="option_type_{{$score->scorecategory}}[]" class="custom-control-input mt-1"  value="{{$score->scorenumber}}">
                                                    <input  type="hidden" name="option_type_score_{{$score->scorecategory}}[]" class="custom-control-input mt-1"  value="{{$score->scorevalue}}">
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>   

                        <div id="hidefullmain">
                            <label class="font-weight-bold" for="exampleInputnumber1">@lang('Options')</label>
                            <?php $i = 0; ?>
                            @foreach($scores as $key => $score)
                                @if($score->scorecategory == 1 )
                                    <div class="op mt-3">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <label class="font-weight-bold">{{$score->scorevalue}}</label>
                                            </div>
                                        </div>
                                        <div class="image-upload">
                                            <div class="thumb" >
                                                <div class="avatar-preview">
                                                    <div class="profilePicPreview new-box"  style="background-image: url({{ getImage('','640x310') }}); background-position: center;">
                                                        <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                                    </div>
                                                </div>
                                                <div class="avatar-edit">
                                                    <input data-key="{{$key}}" type="file" name="option_type_image_{{$score->scorecategory}}[{{$i}}][]" class="profilePicUpload form-control pt-1 mcqimage-upload" id="profilePicUploadmcqimage{{$key}}"  accept=".png, .jpg, .jpeg" style="height: 0;" multiple>
                                                    <label for="profilePicUploadmcqimage{{$key}}" class="bg--success">@lang('Upload Image')</label>
                                                </div>
                                            </div>
                                            <div id="result-mcqimage-{{$key}}"></div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group  mt-2">
                                                <input  type="hidden" name="option_type_{{$score->scorecategory}}[]" class="custom-control-input mt-1"  value="{{$score->scorenumber}}">
                                                <input type="hidden" class="form-control mr-1 " name="option_type_score_{{$score->scorecategory}}[]" value="{{$score->scorevalue}}" placeholder="@lang('Option')" readonly>
                                                <input  type="hidden" name="option_type_score_id_{{$score->scorecategory}}[]" class="custom-control-input mt-1"  value="{{$score->id}}">
                                            </div>
                                        </div>
                                    </div>
                                    <?php $i++ ?>
                                @endif
                            @endforeach
                        </div>
                        
                        <div id="optionimageremove">
                            <label class="font-weight-bold" for="exampleInputnumber1">@lang('Options')</label>
                            @foreach($scores as $score)
                                @if($score->scorecategory == 2 )
                                <div class="op mt-2">
                                    <div class="form-group  d-flex justify-content-between">
                                        <div class="input-group">
                                            <label class="font-weight-bold">{{$score->scorevalue}}</label>
                                            <input type="hidden" name="option_type_{{$score->scorecategory}}[]" class="custom-control-input mt-1"  value="{{$score->scorenumber}}">
                                            <input type="hidden" class="form-control mr-1" name="option_type_score_{{$score->scorecategory}}[]" value="{{$score->scorevalue}}" placeholder="@lang('Option')" readonly>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>   
                        <div class="card-footer py-4">
                            <button type="submit" class="btn btn--primary btn-block">@lang('Submit')</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
   <!-- card end -->
@endsection
@push('breadcrumb-plugins')
    <a class="btn btn--primary" href="{{route('admin.exam.questions',$exam->id)}}"><i class="las la-backward"></i> @lang('Go Back')</a>
@endpush
@push('script')
<script>
    'use strict'
        var i = 22;
        var j = 2;
        var a = <?php echo rand(99,99999999) ?>;
        var b = <?php echo rand(99,99999999) ?>;
         $(document).on('click', '#add1', function () {
            var element = `
                <div class="image-upload thumb"> 
                    <div class="form-group d-flex justify-content-between">
                        <div class="input-group">
                               {{-- <div class="input-group-prepend">
                                    <span class="input-group-text bg-transparent" id="my-addon">
                                        <div class="custom-control custom-radio form-check-primary d-flex align-items-center">
                                            <input type="radio" id="customRadio${a}" name="correct" class="custom-control-input" value="${b}" >
                                            <label class="custom-control-label text-secondary" for="customRadio${a}">@lang('Correct')</label>
                                          </div>
                                    </span>
                                </div> --}}
                                <input type="text" class="form-control mr-1" name="optionseconde[${j}]" placeholder="@lang('Option')">
                             </div>
                        <button type="button" class="icon-btn btn--danger  text-center text-nowrap remove"><i class="las la-minus-circle"></i></button>
                    </div>
                </div>`;
            $('.append1').append(element);
            i++
            j++
        })
        $(document).on('click', '.remove1', function () {
            $(this).parent(".form-group").prev().remove();
            $(this).parent('.form-group').remove()
        });
        $(document).on('click', '#add', function () {
        var element = `
            <div class="image-upload thumb">
                <div class="thumb" >
                    <div class="avatar-preview">
                        <div class="profilePicPreview new-box" style="background-image: url({{ getImage('','640x310') }}); background-position: center;">
                            <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                </div>
                <div class="form-group d-flex justify-content-between">
                    <div class="input-group">
                          {{--  <div class="input-group-prepend">
                                <span class="input-group-text bg-transparent" id="my-addon">
                                    <div class="custom-control custom-radio form-check-primary d-flex align-items-center">
                                        <input type="radio" id="customRadio${i}" name="correct" class="custom-control-input" value="${j}" >
                                        <label class="custom-control-label text-secondary" for="customRadio${i}">@lang('Correct')</label>
                                      </div>
                                </span>
                            </div> --}}
                            <input type="text" class="form-control mr-1" name="option[${j}]" placeholder="@lang('Option')"  >
                            <input type="file" name="mcqimage[${j}][]"  class="profilePicUpload form-control pt-1 pr-1" style="opacity:1" id="profilePicUpload1" accept=".png, .jpg, .jpeg" mutiple>
                         </div>
                    <button type="button" class="icon-btn btn--danger  text-center text-nowrap remove"><i class="las la-minus-circle"></i></button>
                </div>
            </div>`;
        $('.append').append(element);
        i++
        j++
      })
      $(document).on('click', '.remove', function () {
          $(this).parent(".form-group").prev().remove();
          $(this).parent('.form-group').remove();
      })
    function removeImg(img_id){
        let Ans =  confirm("Are you sure you want to delete this Image?");
        if(Ans == true) {
            $.ajax({
                url: "{{route('admin.exam.imgRemove')}}",
                type: "POST",
                data: {
                    _token: "{{csrf_token()}}",
                    id: img_id
                },
                success: function (data) {
                    $(".notifymsg").html(data);
                    location.reload();
                }
            })
        }
    }
    $(function () {
        $("#clickoption").change(function () {
            if ($(this).val() == "1") {
                $("#hidefullmain").show();
                $("#true-false-row").hide();
                $("#optionimageremove").hide();
            }
            else if ($(this).val() == "2") {
                $("#true-false-row").hide();
                $("#optionimageremove").show();
                $("#hidefullmain").hide();
            }
            else if ($(this).val() == "3") {
                $("#true-false-row").show();
                $("#hidefullmain").hide();
                $("#optionimageremove").hide();
            }
        });
    });
    $(document).ready(function(){
        jQuery(".bydefult-select option:first").attr("selected", true);
            $( "select option:selected").each(function(){
                //enter bengal districts
                if($(this).attr("value")=="1"){
                    $("#hidefullmain").show();
                    $("#true-false-row").hide();
                    $("#optionimageremove").hide();
                }
                //enter other states
                else if($(this).attr("value")=="2"){
                    $("#true-false-row").hide();
                    $("#optionimageremove").show();
                    $("#hidefullmain").hide();
                }
                else if($(this).attr("value")=="3"){
                   $("#true-false-row").show();
                   $("#hidefullmain").hide();
                   $("#optionimageremove").hide();
                }
            });
    }); 
</script>
@endpush