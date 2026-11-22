@extends('layouts.admin')
@section('content')
<div class="container">
 <div class="card shadow mb-4">
  <div class="card-header">
   <h4>Create Payments</h4>
  </div>
  <div class="card-body">
    <form action="{{route('backend.payments.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
       <label for="" class="form-label">Name</label>
       <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="CA-001" value="{{old('name')}}">
      @error('name')
      <div class="invalid-feedback">{{$message}}</div>
      @enderror
      </div>
    <!--  Name -->
    <div class="mb-3">
       <label for="" class="form-label">logo</label>
       <input type="file" accept="logo/*" name="logo" class="form-control @error('logo') is-invalid @enderror" value="{{old('logo')}}">
       @error('logo')
       <div class="invalid-feedback">{{$message}}</div>
       @enderror
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-primary px-4"> Create Payment</button>
    </div>
    </form>
  </div>
 </div>
</div>
@endsection