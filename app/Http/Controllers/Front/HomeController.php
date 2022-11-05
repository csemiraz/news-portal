<?php

namespace App\Http\Controllers\Front;

use App\Models\Post;
use App\Models\Setting;
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
        return view('front-end.home', compact('home_ad_data','setting_data','post_data'));
    }
}
