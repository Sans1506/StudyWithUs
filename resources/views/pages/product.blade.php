@extends('layouts.main')

@section('section-header')
    <h1>Input Product</h1>
@endsection

@section('section-body')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Create Your Product</h4>
            </div>
            <div class="card-body">
                <form action="/products" method="POST">
                    @csrf           
                    <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="title">Title</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" required value="{{ old('title') }}" autofocus>
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    </div>
                    <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="sku">SKU</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control @error('sku') is-invalid @enderror" name="sku" id="sku" required value="{{ old('sku') }}">
                        @error('sku')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    </div>
                    <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="price">Price</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="price" required value="{{ old('price') }}">
                        @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    </div>
                    <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="desc">Description</label>
                    <div class="col-sm-12 col-md-7">
                        <textarea class="summernote-simple" name="desc" id="desc">{{ old('desc') }}</textarea>
                    </div>
                    </div>
                    <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image_URI</label>
                    <div class="col-sm-12 col-md-7">
                        <div id="image-preview" class="image-preview">
                        <label for="image-upload" id="image-label">Choose File</label>
                        <input type="file" name="image_uri" id="image-upload" />
                        </div>
                    </div>
                    </div>
                    <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary">Create Product</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection