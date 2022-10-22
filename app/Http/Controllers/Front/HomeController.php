<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\HomeAdvertisement;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $home_ad_data = HomeAdvertisement::where('id', 1)->first();
        return view('front-end.home', compact('home_ad_data'));
    }
}
