<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
}
