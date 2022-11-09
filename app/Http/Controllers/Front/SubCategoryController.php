<?php

namespace App\Http\Controllers\Front;

use App\Models\Post;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{
    public function index($id)
    {
        $sub_category_data = SubCategory::where('id', $id)->first();
        $post_data = Post::where('sub_category_id', $id)->orderBy('id', 'desc')->paginate(4);
        return view('front-end.news-category', compact('sub_category_data', 'post_data'));
    }
}
