<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthorHomeController extends Controller
{
    public function index()
    {
        return view('back-end.author.home');
    }
}
