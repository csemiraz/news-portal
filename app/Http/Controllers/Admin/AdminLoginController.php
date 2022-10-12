<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    public function index() {
        //$pass = Hash::make('1234'); //manually hash password created 
        return view('back-end.admin.login');
    }

    public function forget_password() {
        return view('back-end.admin.forget_password');
    }

    public function login_submit(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin_home');
        }
        else {
            return redirect()->route('admin_login')->with('message', 'Email and password not match!');
        }
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login');
    }


}
