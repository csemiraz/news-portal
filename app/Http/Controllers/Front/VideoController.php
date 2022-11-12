<?php

namespace App\Http\Controllers\Front;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::latest()->paginate(8);
        return view('front-end.video-gallery', compact('videos'));
    }
}
