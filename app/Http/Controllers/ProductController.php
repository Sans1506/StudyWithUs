<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('products')
            ->join('users', 'users.id', '=', 'products.id_user')
            ->select('products.title','products.code_barang','products.price','products.desc','products.image_uri')
            ->where('users.nama','=',auth()->user()->nama)
            ->paginate(5);

        return view ('products.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('products.product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' =>'required|max:255',
            'code_barang'=>'required|unique:products',
            'price'=>'required|integer',
            'desc'=>'required',
            'image_uri'=>'required|image|mimes:jpg,png,jpeg,svg,gif|max:2048'
        ]);
        $imageName = time().'.'.$request->image_uri->extension();
        $imagePath = 'images/'.$imageName;
        $request->image_uri->move(public_path('images'), $imageName);

        $data=[
            'id_user'=>auth()->user()->id,
            'title'=>$request->title,
            'code_barang'=>$request->code_barang,
            'price'=>$request->price,
            'desc'=>$request->desc,
            'image_uri'=>$imagePath
        ];

        // dd($data);
        Product::create($data);
        return redirect('products')->with('status','Simpan data berhasil!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show($code_barang)
    {
        // Ambil data produk dari basis data berdasarkan $code_barang
        $product = Product::where('code_barang', $code_barang)->first();

        // Jika produk tidak ditemukan, mungkin hendaknya Anda menangani kasus ini dengan memberikan respon 404 atau yang lainnya.
        if (!$product) {
            abort(404, 'Produk tidak ditemukan');
        }

        // Kirim data produk ke halaman edit
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($code_barang)
    {
        // Ambil data produk dari basis data berdasarkan $code_barang
        $product = Product::where('code_barang', $code_barang)->first();

        // Jika produk tidak ditemukan, mungkin hendaknya Anda menangani kasus ini dengan memberikan respon 404 atau yang lainnya.
        if (!$product) {
            abort(404, 'Produk tidak ditemukan');
        }

        // Kirim data produk ke halaman edit
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $code_barang)
    {
        $request->validate([
            'title' =>'required|max:255',
            'code_barang'=>'required',
            'price'=>'required|integer',
            'desc'=>'required',
            'image_uri'=>'required|image|mimes:jpg,png,jpeg,svg,gif|max:2048'
        ]);
        $imageName = time().'.'.$request->image_uri->extension();
        $imagePath = 'images/'.$imageName;
        $request->image_uri->move(public_path('images'), $imageName);

        $data=[
            'id_user'=>auth()->user()->id,
            'title'=>$request->title,
            'code_barang'=>$request->code_barang,
            'price'=>$request->price,
            'desc'=>$request->desc,
            'image_uri'=>$imagePath
        ];

        // dd($data);
        Product::where('code_barang', $code_barang)->update($data);
        return redirect('products')->with('status','Update data berhasil!!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($code_barang)
    {
        // Ambil data produk dari basis data berdasarkan $code_barang
        $product = Product::where('code_barang', $code_barang)->delete();

        // Jika produk tidak ditemukan, mungkin hendaknya Anda menangani kasus ini dengan memberikan respon 404 atau yang lainnya.
        if (!$product) {
            abort(404, 'Produk tidak ditemukan');
        }

        return redirect('/products')->with('status','Hapus data berhasil!!!', compact('product') );
    }
}
