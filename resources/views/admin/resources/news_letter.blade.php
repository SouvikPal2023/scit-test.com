<style>
    .modal-content{
        width: fit-content;
    }
    #image_container{
        display: flex;
        justify-content: center;
    }
    #image_container img{
        border: 1px solid blue;
        border-radius: 30px!important;
    }
    #content_container{
        /* border: 1px solid red; */
        padding: 15px;
    }
    .delete_button_container{
        display: flex;
        justify-content: end;
        margin-top: -20px;
        margin-right: -20px;
        color: red;
    }
    .display_content{
        border: 1px solid blue;
        border-radius: 15px!important;
        margin-bottom: 15px;
        padding: 20px;
    }
    .display_news_letter_footer{
        display: flex;
        justify-content: space-between;
        align-items: end;
        color: grey;
    }
    .display_news_letter_footer > *{
        font-weight: 100;
    }
    .mandatory{
        color: red;
    }
    label{
        font-weight: bold;
    }
    .m-portlet{
        background-color: white;
        padding: 30px;
        margin: 10px 0px;
    }
    .add_news_letter_container{
        display: flex;
        justify-content: end;
    }
    .modal-content{
        width: fit-content!important;
    }
</style>
@extends('admin.layouts.app')

@section('panel')
    <div class="add_news_letter_container">
        <button class="btn btn-primary" id="add_news_letter_button" >+ Add News Letter</button>
    </div>
    <div>
        {{-- {{ $data['all_news_letter'] }} --}}
        {{ $previous_time = '' }}
        @foreach ($data['all_news_letter'] as $key => $value)
            @if($value['time'] != $previous_time)
                {{ $value['time'] }}
                <div class="m-portlet m-portlet--tab">
                    <div class="m-portlet__body">
                        <div class="delete_button_container">
                            <!-- <button class="delete_button" value="<?php echo $value['id'] ?>"> -->
                                <i id="<?php echo $value['id'] ?>" style="font-size: x-large;cursor:pointer;" class="fa fa-trash delete_button" aria-hidden="true"></i>
                            <!-- </button> -->
                        </div>
                        <div class="display_content">
                            <?php echo $value['content'] ?>
                        </div>
                        <div class="display_news_letter_footer">
                            <div><?php echo $value['date'] ?></div>
                            <?php $protocol = empty($_SERVER['HTTPS']) ? 'http://' : 'https://' ; ?>
                            {{-- <div>
                                <?php 
                                if($protocol == 'https://'){
                                    echo '<img src='.$protocol.$_SERVER['HTTP_HOST'].'/uploads/resources/news_letter/images/'.$value['image_hashname'].' width="200" height="100px" alt="Image not available">' ;
                                }else{
                                    echo '<img src='.$protocol.$_SERVER['HTTP_HOST'].'/uploads/resources/news_letter/images/'.$value['image_hashname'].' width="200" height="100px" alt="Image not available">' ;
                                }  
                                    
                                ?></div> --}}
                            <div><?php echo $value['author'] ?></div>
                        </div>
                    </div>
                </div>
            @else
                <div style="margin-top: 10px;" class="m-portlet m-portlet--tab">
                    <div class="m-portlet__body">
                        <div class="delete_button_container">
                            <!-- <button class="delete_button" value="<?php echo $value['id'] ?>"> -->
                                <i id="<?php echo $value['id'] ?>" style="font-size: x-large;cursor:pointer;" class="fa fa-trash delete_button" aria-hidden="true"></i>
                            <!-- </button> -->
                        </div>
                        <div class="display_content">
                            <?php echo $value['content'] ?>
                        </div>
                        <div class="display_news_letter_footer">
                            <div><?php echo $value['date'] ?></div>
                            <?php $protocol = empty($_SERVER['HTTPS']) ? 'http://' : 'https://' ; ?>
                            {{-- <div>
                                <?php 
                                if($protocol == 'https://'){
                                    echo '<img src='.$protocol.$_SERVER['HTTP_HOST'].'/uploads/resources/news_letter/images/'.$value['image_hashname'].' width="200" height="100px" alt="Image not available">' ;
                                }else{
                                    echo '<img src='.$protocol.$_SERVER['HTTP_HOST'].'/uploads/resources/news_letter/images/'.$value['image_hashname'].' width="200" height="100px" alt="Image not available">' ;
                                }  
                                    
                                ?></div> --}}
                                <div><?php echo $value['author'] ?></div>
                        </div>
                    </div>
                </div>
            @endif
            <?php $previous_time = $value['time'] ?>
        @endforeach
    </div>
<!-- Modal Starts Here -->
    <!-- Button trigger modal -->
    <button hidden id="modal_btn" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
        Launch demo modal
        </button>
    
        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add News Letter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo url('admin/resources/save_news_letter'); ?>"  method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div>
                        <label for="news_letter_content">Content <span class="mandatory">*</span> : </label>
                        <textarea name="news_letter_content" id="news_letter_content" style="display: none;"></textarea>
                        <div id="news_letter_content_div" ></div>
                    </div>
                    <!-- <div>
                        <label for="news_letter_date">Date: </label>
                        <input type="date" name="news_letter_date" id="news_letter_date">
                    </div> -->
                    <div style="margin: 15px 0px">
                        <label for="news_letter_author">Author <span class="mandatory">*</span> : </label>
                        <input type="text" name="news_letter_author" id="news_letter_author">
                    </div>
                    {{-- <div>
                        <label for="news_letter_image">Image: </label>
                        <input type="file" accept="image/*" name="news_letter_image" id="news_letter_image">
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="submit_form" type="submit" class="btn btn-primary">Save News Letter</button>
                </div>
            </form>            
            </div>
        </div>
        </div>
    <!-- Modal Ends Here -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        $("#add_news_letter_button").click(function(){
            console.log("done");
            $("#modal_btn").trigger('click');
        })
    </script>
    <!--Include the JS & CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    
    <link rel="stylesheet" href="<?php echo url('/public/richtexteditor/richtexteditor/rte_theme_default.css')  ?>" />
    <script type="text/javascript" src="<?php echo url('/public/richtexteditor/richtexteditor/rte.js')  ?>"></script>
    <script type="text/javascript" src='<?php echo url('/public/richtexteditor/richtexteditor/plugins/all_plugins.js')  ?>'></script>
    
    <script>
        $("#submit_form").prop('disabled', true);
    
        var editor1 = new RichTextEditor("#news_letter_content_div");
        //editor1.setHTMLCode("Use inline HTML or setHTMLCode to init the default content.");
        editor1.attachEvent("change", function() {
            console.log(editor1.getHTMLCode());
            jQuery("#news_letter_content").val(editor1.getHTMLCode());
    
            if(editor1.getHTMLCode() && $("#news_letter_author").val()){
                $("#submit_form").prop('disabled', false);
            }else{
                $("#submit_form").prop('disabled', true);
            }
        });
    
        $("#news_letter_author").on('input',function(){
            if(editor1.getHTMLCode() && $("#news_letter_author").val()){
                $("#submit_form").prop('disabled', false);
            }else{
                $("#submit_form").prop('disabled', true);
            }
        })
    
        // $("#submit_form").click(function(){
        //     console.log($('#updateEvent').serialize())
        //     $.ajax({
        //         url: '<?php echo url('resources/save_news_letter'); ?>',
        //         type: "POST",
        //         data: $('#updateEvent').serialize(),
        //         success: function(response) {
        //             window.location.reload();
        //         }
        //     });
        // });
    
        $(".delete_button").click(function(){
            let id = $(this).attr('id');
            swal({
                    // position:'top-end',
                    title: 'Are you sure you want to delete his news_letter',
                    icon: "info",
                    button: 'Okay',
                    cancelButtonText: "Cancel",
                    dangerMode: false,
                }).then(
                    function(isConfirm){
                    console.log(isConfirm)
                    if (isConfirm){
                        console.log(isConfirm.value)
                        $.ajax({
                            url: '<?php echo url('admin/resources/delete_news_letter'); ?>',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: "POST",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                id: id
                            },
                            success: function(response) {
                                console.log(response)
                                window.location.reload();
                            }
                        });
                }
            });
        })
    </script>
@endsection