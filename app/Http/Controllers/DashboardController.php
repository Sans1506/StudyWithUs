<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $data = DB::table('products')
            ->join('users', 'users.id', '=', 'products.id_user')
            ->select('products.title','products.SKU','products.price','products.desc','products.image_uri')
            ->where('users.nama','=',auth()->user()->nama)
            ->paginate(5);

        return view ('pages.dashboard',['data'=>$data]);
    }

    public function profile(){
        return view('pages.profile');
    }
}
