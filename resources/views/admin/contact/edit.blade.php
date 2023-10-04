@extends('admin.layouts.app')

@section('title', "View Message")

@section('panel')



<div class="row">
  <div class="col-xl-12">
    <div class="card mb-4">
      
      <div class="card-body">
         <form class="forms-sample" 
               action="{{route('admin.contact.update', $contact)}}"
               method="POST" 
               autocomplete="off">
            @csrf
            @method('PATCH')

            @include('admin.contact.form')

        </form>
      </div>
    </div>
  </div>
</div>

@endsection