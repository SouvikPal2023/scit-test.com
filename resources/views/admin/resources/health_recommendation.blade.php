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
    .add_health_recommendation_container{
        display: flex;
        justify-content: end;
    }
    .modal-content{
        width: fit-content!important;
    }
</style>
@extends('admin.layouts.app')

@section('panel')
<div class="add_health_recommendation_container">
    <button class="btn btn-primary" id="add_health_recommendation_button" >+ Add Thank You Sponser</button>
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
                                    echo '<img src='.$protocol.$_SERVER['HTTP_HOST'].'/uploads/resources/health_recommendation/images/'.$health_recommendation->image_hashname.' width="450" height="300px" alt="Image not available">' ;
                                }else{
                                    echo '<img src='.$protocol.$_SERVER['HTTP_HOST'].'/uploads/resources/health_recommendation/images/'.$health_recommendation->image_hashname.' width="450" height="300px" alt="Image not available">' ;
                                }
                            ?>
                        </div> --}}
                        <div id="content_container">
                            <h4>Thank You Sponser</h4><br>
                            <?php echo $health_recommendation->content ?>
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
            <h5 class="modal-title" id="exampleModalLongTitle">Add/Edit Thank You Sponser</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?php echo url('admin/resources/save_health_recommendation'); ?>" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                {{-- <input hidden type="text" name="health_recommendation_existing_image_name" id="health_recommendation_existing_image_name" value="<?php echo $health_recommendation->image ?>">
                <input hidden type="text" name="health_recommendation_existing_image_hashname" id="health_recommendation_existing_image_hashname" value="<?php echo $health_recommendation->image_hashname ?>">
                <div>
                    <label for="health_recommendation_image"><b>Image: </b></label>
                    <input type="file" accept="image/*" name="health_recommendation_image" id="health_recommendation_image">
                </div> --}}
                <div>
                    <label for="health_recommendation_content"><b>Content: </b></label>
                    <textarea name="health_recommendation_content" id="health_recommendation_content" style="display: none;"></textarea>
                    <div id="health_recommendation_content_div" ><?php echo $health_recommendation->content ?></div>
                </div>
                <div>
                    <label for="health_recommendation_remove_image"><b>Remove Existing Image: </b></label>
                    <input type="checkbox" name="health_recommendation_remove_image" id="health_recommendation_remove_image">
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
    $("#add_health_recommendation_button").click(function(){
        jQuery("#health_recommendation_content").val(editor1.getHTMLCode());
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

    var editor1 = new RichTextEditor("#health_recommendation_content_div");
    //editor1.setHTMLCode("Use inline HTML or setHTMLCode to init the default content.");
    editor1.attachEvent("change", function() {
        console.log(editor1.getHTMLCode());
        jQuery("#health_recommendation_content").val(editor1.getHTMLCode());
    });

    // $("#submit_form").click(function(){
    //     console.log($('#updateEvent').serialize())
    //     $.ajax({
    //         url: '<?php echo url('resources/save_health_recommendation'); ?>',
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
                title: 'Are you sure you want to delete his health_recommendation',
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
                        url: '<?php echo url('admin/resources/delete_health_recommendation'); ?>',
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