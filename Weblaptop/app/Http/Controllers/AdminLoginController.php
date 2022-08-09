<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminLoginController extends Controller
{   
    public function login(){
        //Session admin check
        $admin_account  = Session()->get('admin_name');
        if($admin_account){
            return view('admincp.home');
        }
        else{
            return view('admincp.loginadmin');
        }
    }

    public function loginPost(Request $request){
        $credentials = $request -> only('account','password');
        if(Auth::guard('admins')->attempt($credentials)){
            Session()->put('admin_name',$request->account);
            return view('admincp.home');
        }
        else 
        return view('admincp.loginadmin');
    }

    public function home(){
        //Session admin check
        $admin_account  = Session()->get('admin_name');
        if($admin_account){
            return view('admincp.home');
        }
        else{
            return view('admincp.loginadmin');
        }
    }

    public function logout(){
        Session()->put('admin_name',null);

        //Session admin check
        $admin_account  = Session()->get('admin_name');
        if($admin_account){
            return view('admincp.home');
        }
        else{
            return view('admincp.loginadmin');
        }

        return view('admincp.loginadmin');
    }
}
