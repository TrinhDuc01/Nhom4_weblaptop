<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SanphamController;
use App\Http\Controllers\DanhmucsanphamController;
use App\Http\Controllers\dangki;
use App\Http\Controllers\dangnhap;
use App\Http\Controllers\GioHang;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('trangchu');
});

Auth::routes();

// Đăng nhập khách hàng
Route::get('/dangnhap',[dangnhap::class,'getForm']);
Route::post('/dangnhap',[dangnhap::class,'login'])->name('dangnhap');
// Đăng kí
Route::get('/dangki','App\Http\Controllers\dangki@index')->name('dangki');
Route::post('/dangki','App\Http\Controllers\dangki@kiemtra');


// Giỏ hàng
Route::resource('/giohang', GioHang::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/admin/danhmuc', DanhmucsanphamController::class);
Route::resource('/admin/sanpham', SanphamController::class);