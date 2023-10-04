@extends('admin.layouts.app')

@section('title', 'Testimonials')

@section('panel')

<div class="content-wrapper">
  {{-- @include('admin.homepageManager.testimonialSection.text.edit') --}}


  <div>
    <a href="{{ route('admin.testimonial.create') }}" class="btn btn-primary font-weight-bold mb-3">
      + Add New Testimonial
    </a>
  </div>

  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
        
        
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Designation</th>
                  <th>Testimonial</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                @if($testimonials->count() > 0 )
                  @foreach($testimonials as $testimonial)
                    <tr>
                      <td class="py-1">
                      
                        <img src="{{  isset($testimonial->image) ? config("app.url").Storage::url($testimonial->image) : asset('assetsnew/images/default-image.png') }}" alt="testimonial_image" class="w-px-50 h-px-50 rounded-circle"/>
                      </td>
                      <td>
                          {{ $testimonial->name ?? '--' }}
                      </td>
                      <td>
                          {{ $testimonial->designation ?? '--' }}
                      </td>
                      <td>
                          {!!  Str::limit($testimonial->content, 50) ?? '--' !!}
                      </td>
                      <td>
                         <div class="dropdown action-label">
                          <a class="btn @if(isset($testimonial->status) && ($testimonial->status=='active')) btn-primary @else btn-danger @endif dropdown-toggle btn-sm text-white" data-bs-toggle="dropdown" aria-expanded="false">

                            <?=(isset($testimonial->status) && $testimonial->status=='active')?'<i class="las la-battery-full"></i> Active':'<i class="las la-battery-empty"></i> Inactive';?>

                            <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu">
                              <form action="{{route('admin.testimonial.status', $testimonial->id)}}" 
                                  method="POST" 
                                  >
                                  @csrf
                                  @method('PATCH')
                                   <button type="submit" 
                                        class="dropdown-item status-btn btn-sm" 
                                        style="cursor: pointer;">
                                    
                                    {!! ($testimonial->status=='active')? "<i class='fa fa-dot-circle-o text-danger'></i> Inactive":"<i class='fa fa-dot-circle-o text-success'></i> Active" !!}
                                  </button>
                              </form>
                            </div>
                        </div>
                      </td>
                      <td>
                         <a href="{{ route('admin.testimonial.edit', $testimonial) }}" class="btn btn-info btn-sm">
                         <i class="las la-edit text--shadow"></i> 
                         </a>

                        <div class="d-inline-block">
                           <form action="{{route('admin.testimonial.destroy', $testimonial->id)}}" 
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
                  @endforeach
                @else
                  <td colspan="7" class="text-center">No Testimonial(s) Listed Yet</td>
                @endif
               
              </tbody>
            </table>

            <div class="mt-5">
              {{ $testimonials->links('pagination::bootstrap-4') }}
            </div>
          </div>
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