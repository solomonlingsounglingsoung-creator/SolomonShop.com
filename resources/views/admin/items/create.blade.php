@extends('layouts.admin')
@section('content')
<div class="container">
 <div class="card shadow mb-4">
  <div class="card-header">
   <h4>Create Item</h4>
  </div>
  <div class="card-body">
    <form action="{{route('backend.items.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
       <label for="" class="form-label">Code No</label>
       <input type="text" name="code_no" class="form-control @error('code_no') is-invalid @enderror" placeholder="IT-001" value="{{old('code_no')}}">
      @error('code_no')
       <div class="invalid-feedback">{{$message}}</div>
      @enderror
      </div>
    <!-- Item Name -->
    <div class="mb-3">
       <label for="" class="form-label">Item Name</label>
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
    <!-- price -->
     <div class="mb-3">
       <label for="" class="form-label">Price</label>
       <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"  value="{{old('price')}}">
       @error('price')
       <div class="invalid-feedback">{{$message}}</div>
      @enderror
    </div>
    <!-- discount -->
     <div class="mb-3">
       <label for="" class="form-label">Discount</label>
       <input type="number" name="discount" class="form-control @error('discount') is-invalid @enderror" value="{{old('discount')}}">
        @error('discount')
       <div class="invalid-feedback">{{$message}}</div>
      @enderror
    </div>
    <!-- in stock -->
     <div class="mb-3">
       <label for="in_stock" class="form-label">In Stock</label>
       <select name="in_stock" id="in_stock" class="form-select @error('in_stock') is-invalid @enderror" value="{{old('in_stock')}}">
        <option value="1" selected>Yes</option>
        <option value="0">No</option>
       </select>
    </div>
    <!-- description -->
    <div class="mb-3">
       <label for="description" class="form-label">Description</label>
       <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description">{{old('description')}}</textarea>
        @error('description')
       <div class="invalid-feedback">{{$message}}</div>
      @enderror
    </div>
    <!-- category -->
    <div class="mb-3">
       <label for="" class="form-label">Category</label>
       <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror">
         <option value="">Choose Category</option>
         @foreach($categories as $category)
         <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected':''}}>{{$category->name}}</option>
         @endforeach
       </select>
        @error('category_id')
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