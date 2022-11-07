<?php

namespace App\Http\Controllers\Front;

use App\Models\Post;
use App\Models\Setting;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\HomeAdvertisement;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $home_ad_data = HomeAdvertisement::where('id', 1)->first();
        $setting_data = Setting::where('id', 1)->first();
        $post_data = Post::orderBy('id', 'desc')->get();
        $sub_category_data = SubCategory::orderBy('subcategory_order', 'asc')->where('show_on_home', 'Show')->get();
        return view('front-end.home', compact('home_ad_data','setting_data','post_data','sub_category_data'));
    }
}
