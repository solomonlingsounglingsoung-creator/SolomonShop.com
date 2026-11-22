@extends('layouts.admin')
@section('content')
<div class="container">
 <div class="card shadow mb-4">
  <div class="card-header">
   <h4>Edit Item</h4>
   <a href="{{route('backend.items.index')}}" class="btn btn-danger">Cancel</a>
  </div>
  <div class="card-body" >
    <form action="{{route('backend.items.update',$item->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
       <label for="" class="form-label">Code No</label>
       <input type="text" name="code_no"
        class="form-control @error('code_no') is-invalid @enderror" placeholder="IT-001" value="{{old('code_no',$item->code_no)}}">
       @error('code_no')
       <div class="invalid-feedback">
         {{ $message }}
       </div>
       @enderror
    </div>
   
     <!-- Item Name -->
    <div class="mb-3">
      <div class="mb-3">
    <label class="form-label">Item Name</label>
    <input type="text" class="form-control  @error('name') is-invalid @enderror"
     name="name" placeholder="Enter Item Name" value="{{old('name',$item->name)}}">
     @error('name')
       <div class="invalid-feedback">
         {{ $message }}
       </div>
       @enderror
    </div>
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

                        <li class="nav-item">
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

                            <img src="{{ asset($item->image) }}"
                                 class="img-fluid"
                                 alt="Current Image">
                            <input type="hidden" name="old_image" value="{{ $item->image }}">

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
    <!-- price -->
     <div class="mb-3">
       <label for="" class="form-label">Price</label>
       <input type="number" name="price"
        class="form-control  @error('price') is-invalid @enderror"
        value="{{old('price',$item->price)}}" >
       @error('price')
       <div class="invalid-feedback">
         {{ $message }}
       </div>
       @enderror
    </div>
    <!-- discount -->
     <div class="mb-3">
       <label for="" class="form-label">Discount</label>
       <input type="number" name="discount" 
       class="form-control  @error('discount') is-invalid @enderror"
       value="{{old('discount',$item->discount)}}">
       @error('discount')
       <div class="invalid-feedback">
         {{ $message }}
       </div>
       @enderror
    </div>
    <!-- in stock -->
     <div class="mb-3">
       <label for="in_stock" class="form-label">In Stock</label>
       <select name="in_stock" id="in_stock"
        class="form-select @error('in_stock') is-invalid @enderror"
        value="{{old('in_stock',$item->in_stock)}}">
        <option value="1" selected>Yes</option>
        <option value="0">No</option>
       </select>
         @error('in_stock')
       <div class="invalid-feedback">
         {{ $message }}
       </div>
       @enderror
    </div>
    <!-- description -->
    <div class="mb-3">
       <label for="" class="form-label">Description</label>
       <textarea name="description"
        class="form-control  @error('description') is-invalid @enderror" 
        id="description" >{{old('description',$item->description)}}</textarea>
       @error('description')
       <div class="invalid-feedback">
         {{ $message }}
       </div>
       @enderror
    </div>
    <!-- category -->
    <div class="mb-3">
       <label for="" class="form-label">Category</label>
       <select name="category_id" id="category_id" class="form-select  @error('category_id') is-invalid @enderror" >
         <option value="">Choose Category</option>
         @foreach ($categories as $category)
            <option value="{{$category->id}}"
             {{ old('category_id', $item->category_id)== $category->id ? 'selected' : '' }}>
              {{$category->name}}</option>
        @endforeach
       </select>
         @error('category_id')
       <div class="invalid-feedback">
         {{ $message }}
       </div>
       @enderror
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-primary px-4"> Update Item</button>
    </div>
   </form>
  </div>
 </div>
</div>
@endsection