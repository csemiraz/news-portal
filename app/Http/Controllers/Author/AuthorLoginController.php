<?php

namespace App\Http\Controllers\Author;

use App\Models\Page;
use App\Models\Author;
use App\Mail\WebsiteMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function forget_password()
    {
        return view('front-end.pages.author-forget-password');
    }

    public function forget_password_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
        
        $author_data = Author::where('email', $request->email)->first();
        if(!$author_data) {
            return redirect()->back()->with('error', 'Email address not found!');
        }

        $token = hash('sha256', time());

        $author_data->token = $token;
        $author_data->update();

        $reset_link = url('author/reset-password/'.$token.'/'.$request->email);
        $subject = 'Password reset';
        $message = 'Please click the following link: <br />';
        $message .= '<a href="'.$reset_link.'">Click here</a>';

        \Mail::to($request->email)->send(new WebsiteMail($subject, $message));

        return redirect()->route('author_login')->with('success', 'Please check your email and follow the steps');
    }

    public function reset_password($token, $email)
    {
        $author_data = Author::where('token', $token)->where('email', $email)->first();
        if(!$author_data) {
            return redirect()->route('author_login');
        }
        return view('front-end.pages.author-reset-password', compact('token', 'email'));
    }

    public function reset_password_submit(Request $request)
    {
    $request->validate([
        'password' => 'required',
        'retype_password' => 'required|same:password'
    ]);

    $author_data = Author::where('token', $request->token)->where('email', $request->email)->first();

    $author_data->password = Hash::make($request->password);
    $author_data->token = '';
    $author_data->update();

    return redirect()->route('author_login')->with('success', 'Password is reset successfully');
    
    }


    public function logout()
    {
        Auth::guard('author')->logout();
        return redirect()->route('author_login');
    }


}