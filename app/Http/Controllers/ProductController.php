<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('pages.product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' =>'required|max:255',
            'sku'=>'required',
            'price'=>'required',
            'desc'=>'required',
            'image_uri'=>'required|image|file|mimes:jpeg,jpg,png,gif,svg|max:2048'
        ]);
        $imageName = time().'.'.$request->image->extension();
        $imagePath = 'images/'.$imageName;
        $request->image->move(public_path('images'), $imageName);
        $data=[
            'id_user'=>auth()->user()->id,
            'title'=>$request->title,
            'sku'=>$request->sku,
            'price'=>$request->price,
            'desc'=>$request->desc,
            'image_uri'=>$imagePath
        ];

        dd($data);
        // Product::create($data);
        // return redirect('/dashboard')->with('status','Simpan data berhasil!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('pages.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('pages.show');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect('/dashboard')->with('status','Update data berhasil!!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/dashboard')->with('status','Hapus data berhasil!!!');
    }
}
