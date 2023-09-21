@extends('admin.layouts.app')
@section('title','Page List Management')

@section('panel')

<div class="container-fluid">
  <div class="block-header">
    <h2>Page List Management</h2>
  </div>
  <a href="{{ route('admin.page.create') }}"
    class="btn btn-success btn-sm ml-3 btn btn-success btn-sm ml-3 btn btn-success mb-25">
  + Create Pages</a>
  <!-- Widgets -->
  <div class="row clearfix mt-5">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="card" style="padding:30px">
        <div class="header">
          <h3>PAGES LIST</h3>
        </div>

        <div class="body table-responsive">
          <table class="table table-bordered table-striped table-hover <?php echo count($pages)?'dataTable':'';?>">
            <thead>
              <tr>
                <th style="text-align: center">Title of the Page</th>

                <th style="text-align: center">Page Slug</th>
                <th style="text-align: center">Created On</th>
                <th style="text-align: center">Status</th>
                <th style="text-align: center">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse($pages as $page)
              <tr>
                <td>
                  {{$page->name ?? ''}}
                </td>

                <td>
                    {{$page->slug ?? ''}}
                  </td>

                <td>
                  {{ \Carbon\Carbon::parse($page->created_at)->format('d/m/Y')}}

                </td>
                <td>
                  <div class="dropdown action-label">
                    <a class="btn dropdown-toggle btn-sm @if(isset($page->status) && ($page->status=='active')) btn-warning @else btn-info @endif" data-toggle="dropdown" aria-expanded="false">

                      <?=(isset($page->status) && $page->status=='active')?'<i class="fa fa-dot-circle-o text-success"></i> Active':'<i class="fa fa-dot-circle-o text-danger"></i> Inactive';?>

                      <span class="caret"></span>
                    </a>
                    <div class="btn btn-sm ml-3 dropdown-menu" style="background-color: #f0f0f0;">
                      <!-- <form action="{{route('page.change', $page->id)}}"
                        method="POST"
                        >
                        @csrf
                        @method('PUT')
                        <button type="submit"
                        class="dropdown-item status-btn btn-sm"
                        style="cursor: pointer; border: none;">

                        {!! ($page->status=='active')? "<i class='fa fa-dot-circle-o text-danger'></i> Inactive":"<i class='fa fa-dot-circle-o text-success'></i> Active" !!}
                        </button>
                      </form> -->
                    </div>
                  </div>
                </td>
                <td><a href="{{ route('admin.page.edit',$page->id) }}"
                  class="btn btn-success btn-sm ml-3 btn btn-primary btn-sm ml-3">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Edit</a>


                <div style="display: inline-block;">
                  <form action="{{route('admin.page.destroy', $page->id)}}"
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
            <td colspan="6" class="text-center">No Page(s) Listed Yet</td>
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

