@extends('layouts.main')

@section('section-header')
<h1>Lihat Data Product</h1>
@endsection
@section('section-body')
        <div class="row mb-3">
            <div class="col">
            <label for=""> title</label>
                <input readonly type="text" name="title" value="{{$product->title}}" class="form-control">
            </div>
            <div class="col">
            <label for="code_barang"> code_barang</label>
                <input readonly type="text" name="code_barang" value="{{$product->code_barang}}" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
            <label for=""> price</label>
                <input readonly type="text" name="price" value="{{$product->price}}" class="form-control">
            </div>
            <div class="col">
            <label for="desc">description</label>
                <textarea readonly type="text" name="desc" id="desc" class="form-control">{{$product->desc}}</textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
            <label for=""> created_at</label>
                <input readonly type="text" name="price" value="{{$product->created_at}}" class="form-control">
            </div>
            <div class="col">
                <label for=""> Updated_at</label>
                <input readonly type="text" name="desc" value="{{$product->updated_at}}" class="form-control">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for=""> Image</label>
                <img src="{{ asset($product->image_uri) }}" style="width:150px, height:150px" alt="{{$product->image_uri}}" srcset="">
            </div>
        </div>
    
    

@endsection
