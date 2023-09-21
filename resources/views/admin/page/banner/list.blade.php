@extends('admin.adminMaster')
@section('title','Page Banners')

@section('content')

<div class="container-fluid">
   <div class="block-header">
      <h2>Page Banners</h2>
   </div>

   <a href="{{ route('banner.create') }}" class="btn btn-success mb-25"> + Create Page Banner</a>

   <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    BANNER LIST
                 
                </h2>
               
            </div>
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
                                <img src="{{  isset($bannerlist->banner_image) ? asset('storage/banners/'.$bannerlist->banner_image) : asset('admin_assets/images/default_img.png') }}" 
                                    width="50" 
                                    height="50" 
                                    alt="Banner Image"
                                    class="round__custom rounded-circle">
                            </td>

                            <td>
                                {{$bannerlist->title ?? ''}}
                            </td>

                            <td>
                                {{ \Carbon\Carbon::parse($bannerlist->created_at)->format('d/m/Y')}}
                            </td>

                            <td>
                                <a href="{{ route('banner.edit',$bannerlist->id) }}"
                                    class="btn btn-success btn-sm ml-3 btn btn-primary btn-sm ml-3">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                </a>
                            
                                <div style="display: inline-block;">
                                    <form action="{{route('banner.destroy', $bannerlist->id)}}" 
                                        method="POST" 
                                        >
                                        @csrf
                                        @method('DELETE')
                                         <button type="submit" 
                                              class="btn btn-danger btn-sm Delete" 
                                              style="cursor: pointer;">
                                          
                                           <i class="fa fa-trash" aria-hidden="true"></i> Delete
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
@push('admin-scripts')
@include('admin.common.deleteConfirm')
@endpush
@endsection

