<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard(){
        return view('pages.dashboard');
    }

    public function index(){
        // $data = Inputdata::orderBy('created_at', 'DESC')->get();
        $data = DB::table('products')
            ->join('users', 'users.id', '=', 'products.id_user')
            ->select('products.title','products.SKU','products.price','products.desc','products.image_uri')
            ->where('users.nama','=',auth()->user()->nama)
            ->paginate(5);

        return view ('pages.dashboard',['data'=>$data]);
        // return view ('pages.dashboard',compact('data'));
    }

    public function profile(){
        return view('pages.profile');
    }
}
