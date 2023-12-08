<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Author;
use App\Models\Category;
use App\Models\Subscriber;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminHomeController extends Controller
{
    public function index() {
        $total_posts = Post::get()->count();
        $total_categories = Category::get()->count();
        $total_subcategories = SubCategory::get()->count();
        $total_authors = Author::get()->count();
        $total_subscribers = Subscriber::get()->count();
        $new_subscribers_today = Subscriber::whereDate('created_at', Carbon::today())->count();
        $recent_news = Post::orderBy('id', 'desc')->where('admin_id', Auth::guard('admin')->user()->id)->take(10)->get();
        return view('back-end.admin.home', compact('total_posts', 'total_categories', 'total_subcategories', 'total_authors', 'total_subscribers', 'new_subscribers_today', 'recent_news'));
    }
}
