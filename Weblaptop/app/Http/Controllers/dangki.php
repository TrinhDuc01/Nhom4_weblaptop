<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class dangki extends Controller
{
    public function index(){
        
        return view('dangki');
    }
    public function kiemtra(Request $rq){
        $data = $rq->validate([
            'name'=>'required|max:255',
            'email'=>'required|max:255|unique:users',
            'password'=>'required|min:8',
            'diachi'=>'required',
            'sodienthoai'=>'required',
            'password_confirmation'=>'required|min:8|same:password',
        ],
        [
            'name.required'=>'Không được để trống Họ tên',
            'email.required'=>'Không được để trống Email',
            'password.required'=>'Không được để trống Mật khẩu',
            'password_confirmation.required'=>'Không được để trống Mật khẩu',
            'diachi'=>'Không được để trống Địa chỉ',
            'sodienthoai'=>'Không được để trống Số điện thoại',
        ]);
        $user = new User();
        $user->name = $data['name'];
        $user->email= $data['email'];
        $user->password = Hash::make($data['password']);
        $user->diachi = $data['diachi'];
        $user->dienthoai = $data['sodienthoai'];
        $user->save();
        return redirect()->back()->with('status','Đăng kí thành công');
    }
}   
