<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function create(Request $request){
        $data = $request->validate([
            'nama' => 'required|min:4|max:255',
            'email' => 'required|email:dns|unique:users,email',
            'password' => 'required|min:6'
        ]);
        // $data['password'] =bcrypt($data['password']);
        // dd($data);
        User::create($data);
        return redirect('/login')->with("status","Registrasi berhasil");
    }
}
