<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product(){
        return view('pages.product');
    }

    public function create(Request $request){
        
        $request->validate([
            'title' =>'required',
            'sku'=>'required',
            'price'=>'required',
            'desc'=>'required',
            'image_uri'=>'required',

        ]);
        $data=[
            'id_user'=>auth()->user()->id,
            'title'=>$request->title,
            'sku'=>$request->sku,
            'price'=>$request->price,
            'desc'=>$request->desc,
            'image_uri'=>$request->image_uri
        ];

        // dd($data);
        Product::create($data);
        return redirect('/dashboard')->with('status','Simpan data berhasil!!!');
    }
}
