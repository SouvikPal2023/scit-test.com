@extends('admin.layouts.app')

@section('title', 'FAQ List')

@section('panel')

<div class="content-wrapper">

  {{-- @include('admin.homepageManager.faq.text.edit') --}}

  <div>
    <a href="{{ route('admin.faq.create') }}" class="btn btn-primary font-weight-bold mb-3">+ Add New FAQ</a>
  </div>

  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title">FAQ List</h3>
          <hr>
        
          <div class="table-responsive">
            <table class="table table-striped FAQ_LIST">
              <thead>
                <tr>
                  <th>Question</th>
                  <th>Answer</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                  @forelse($faqs as $faq)

                    <tr data-index="{{ $faq->id }}" data-position="{{ $faq->position }}">
                      <td>
                        {{ $faq->question }}
                      </td>

                      <td>
                        {!!  Str::limit($faq->answer, 350) !!}
                      </td>

                      <td>
                         <div class="dropdown action-label">
                          <a class="btn @if(isset($faq->status) && ($faq->status=='active')) btn-primary @else btn-danger @endif  dropdown-toggle btn-sm text-white" data-bs-toggle="dropdown" aria-expanded="false">

                            <?=(isset($faq->status) && $faq->status=='active')?'<i class="las la-battery-full"></i> Active':'<i class="las la-battery-empty"></i> Inactive';?>

                            <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu">
                              <form action="{{route('admin.faq.status', $faq->id)}}" 
                                  method="POST" 
                                  >
                                  @csrf
                                  @method('PATCH')
                                   <button type="submit" 
                                        class="dropdown-item status-btn btn-sm" 
                                        style="cursor: pointer;">
                                    
                                    {!! ($faq->status=='active')? "<i class='fa fa-dot-circle-o text-danger'></i> Inactive":"<i class='fa fa-dot-circle-o text-success'></i> Active" !!}
                                  </button>
                              </form>
                            </div>
                        </div>
                      </td>

                     
                      <td>
                        <a href="{{ route('admin.faq.edit', $faq) }}" class="btn btn-info btn-sm">
                        <i class="las la-edit text--shadow"></i> 
                        </a>

                        <div class="d-inline-block">
                           <form action="{{route('admin.faq.destroy', $faq->id)}}" 
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
                  <td colspan="4" class="text-center">No FAQ(s) Listed Yet</td>
                @endforelse
               
              </tbody>
            </table>

            <div class="mt-5">
              {{ $faqs->links('pagination::bootstrap-4') }}
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