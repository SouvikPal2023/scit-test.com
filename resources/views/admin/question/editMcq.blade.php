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

.result-mcqimage > div img {
    max-width: 50px;
    margin-right: 10px;
}

.result-mcqimage > div {
    display: flex;
    align-items: center;
    background: #7367f0 !important;
    border-radius: 5px;
    padding: 5px 6px;
    margin-bottom: 5px;
}

.result-mcqimage > div label {
    color: #fff !important;
    margin-top: 10px;
    font-size: 10px;
}

#hidefullmain .image-upload {
    display: flex;
}

.result-mcqimage{
    width: 60%;
    padding: 0 0 0 20px;
}

.image-uploadd .thumb{
    width: 40%;
}
input.unique_id {
    padding: 8px 5px !important;
    width: 70px;
    font-weight: 700;
    text-align: center; 
}
.image-upload .thumb .profilePicPreview {
    height: 210px !important;
}
body .profilePicPreview.new-box{ width: 100% !important; }
.op .image-upload .thumb .avatar-edit label{  max-width: 100% !important; }
</style>
@section('panel')
    <div class="container-fluid">
        <form action="{{route('admin.exam.question.update',$qtn->id)}}" method="POST" enctype="multipart/form-data" id="testvalidation">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card b-radius--10 p-4">
                        <div class="card-body">
                            <input type="hidden" name="examid" value="{{$exam->id}}">
                            <div class="notifymsg text-center text-primary pb-2"></div>
                            <div class="form-group">
                                <label class="font-weight-bold">@lang('Index NO.') &nbsp; : &nbsp;
                                    <input type="text" name="unique_id" value="{{$qtn->unique_id}}"  id="uniqueid" class="unique_id" >
                                </label>
                                &nbsp; <span id="warning_msg" style="display:none;color:red">Unique id required</span>
                            </div> 
                            <div class="form-group">
                                <div class="image-upload">
                                    <div class="thumb">
                                        <div id="carouselExampleControls" class="carousel slide avatar-preview pointer-event main-image" data-interval="false" data-ride="carousel" style="margin: 0 auto;">
                                            <div class="carousel-inner profilePicPreview" >
                                                <?php $i =1;
                                                ?>
                                                @if(!$images->isEmpty())
                                                    @foreach($images as $image)
                                                        <div class=" carousel-item @if($i ==1)active @endif">
                                                            <button type="button"  class="remove-image d-block " onclick="removeImg({{$image->que_id}})"><i class="fa fa-times"></i></button>
                                                            <img src="{{url(getImage('public/assets/images/question/'.$image->image,'640x310') )}}" class="d-block w-100" alt="">
                                                        </div> <?php $i++ ?>
                                                    @endforeach
                                                @else
                                                    <div class="avatar-preview" >
                                                        <div class="profilePicPreview " style="background-image: url({{ getImage('','640x310') }}); ">
                                                            <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                                        </div>
                                                    </div>
                                                @endif
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
                                        <div class="avatar-edit">
                                            <input type="file" class="profilePicUpload" name="image[]" id="profilePicUpload1" accept=".png, .jpg, .jpeg" multiple>
                                            <label for="profilePicUpload1" class="bg--success">@lang('Upload Image')</label>
                                            <small class="mt-2 text-facebook">@lang('Supported files'): <b>@lang('jpeg'), @lang('jpg').</b> @lang('Image will be resized into 850x560px') </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">@lang('Factor')</label>
                                <select class="form-control select2" multiple id="category" name="categorymain[]">
                                    @foreach($categories as $row)
                                        <option value="{{$row->id}}" <?php echo (in_array($row->id,$selected_cat) == true) ? 'Selected': ''; ?>>{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- <div class="form-group">
                                  <label class="font-weight-bold">@lang('Index')</label>
                                  <input type="number" name="order" value="{{$qtn->order}}" class="form-control">
                            </div> -->
                            
                            <div class="form-group">
                                <label class="font-weight-bold">@lang('Question')</label>
                                <textarea class="form-control nicEdit"  name="question" rows="6" placeholder="@lang('Question')" >{{$qtn->question}}</textarea>
                            </div>
                            <!-- <div class="form-group">
                                <label class="font-weight-bold">@lang('Mark')</label>
                                <input class="form-control" type="text" name="mark" placeholder="@lang('Mark')" value="{{$qtn->marks}}" >
                            </div> -->
                            <div class="form-group">
                                <label class="font-weight-bold">@lang('Question Type')</label>
                                <select class="form-control" id="clickoption" name="choosecategory" required>
                                    <option value="">-- Select Option --</option>
                                    <option value="1" {{$qtn->choosecategory == 1 ? 'Selected':''}}>@lang('Likert')</option>
                                    <option value="2" {{$qtn->choosecategory == 2 ? 'Selected':''}}>@lang('Radio Button')</option>
                                    <option value="3" {{$qtn->choosecategory == 3 ? 'Selected':''}}>@lang('True or False')</option>
                                </select>
                            </div>  
                            <div class="form-group">
                                <label class="font-weight-bold d-flex align-items-center"><input class="mr-2"  type="checkbox" id="reverse" name="reverse" value="1" {{$qtn->reverse==1?'checked':''}}>@lang('Reverse')
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
                                        <div class="op mt-3 main-image w-100">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <label class="font-weight-bold">{{$score->scorevalue}}</label>
                                                </div>
                                            </div>
                                            <?php if (!empty($op_images)): ?>
                                                <?php if (array_key_exists($score->id, $op_images) == true): ?>
                                                        <?php if (!empty($op_images[$score->id])): ?>
                                                            <div class="image-upload">
                                                                <div id="carouselExampleControls-{{$score->id}}" class="carousel slide avatar-preview thumb" data-interval="false" data-ride="carousel">
                                                                    <div class="carousel-inner profilePicPreview">
                                                                        <?php $k = 1; ?>
                                                                        @foreach($op_images[$score->id] as $optoinimg)
                                                                            <div class="carousel-item @if($k ==1) active @endif">
                                                                                <div class="thumb" >
                                                                                    <div class="avatar-preview">
                                                                                        <img src="{{url(getImage('public/assets/images/option/'.$optoinimg['image'],'850x560') )}}" class="d-block w-100" alt="">
                                                                                    </div> <?php $k++ ?>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                    <?php if ($k > 2): ?>
                                                                        <a class="carousel-control-prev" href="#carouselExampleControls-{{$score->id}}" role="button" data-slide="prev">
                                                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                                            <span class="sr-only">Previous</span>
                                                                        </a>
                                                                        <a class="carousel-control-next" href="#carouselExampleControls-{{$score->id}}" role="button" data-slide="next">
                                                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                                            <span class="sr-only">Next</span>
                                                                    <?php endif ?>
                                                                    </a>
                                                                </div>
                                                                <div class="result-mcqimage" id="result-mcqimage-{{$key}}"></div>
                                                            </div>
                                                        <?php endif ?>
                                                <?php endif ?>
                                            <?php endif ?>

                                            <div class="image-upload imagepreview-{{$key}} image-uploadd">
                                                <div class="thumb" >
                                                    <?php if (empty($op_images) || array_key_exists($score->id, $op_images)): ?>
                                                        <?php if (empty($op_images) || empty($op_images[$score->id])): ?>
                                                            <div class="avatar-preview">
                                                                <div class="profilePicPreview new-box w-100"  style="background-image: url({{ getImage('','640x310') }}); background-position: center;">
                                                                    <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                                                </div>
                                                            </div>
                                                        <?php endif ?>
                                                    <?php endif ?>
                                                    <div class="avatar-edit">
                                                        <input data-key="{{$key}}" type="file" name="option_type_image_{{$score->scorecategory}}[{{$i}}][]" class="profilePicUpload form-control pt-1 mcqimage-upload" id="profilePicUploadmcqimage{{$key}}"  accept=".png, .jpg, .jpeg" style="height: 0;" multiple>
                                                        <label for="profilePicUploadmcqimage{{$key}}" class="bg--success">@lang('Upload Image')</label>
                                                    </div>
                                                </div>
                                                <div class="result-mcqimage" id="result-mcqimage-{{$key}}"></div>
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
                        </div>
                        <div class="card-footer py-4">
                            <button type="submit" class="btn btn--primary btn-block" id="submit">@lang('Submit')</button>
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
        function handleFileSelect(id) {
            if (window.File && window.FileList && window.FileReader) {
                document.getElementById('result-mcqimage-'+id).textContent = '';
                var files = event.target.files; //FileList object
                var output = document.getElementById("result-mcqimage-"+id);
                console.log(output)
                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    if (!file.type.match('image')) continue;
                    var picReader = new FileReader();
                    picReader.addEventListener("load", function (event) {
                        var picFile = event.target;
                        var div = document.createElement("div");
                        div.innerHTML += "<img class='thumbnail' src='" + picFile.result + "'" + "title='" + picFile.name + "'/>";
                        div.innerHTML += "<label>"+file.name+"</label>";
                        console.log(file.name+'::'+file.size);
                        output.insertBefore(div, null);
                    });
                    picReader.readAsDataURL(file);
                }
            } else {
                console.log("Your browser does not support File API");
            }
        }
        $(document).on('change', '.mcqimage-upload', function(event) {
            event.preventDefault();
            /* Act on the event */
            handleFileSelect($(this).attr('data-key'));
        });

        //document.getElementById('files').addEventListener('change', handleFileSelect, false);
        'use strict'
        let j = $('input:file.optionimg').length;
        j++;
        var i = <?php echo rand(99,999999) ?>;
        var a = <?php echo rand(99,99999999) ?>;
        var b = <?php echo rand(99,99999999) ?>;
        $(document).on('click', '#add1', function () {
            var element = `
                <div class="image-upload thumb"> 
                    <div class="form-group d-flex justify-content-between">
                        <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-transparent" id="my-addon">
                                        <div class="custom-control custom-radio form-check-primary d-flex align-items-center">
                                            <input type="radio" id="customRadioo${a}" name="correct" class="custom-control-input" value="${b}" >
                                            <label class="custom-control-label text-secondary" for="customRadioo${a}">@lang('Correct')</label>
                                          </div>
                                    </span>
                                </div>
                                <input type="text" class="form-control mr-1" name="option[${b}]" placeholder="@lang('Option')"  >
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
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-transparent" id="my-addon">
                                        <div class="custom-control custom-radio form-check-primary d-flex align-items-center">
                                            <input type="radio" id="customRadio${i}" name="correct" class="custom-control-input" value="${j}" >
                                            <label class="custom-control-label text-secondary" for="customRadio${i}">@lang('Correct')</label>
                                          </div>
                                    </span>
                                </div>
                                <input type="text" class="form-control mr-1" name="option[${j}]" placeholder="@lang('Option')"  >
                                <input type="file" name="mcqimage[${j}][]"  class="profilePicUpload form-control pt-1 pr-1" id="profilePicUpload1" accept=".png, .jpg, .jpeg" multiple>
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
            $(this).parent('.form-group').remove()
        });
        function removeImg(img_id){
            event.preventDefault();
            let Ans =  confirm("Are you sure you want to delete this Image?");
            if(Ans == true) {
                $.ajax({
                    url: "{{route('admin.question.imgremove')}}",
                    type: "POST",
                    data: {
                        _token: "{{csrf_token()}}",
                        id: img_id
                    },
                    success: function (data) {
                        $(".notifymsg").html(data);
                        //$(this).parent('.carousel-item.active').remove()
                        location.reload();
                    }
                })
            }
        }
        // Remove option image
        function removeoptionImg(img_id){
            event.preventDefault();
            let Ans =  confirm("Are you sure you want to delete this Image?");
            if(Ans == true) {
                $.ajax({
                    url: "{{route('admin.question.optionimgremove')}}",
                    type: "POST",
                    data: {
                        _token: "{{csrf_token()}}",
                        id: img_id
                    },
                    success: function (data) {
                        $(".notifymsg").html(data);
                        //$(this).parent('.carousel-item.active').remove()
                        location.reload();
                    }
                })
            }
        }
    $(function () {
        $("#hidefullmain1").hide();
        $("#clickoption").change(function () {
                if ($(this).val() == "1") {
                    $("#hidefullmain").show();
                    $("#hidefullmain1").hide();
                    $("#true-false-row").hide();
                    $("#optionimageremove").hide();
                }
                else if ($(this).val() == "2") {
                     $("#true-false-row").hide();
                     $("#optionimageremove").show();
                     $("#hidefullmain").hide();
                     $("#hidefullmain1").hide();
                }
                else if ($(this).val() == "3") {
                    $("#true-false-row").show();
                    $("#hidefullmain").hide();
                     $("#optionimageremove").hide();
                     $("#hidefullmain1").hide();
                }
            });
        });
    $(document).ready(function(){
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

    $(document).ready(function(){
        $("#submit").click(function(){
            console.log($("#uniqueid").val() );
            if($("#uniqueid").val() == ''){
                $("#uniqueid").attr("required","required");
                $("#uniqueid").css("border-color","red");
                $("#warning_msg").css("display","unset");
            }
        });

        $("#uniqueid").keyup(function(){
            $("#uniqueid").css("border-color","black");
            $("#warning_msg").css("display","none");    
        });        
    });
    </script>
@endpush