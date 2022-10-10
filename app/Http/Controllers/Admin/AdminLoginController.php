<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function index() {
        return view('back-end.admin.login');
    }

    public function forget_password() {
        return view('back-end.admin.forget_password');
    }
}
