@extends('layouts.admin')
@section('content')
<div class="container">
 <div class="card shadow mb-4">
  <div class="card-header">
   <h4>Create Categories</h4>
  </div>
  <div class="card-body">
    <form action="{{route('backend.categories.update',$category->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
    <!-- Item Name -->
    <div class="mb-3">
       <label for="" class="form-label">Name</label>
       <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name',$category->name)}}">
       @error('name')
       <div class="invalid-feedback">{{$message}}</div>
      @enderror
    </div>
     <!-- Image -->
<div class="mb-3">
                    <ul class="nav nav-tabs" id="imageTab" role="tablist">

                        <li class="nav-item">
                            <button class="nav-link active"
                                    data-bs-toggle="tab"
                                    data-bs-target="#current-image"
                                    type="button">
                                Current Image
                            </button>
                        </li>

                        <li class="nav-category">
                            <button class="nav-link"
                                    data-bs-toggle="tab"
                                    data-bs-target="#new-image"
                                    type="button">
                                Upload New Image
                            </button>
                        </li>

                    </ul>

                    <div class="tab-content border border-top-0 p-3">

                        <!-- Current Image -->
                        <div class="tab-pane fade show active"
                             id="current-image">

                            <img src="{{ asset($category->image) }}"
                                 class="img-fluid"
                                 alt="Current Image">
                            <input type="hidden" name="old_image" value="{{ $category->image }}">

                        </div>

                        <!-- New Image -->
                        <div class="tab-pane fade"
                             id="new-image">
                            <input type="file"
                                   name="image"
                                   accept="image/*"
                                   class="form-control @error('image') is-invalid @enderror">

                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                </div>
    
    <div class="text-center">
      <button type="submit" class="btn btn-primary px-4"> Update Category </button>
    </div>
   </form>
  </div>
 </div>
</div>
@endsection
  
   