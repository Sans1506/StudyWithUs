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
<div class="card">
{{-- <div class="pb-5">
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
</div> --}}
    <div class="p-0 col-12 col-md-12 col-lg-12">
        <div class="table-responsive">
            <table class="table table-striped mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Code Barang</th>
                    <th>Price</th>
                    <th>Image_URI</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $datas)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$datas->title}}</td>
                    <td>{{$datas->code_barang}}</td>
                    <td>{{$datas->price}}</td>
                    <td><img src="{{$datas->image_uri}}" alt="{{$datas->image_uri}}"></td>
                    <td>
                        <a href="/products/{{$datas->code_barang}}" class="btn btn-success btn-action mr-1" data-toggle="tooltip" title="Show"><i class="fas fa-eye"></i></a>
                        <a href="/products/{{$datas->code_barang}}/edit" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                        <form action="/products/{{$datas->code_barang}}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" onclick="return confirm('Anda yakin ingin menghapus??')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
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
<h5>data tidak ditemukan</h5><a href="/dashboard">Kembali</a>
@endif
{{-- 
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
</script> --}}
@endsection