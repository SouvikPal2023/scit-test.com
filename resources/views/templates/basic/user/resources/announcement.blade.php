@extends($activeTemplate.'layouts.masterNew')
@section('content')
<style>
    .display_content{
        border: 1px solid blue;
        border-radius: 15px!important;
        margin-bottom: 15px;
        padding: 50px 50px;
    }
    .display_announcement_footer{
        display: flex;
        justify-content: space-between;
        align-items: end;
        color: grey;
    }
    .display_announcement_footer > *{
        font-weight: 100;
    }
    label{
        font-weight: bold;
    }
    .m-portlet{
        background-color: white;
        padding: 30px;
        margin: 10px 0px;
    }
</style>
<div class="transaction-area mt-30">
    <div class="row justify-content-center mb-30-none">
        <div class="col-xl-12 col-md-12 col-sm-12 mb-30">
            <div class="panel-table-area">
                <div class="panel-table border-0">
                    <div>
                        {{-- {{ $data['all_announcement'] }} --}}
                        {{ $previous_time = '' }}
                        @foreach ($data['all_announcement'] as $key => $value)
                            @if($value['time'] != $previous_time)
                                @if($previous_time)
                                    <hr style="border: 3px solid black;">
                                @endif
                                {{ $value['time'] }}
                                <div class="m-portlet m-portlet--tab">
                                    <div class="m-portlet__body">
                                        <div class="display_content">
                                            <?php echo $value['content'] ?>
                                        </div>
                                        <div class="display_announcement_footer">
                                            <div><?php echo $value['date'] ?></div>
                                            <?php $protocol = empty($_SERVER['HTTPS']) ? 'http://' : 'https://' ; ?>
                                            {{-- <div>
                                                <?php 
                                                if($protocol == 'https://'){
                                                    echo '<img src='.$protocol.$_SERVER['HTTP_HOST'].'/uploads/resources/announcement/images/'.$value['image_hashname'].' width="200" height="100px" alt="Image not available">' ;
                                                }else{
                                                    echo '<img src='.$protocol.$_SERVER['HTTP_HOST'].'/uploads/resources/announcement/images/'.$value['image_hashname'].' width="200" height="100px" alt="Image not available">' ;
                                                }  
                                                    
                                                ?></div> --}}
                                            <div><?php echo $value['author'] ?></div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div style="margin-top: 10px;" class="m-portlet m-portlet--tab">
                                    <div class="m-portlet__body">
                                        <div class="display_content">
                                            <?php echo $value['content'] ?>
                                        </div>
                                        <div class="display_announcement_footer">
                                            <div><?php echo $value['date'] ?></div>
                                            <?php $protocol = empty($_SERVER['HTTPS']) ? 'http://' : 'https://' ; ?>
                                            {{-- <div>
                                                <?php 
                                                if($protocol == 'https://'){
                                                    echo '<img src='.$protocol.$_SERVER['HTTP_HOST'].'/uploads/resources/announcement/images/'.$value['image_hashname'].' width="200" height="100px" alt="Image not available">' ;
                                                }else{
                                                    echo '<img src='.$protocol.$_SERVER['HTTP_HOST'].'/uploads/resources/announcement/images/'.$value['image_hashname'].' width="200" height="100px" alt="Image not available">' ;
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection