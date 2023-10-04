@extends('admin.layouts.app')
@section('title','Page Banner Management')

@section('panel')

<div class="container-fluid">
   
   <!-- Widgets -->
   <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            
          <div class="card-body">
              <form action="{{ route('admin.banner.update',$bannerlists->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')

                @include('admin.page.banner.form')
                
              </form>
            </div>
        </div>
    </div>
  </div>
  
</div>
@endsection

