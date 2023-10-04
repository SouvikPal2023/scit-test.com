@extends('admin.layouts.app')
@section('title','Contact List Management')

@section('panel')

<div class="content-wrapper">



  

  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title">Contact List</h3>
          <hr>
        
          <div class="table-responsive">
            <table class="table table-striped FAQ_LIST">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Subject</th>
                  <th>Message</th>
                  <th>Phone</th>
                  <th>Created At</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                  @forelse($contacts as $contact)

                    <tr data-index="{{ $contact->id }}" data-position="{{ $contact->position }}">
                      <td>
                        {{ $contact->name }}
                      </td>
                      <td>
                        {{ $contact->email }}
                      </td>
                      <td>
                        {{ $contact->subject }}
                      </td>
                      <td>
                        {{Str::limit($contact->message, 50) }}
                      </td>
                      <td>
                        {{ $contact->phone ?? "--"}}
                      </td>
                     
                      <td>
                                      {{ \Carbon\Carbon::parse($contact->created_at)->format('d/m/Y')}}
                                  </td>
                     
                      <td>
                        <a href="{{ route('admin.contact.edit', $contact) }}" class="btn btn-info btn-sm">
                        <i class="las la-eye text--shadow"></i>
                        </a>

                        <div class="d-inline-block">
                           <form action="{{route('admin.contact.destroy', $contact->id)}}" 
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
                  <td colspan="4" class="text-center">No Contacts(s) Listed Yet</td>
                @endforelse
               
              </tbody>
            </table>

            <div class="mt-5">
              {{ $contacts->links('pagination::bootstrap-4') }}
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