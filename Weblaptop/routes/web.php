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







//route đăng nhập admin
Route::get('/admincp/login','App\Http\Controllers\AdminLoginController@login')->name('admincp.login');
//route đăng nhập admin
Route::get('/admincp/logout','App\Http\Controllers\AdminLoginController@logout')->name('admincp.logout');
//route check tk mk admin
Route::post('/admincp','App\Http\Controllers\AdminLoginController@loginPost')->name('admincp');
//trang chủ trang adminn
Route::get('/admincp/home','App\Http\Controllers\AdminLoginController@home')->name('admincp.home');
//route quản lý danh mục
Route::resource('/admincp/danhmuc', DanhmucsanphamController::class);
//route quản lý sản phẩm
Route::resource('/admincp/sanpham', SanphamController::class);

Auth::routes();

<<<<<<< HEAD
//trang chủ trang người dùng
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
=======
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
>>>>>>> 4d01cf9906e602af663c13332ad335a6f94bd0af
