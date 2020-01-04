<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function add()
    {

    }

    public  function handleAdd(){

    }

    public function logIn(){

        return view('admin.auth.login');
    }

    public function handleLogIn(Request $request)
    {
       $admin_credential = $request->only('email','password');
       if (Auth::guard('admins')->attempt($admin_credential))
       {
           return redirect()->route('Admin.Home');
       }

       return back()->with('login_error','');

    }

}
