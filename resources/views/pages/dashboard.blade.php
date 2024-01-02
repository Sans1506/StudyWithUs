@extends('layouts.main')

@section('section-header')
<h1>Product</h1>
@endsection
@section('section-body')
@if (session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
{{session('status')}}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
@endif
@if (session('alert'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
{{session('alert')}}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
@endif
@if (session('berhasil'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
{{session('berhasil')}}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
@endif

@if (isset($data))
<div class="row">
<div class="pb-5">
<form class="form-inline" method="GET" action="/urutkan">
    {{ csrf_field() }}
    <div class="row">
        <h5 class="mt-2 ml-3">urutkan berdasarkan :</h5>
        <select onchange="sortByCheck(this);" class="form-control form-select ml-3" type="" name="orderBy">>
            <option value="lokasi">Lokasi</option>
            <option value="suhu">Suhu</option>
            <option value="tanggal">Tanggal</option>
            <option value="jam">Jam</option>
        </select>
        <select onchange="sortByCheck(this);" class="form-control form-select mx-3" type="" name="sortBy">
            <option value="asc" id="sortByAsc">A - Z</option>
            <option value="desc" id="sortyByDesc">Z - A</option>
        </select>
        <button type="submit" class="btn btn-dark mx-3" id="btnSortBy">
            Cari<i class="fas fa-search pl-2"></i>
        </button>
    </div>
</form>
</div>
<div class="col-12 col-md-12 col-lg-12">
    <div class="card">
        <table class="table">
        <thead>
            @php
                $no=1
            @endphp
            <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">SKU</th>
            <th scope="col">Price</th>
            <th scope="col">desc</th>
            <th scope="col">Image_URI</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $studywithus)                  
            <tr>
            <th scope="row">{{$no++}}</th>
            <td>{{$studywithus->title}}</td>
            <td>{{$studywithus->SKU}}</td>
            <td>{{$studywithus->price}}</td>
            <td>{{$studywithus->desc}}</td>
            <td>{{$studywithus->image_uri}}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
        <div class="d-flex justify-content-center">
        {{ $data->links() }}
        </div>
    </div>
</div>
</div>
@elseif (!isset($data))
<h5>data tidak ditemukan</h5> <a href="/dashboard">Kembali</a>
@endif

<script>
let alertPerjalanan = document.getElementById('alertCreatePerjalanan')

let btnSortBy = document.getElementById('btnSortBy');

let sortByAsc = document.getElementById('sortByAsc');
let sortByDesc = document.getElementById('sortyByDesc');

function sortByCheck(that) {
    let value = that.value;

    if(value === "suhu"){
        sortByAsc.innerHTML = "Terkecil";
        sortByDesc.innerHTML = "Terbesar";
    } else if(value === "tanggal"){
        sortByAsc.innerHTML = "Terlama";
        sortByDesc.innerHTML = "Terbaru";
    } else if(value === "jam"){
        sortByAsc.innerHTML = "Terbaru";
        sortByDesc.innerHTML = "Terlama";
    } else if(value === "lokasi") {
        sortByAsc.innerHTML = "A - Z";
        sortByDesc.innerHTML = "Z - A";
    }
}
</script>
@endsection