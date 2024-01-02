@extends('layouts.main')

@section('section-header')
    <h1>Input Product</h1>
@endsection

@section('section-body')
<div class="container mt-5">
        <form action="/product" method="POST" class="need-validation">
            @csrf
            <div class="form-floating">
                <input type="text" class="form-control" name="title" id="title" required autofocus placeholder="Title">
                <label for="title">Title</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="sku" id="sku" required placeholder="SKU">
                <label for="sku">SKU</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="price" id="price" required placeholder="Price">
                <label for="price">Price</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="desc" id="desc" required placeholder="Description">
                <label for="desc">Description</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="image_uri" id="image_uri" required placeholder="Image_URI">
                <label for="image_uri">Image_URI</label>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Create</button>
            </div>
        </form>
</div>
@endsection