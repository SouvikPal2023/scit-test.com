<style>
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
    .m-portlet{
        background-color: white;
        padding: 30px;
        margin: 10px 0px;
    }
    .add_about_the_app_container{
        display: flex;
        justify-content: end;
    }
    .modal-content{
        width: fit-content!important;
    }
</style>
@extends('admin.layouts.app')

@section('panel')
<div class="add_about_the_app_container">
    <button class="btn btn-primary" id="add_about_the_app_button" >+ Add About The App</button>
</div>

<!-- Body Starts Here -->
<div class="m-content">
    <!--Begin::Section-->
    <div class="row">
        <div class="col-md-12">
            <!--begin::Portlet-->
                <div class="m-portlet m-portlet--tab">
                    <div class="m-portlet__body">
                        {{-- <div id="image_container">
                            <?php $protocol = empty($_SERVER['HTTPS']) ? 'http://' : 'https://' ; ?>
                            <?php 
                                if($protocol == 'https://'){
                                    echo '<img src='.$protocol.$_SERVER['HTTP_HOST'].'/uploads/resources/about_the_app/images/'.$about_the_app->image_hashname.' width="450" height="300px" alt="Image not available">' ;
                                }else{
                                    echo '<img src='.$protocol.$_SERVER['HTTP_HOST'].'/uploads/resources/about_the_app/images/'.$about_the_app->image_hashname.' width="450" height="300px" alt="Image not available">' ;
                                }
                            ?>
                        </div> --}}
                        <div id="content_container">
                            <h4>About The App</h4><br>
                            <?php echo $about_the_app->content ?>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
<!-- Body Ends Here -->

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
            <h5 class="modal-title" id="exampleModalLongTitle">Add/Edit About App</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?php echo url('admin/resources/save_about_the_app'); ?>" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                {{-- <input hidden type="text" name="about_the_app_existing_image_name" id="about_the_app_existing_image_name" value="<?php echo $about_the_app->image ?>">
                <input hidden type="text" name="about_the_app_existing_image_hashname" id="about_the_app_existing_image_hashname" value="<?php echo $about_the_app->image_hashname ?>">
                <div>
                    <label for="about_the_app_image"><b>Image: </b></label>
                    <input type="file" accept="image/*" name="about_the_app_image" id="about_the_app_image">
                </div> --}}
                <div>
                    <label for="about_the_app_content"><b>Content: </b></label>
                    <textarea name="about_the_app_content" id="about_the_app_content" style="display: none;"></textarea>
                    <div id="about_the_app_content_div" ><?php echo $about_the_app->content ?></div>
                </div>
                <div>
                    <label for="about_the_app_remove_image"><b>Remove Existing Image: </b></label>
                    <input type="checkbox" name="about_the_app_remove_image" id="about_the_app_remove_image">
                </div>              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>            
        </div>
    </div>
    </div>
<!-- Modal Ends Here -->
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
    $("#add_about_the_app_button").click(function(){
        jQuery("#about_the_app_content").val(editor1.getHTMLCode());
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

    var editor1 = new RichTextEditor("#about_the_app_content_div");
    //editor1.setHTMLCode("Use inline HTML or setHTMLCode to init the default content.");
    editor1.attachEvent("change", function() {
        console.log(editor1.getHTMLCode());
        jQuery("#about_the_app_content").val(editor1.getHTMLCode());
    });

    // $("#submit_form").click(function(){
    //     console.log($('#updateEvent').serialize())
    //     $.ajax({
    //         url: '<?php echo url('resources/save_about_the_app'); ?>',
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
                title: 'Are you sure you want to delete his about_the_app',
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
                        url: '<?php echo url('admin/resources/delete_about_the_app'); ?>',
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