@extends('layouts.main')

@section('section-header')
<h1 class="mb-1">Edit Data Produk</h1>
@endsection
@section('section-body')
    <form action="{{route('products.update', $product->code_barang) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="title" value="{{$product->title}}"  class="form-control">
            </div>
            <div class="col">
                <input type="text" name="code_barang" value="{{$product->code_barang}}"  class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="price" value="{{$product->price}}"  class="form-control">
            </div>
            <div class="col">
                <textarea type="text" name="desc" class="form-control">{{$product->desc}}</textarea>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="">Upload Image</label>
                <input type="file" name="image_uri" id="inputImage" value="{{$product->image_uri}}" class="form-control @error('image_uri') is-invalid @enderror">
                @error('image_uri')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>

@endsection