@extends('layouts.admin')
@section('content')
<div class="container">
 <div class="card shadow mb-4">
  <div class="card-header">
   <h4>Create Categories</h4>
  </div>
  <div class="card-body">
    <form action="{{route('backend.categories.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
    <!-- Item Name -->
    <div class="mb-3">
       <label for="" class="form-label">Name</label>
       <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
       @error('name')
       <div class="invalid-feedback">{{$message}}</div>
      @enderror
    </div>
    <!-- Image -->
    <div class="mb-3">
       <label for="" class="form-label">Image</label>
       <input type="file" accept="image/*" name="image" class="form-control @error('image') is-invalid @enderror" value="{{old('image')}}">
        @error('image')
       <div class="invalid-feedback">{{$message}}</div>
      @enderror
    </div>
  
    <div class="text-center">
      <button type="submit" class="btn btn-primary px-4"> Create Item</button>
    </div>
    </form>
  </div>
 </div>
</div>
@endsection