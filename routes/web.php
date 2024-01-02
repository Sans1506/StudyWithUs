<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

route::get('/logout', [LoginController::class, 'logout']);
route::group(['middleware' => 'guest'], function(){
    route::get('/', [LoginController::class, 'login'])->name('login');
    route::post('/login', [LoginController::class, 'authenticate']);
    route::get('/login', [LoginController::class, 'login']);
    route::get('/register', [RegisterController::class, 'index']);
    route::post('/register', [RegisterController::class, 'create']);
});

route::group(['middleware' => 'auth'], function(){
    route::get('/profile', [DashboardController::class, 'profile']);
    route::get('/product', [ProductController::class, 'product']);
    route::get('/dashboard', [DashboardController::class, 'index']);
    route::post('/product', [ProductController::class, 'create']);
});