@extends('admin.layouts.app')

@section('panel')

<div class="container-fluid">



    <form action="{{route('admin.exam.update',$exam->id)}}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="card b-radius--10 ">

            <div class="card-body">

                <div class="row p-3">

                    <div class="col-lg-6">

                       
                       <div class="form-group">

                           <label class="font-weight-bold">@lang('Title') <span class="text-danger">*</span></label>

                           <input  class="form-control" placeholder="@lang('Test Title')" type="text" name="title" required value="{{$exam->title}}">

                       </div>



                       <div class="form-group">

                            <label class="font-weight-bold">@lang('Instruction') <span class="text-danger">*</span></label>

                            <textarea  class="form-control nicEdit" name="instruction" required>{{$exam->instruction}}</textarea>

                       </div>


                       <div class="form-group">
                           <label class="font-weight-bold">@lang('Select Gender') <span class="text-danger">*</span></label>
                           <select  class="form-control" name="gender_id" required>
                               <option value="0" >-- select gender--</option>
                               @foreach ($genders as $gender)
                               <option value="{{$gender->id}}" {{$exam->gender_id==$gender->id?'selected':''}}>{{$gender->name}}</option>
                               @endforeach
                           </select>
                        </div>


                       <div class="form-group">

                           <label class="font-weight-bold">@lang('Total Mark') </label>

                           <input  class="form-control" placeholder="@lang('Test Total Mark')" type="text" name="totalmark"  value="{{$exam->totalmark}}">

                       </div>



                       <div class="form-group">

                        <label class="font-weight-bold">@lang('Pass Mark Percentage') </label>

                        <div class="input-group">

                            <input  class="form-control" placeholder="@lang('Pass Mark Percentage eg: 33%')" type="text" name="pass_percentage"  value="{{$exam->pass_percentage}}">

                            <div class="input-group-append">

                                <span class="input-group-text" id="suffix">%</span>

                            </div>

                        </div>

                      </div>



                       <div class="form-group">

                           <label class="font-weight-bold">@lang('Time Duration (in minute)') </label>

                           <input  class="form-control" placeholder="@lang('Test time duration in minute')" type="text" name="duration"  value="{{$exam->duration}}">

                       </div>

                       <div class="form-group">

                        <label  class="font-weight-bold">@lang('Payment Type') <span class="text-danger">*</span></label>

                        <select  class="form-control value" name="value" required>



                            <option value="1" {{$exam->value==1?'selected':''}}>@lang('Paid')</option>

                            <option value="2" {{$exam->value==2?'selected':''}}>@lang('Free')</option>



                        </select>

                     </div>





                        <div class="form-group">

                            <label class="font-weight-bold">@lang('Test Fee') <span class="text-danger">*</span></label>

                            <div class="input-group">

                                <input  class="form-control exam_fee" placeholder="@lang('Test Fee')" type="text" name="exam_fee" required value="{{getAmount($exam->exam_fee)}}">

                                <div class="input-group-append">

                                    <span class="input-group-text" id="suffix">{{$general->cur_text}}</span>

                                </div>

                            </div>

                          </div>



                        <div class="form-group" id="custom-checkbox">

                            <label class="font-weight-bold">@lang('Exam Schedule')</label>

                                <input  class=" ml-2" type="checkbox" id="datecheck" name="datecheck" value="" {{$exam->datecheck==1?'checked':''}}>

                        </div>



                        <div class="form-group" id="startdatecheck">

                            <label class="font-weight-bold">@lang('Start date') </label>



                            <input type="text" name="start_date" class="datepicker-here form-control" data-language='en' data-date-format="dd-mm-yyyy" data-position='top left' placeholder="@lang('Start Date')" value="{{$exam->start_date}}">



                        </div>



                        <div class="form-group" id="enddatecheck">

                            <label class="font-weight-bold">@lang('End Date') </label>

                            <input type="text" name="end_date" class="datepicker-here form-control" data-language='en' data-date-format="dd-mm-yyyy" data-position='top left' placeholder="@lang('End Date')"  value="{{$exam->end_date}}">



                        </div>

                    </div>



                    <div class="col-md-6">

                        <div class="notifymsg text-center text-primary pb-2"></div>

                        <div class="form-group">

                            <div class="image-upload">

                                <div class="thumb">

                                        <div id="carouselExampleControls" class="carousel slide avatar-preview" data-interval="false" data-ride="carousel">

                                            <div class="carousel-inner profilePicPreview">

                                                <?php $i =1 ?>

                                                @if(!$images->isEmpty())

                                                   @foreach($images as $image)

                                                        <div class=" carousel-item @if($i ==1)active @endif">

                                                            <button type="button"  class="remove-image d-block " onclick="removeImg({{$image->image_id}})"><i class="fa fa-times"></i></button>

                                                            <img src="{{url(getImage('public/assets/images/exam/'.$image->img,'850x560') )}}" class="d-block w-100" alt="">

                                                        </div> <?php $i++ ?>

                                                    @endforeach

                                                @else

                                                    <div class="avatar-preview">

                                                        <div class="profilePicPreview" style="background-image: url({{ getImage('','300x200') }})">

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

                            <label class="form-control-label font-weight-bold">@lang('Negative Marking (optional)') <small class="warning text-danger"></small> </label>

                            <input type="checkbox" class="neg_status removeEl" data-width="100%" data-onstyle="-success" data-offstyle="-danger" data-toggle="toggle" data-on="@lang('ON')" data-off="@lang('OFF')" name="neg_status" @if ($exam->question_type == 2)

                                disabled

                            @endif

                            @if($exam->negative_marking==1)checked @endif>

                        </div>





                        <div class="form-group">

                            <label class="font-weight-bold">@lang('Reduce Mark')</label>

                            <input class="form-control reduce" type="text" placeholder="@lang('Reduce Mark')" name="reduce_mark" @if($exam->negative_marking==0)disabled @endif value="{{$exam->reduce_mark??'0'}}" >

                        </div>



                        <div class="form-group">

                            <label class="form-control-label font-weight-bold">@lang('Question Randomize (optional)') </label>

                            <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger" data-toggle="toggle" data-on="@lang('ON')" data-off="@lang('OFF')" name="randomize" @if($exam->random_question==1)checked @endif>

                        </div>

                        <div class="form-group">

                            <label class="form-control-label font-weight-bold">@lang('Question options suffle (optional)') </label>

                            <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger" data-toggle="toggle" data-on="@lang('ON')" data-off="@lang('OFF')" name="opt_suffle" @if($exam->option_suffle==1)checked @endif>

                        </div>



                        <div class="form-group">

                            <label class="form-control-label font-weight-bold">@lang('Status') </label>

                            <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger" data-toggle="toggle" data-on="@lang('Active')" data-off="@lang('Inactive')" name="status" @if($exam->status==1)checked @endif>

                        </div>

                    </div>

                </div>

            </div>

            <div class="card-footer py-4">

                <button type="submit" class="btn btn--primary btn-block">@lang('Submit')</button>

            </div>

        </div>

    </form>

</div>

   <!-- card end -->



@endsection



@push('script-lib')

<script src="{{asset('public/assets/admin/js/datepicker.min.js')}}"></script>

<script src="{{asset('public/assets/admin/js/datepicker.en.js')}}"></script>

@endpush



@push('script')



    <script>



        $(document).ready(function(){

            this.value = this.checked ? 1 : 0;

        });



        $('#datecheck').on('change', function(){

           this.value = this.checked ? 1 : 0;

        });



        $(document).ready(function(){

            if($("#datecheck").is(':checked')){

                 $('#startdatecheck').show();

                $('#enddatecheck').show();

            }else{

                $('#startdatecheck').hide();

                $('#enddatecheck').hide();

            }

        });



        $('#datecheck').change(function(){

            if (this.checked) {

                $('#startdatecheck').show();

                $('#enddatecheck').show();

            }

            else {

                $('#startdatecheck').hide();

                $('#enddatecheck').hide();

            }                   

        });



         (function ($) {

            'use strict'

             function options(data){

                if($(data).val()==1){

                 $('.exam_fee').removeAttr('disabled')

                } else if ($(data).val()==2){

                $('.exam_fee').attr('disabled',true)

                } else {

                 return false;

                }

              }



            $('.value').each(function() {

                options(this);



            })



            $('.value').on('change', function () {

                options(this);

            });



            $('.neg_status').on('change', function () {

                if($(".neg_status").is(':checked'))

                $(".reduce").removeAttr('disabled');  // checked

                else

                    $(".reduce").attr('disabled',true);

            });





            $('#qtype').on('change',function () {



                if($(this).val()==2){

                    $('.warning').text('Negative marking is disabled when question type is written')

                    $('.removeEl').attr('disabled',true)

                } else if ($(this).val()==1){

                    $('.warning').text('')

                    $('.removeEl').attr('disabled',false)

                }

             })



         })(jQuery);



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

    </script>



@endpush



@push('breadcrumb-plugins')

    <a class="btn btn--primary" href="{{route('admin.exam.all')}}"><i class="las la-backward"></i> @lang('Go Back')</a>

@endpush

