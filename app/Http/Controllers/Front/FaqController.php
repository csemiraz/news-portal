<?php

namespace App\Http\Controllers\Front;

use App\Models\Faq;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    public function index()
    {
        $page = Page::where('id', 1)->first();
        $faq_data = Faq::latest()->get();
        return view('front-end.pages.faq', compact('page', 'faq_data'));
    }

}
