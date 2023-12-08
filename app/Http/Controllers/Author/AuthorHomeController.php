<?php

namespace App\Http\Controllers\Author;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthorHomeController extends Controller
{
    public function index()
    {
        $total_news = Post::where('author_id', Auth::guard('author')->user()->id)->get()->count();
        $recent_news = Post::orderBy('id', 'desc')->where('author_id', Auth::guard('author')->user()->id)->take(10)->get();
        return view('back-end.author.home', compact('recent_news', 'total_news'));
    }
}
