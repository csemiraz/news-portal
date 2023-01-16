<?php

namespace App\Http\Controllers\Author;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthorLoginController extends Controller
{
    public function index()
    {
        $page = Page::where('id', 1)->first();
        return view('front-end.pages.author-login', compact('page'));
    }

    public function login_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::guard('author')->attempt($credentials)) {
            return redirect()->route('author_home');
        } else {
            return redirect()->route('author_login')->with('error', 'Email and password not match!');
        }
    }

    public function logout()
    {
        Auth::guard('author')->logout();
        return redirect()->route('author_login');
    }


}