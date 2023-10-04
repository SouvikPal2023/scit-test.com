@extends('admin.layouts.app')
@section('title','Page Banners')

@section('panel')

<div class="container-fluid">
 

   <a href="{{ route('admin.banner.create') }}" class="btn btn-success mb-25"> + Create New Banner Image</a>

   <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
           
            <div class="body table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title of the Banner</th>
                            <th>Created On</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bannerlists as $bannerlist)
                        <tr>
                            <td>
                                
                                    <img src="{{  isset($bannerlist->banner_image) ? config("app.url").Storage::url($bannerlist->banner_image) : asset('assetsnew/images/default-image.png') }}" alt="testimonial_image" class="w-px-50 h-px-50 rounded-circle" style="height: 100px;"/>
                            </td>

                            <td>
                                {{$bannerlist->title ?? ''}}
                            </td>

                            <td>
                                {{ \Carbon\Carbon::parse($bannerlist->created_at)->format('d/m/Y')}}
                            </td>

                            <td>
                                <a href="{{ route('admin.banner.edit',$bannerlist->id) }}"
                                    class="btn btn-success btn-sm ml-3 btn btn-primary btn-sm ml-3">
                                    <i class="las la-edit text--shadow"></i> 
                                </a>
                            
                                <div style="display: inline-block;">
                                    <form action="{{route('admin.banner.destroy', $bannerlist->id)}}" 
                                        method="POST" 
                                        >
                                        @csrf
                                        @method('DELETE')
                                         <button type="submit" 
                                              class="btn btn-danger btn-sm Delete" 
                                              style="cursor: pointer;">
                                          
                                              <i class="las la-trash text--shadow"></i> 
                                        </button>
                                    </form>
                                  </div>
                            </td>
                            
                        </tr>
                        @empty
                        <td colspan="6">No record found</td>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
   
  
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@include('admin.common.deleteConfirm')

<script>
  $(document).ready(function() {
    $('.dropdown-toggle').dropdown();
});

  </script>

@endsection

