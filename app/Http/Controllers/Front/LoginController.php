<?php

namespace App\Http\Controllers\Front;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
        $page = Page::where('id', 1)->first();
        return view('front-end.pages.login', compact('page'));
    }
}
