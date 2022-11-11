<?php

namespace App\Http\Controllers\Front;

use App\Models\PhotoGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotoGalleryController extends Controller
{
    public function index()
    {
        $photo_galleries = PhotoGallery::latest()->paginate(8);
        return view('front-end.photo-gallery', compact('photo_galleries'));
    }
}
