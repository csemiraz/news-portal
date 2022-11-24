<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPageController extends Controller
{
    public function about()
    {
        $page = Page::where('id', 1)->first();
        return view('back-end.admin.pages.about', compact('page'));
    }

    public function about_update(Request $request)
    {
        $page = Page::where('id', 1)->first();
        $request->validate([
            'about_title' => 'required',
            'about_detail' => 'required',
        ]);

        $page->about_title = $request->about_title;
        $page->about_detail = $request->about_detail;
        $page->about_status = $request->about_status;
        $page->update();

        return redirect()->back()->with('success', 'Data is updated successfully.');
    }

    public function faq()
    {
        $page = Page::where('id', 1)->first();
        return view('back-end.admin.pages.faq', compact('page'));
    }

    public function faq_update(Request $request)
    {
        $page = Page::where('id', 1)->first();
        $request->validate([
            'faq_title' => 'required',
            //'faq_detail' => 'required',
        ]);

        $page->faq_title = $request->faq_title;
        $page->faq_detail = $request->faq_detail;
        $page->faq_status = $request->faq_status;
        $page->update();

        return redirect()->back()->with('success', 'Data is updated successfully.');
    }

    public function terms()
    {
        $page = Page::where('id', 1)->first();
        return view('back-end.admin.pages.terms', compact('page'));
    }

    public function terms_update(Request $request)
    {
        $page = Page::where('id', 1)->first();
        $request->validate([
            'terms_title' => 'required',
            'terms_detail' => 'required',
        ]);

        $page->terms_title = $request->terms_title;
        $page->terms_detail = $request->terms_detail;
        $page->terms_status = $request->terms_status;
        $page->update();

        return redirect()->back()->with('success', 'Data is updated successfully.');
    }

    public function privacy()
    {
        $page = Page::where('id', 1)->first();
        return view('back-end.admin.pages.privacy', compact('page'));
    }

    public function privacy_update(Request $request)
    {
        $page = Page::where('id', 1)->first();
        $request->validate([
            'privacy_title' => 'required',
            'privacy_detail' => 'required',
        ]);

        $page->privacy_title = $request->privacy_title;
        $page->privacy_detail = $request->privacy_detail;
        $page->privacy_status = $request->privacy_status;
        $page->update();

        return redirect()->back()->with('success', 'Data is updated successfully.');
    }

    public function disclaimer()
    {
        $page = Page::where('id', 1)->first();
        return view('back-end.admin.pages.disclaimer', compact('page'));
    }

    public function disclaimer_update(Request $request)
    {
        $page = Page::where('id', 1)->first();
        $request->validate([
            'disclaimer_title' => 'required',
            'disclaimer_detail' => 'required',
        ]);

        $page->disclaimer_title = $request->disclaimer_title;
        $page->disclaimer_detail = $request->disclaimer_detail;
        $page->disclaimer_status = $request->disclaimer_status;
        $page->update();

        return redirect()->back()->with('success', 'Data is updated successfully.');
    }

    public function login()
    {
        $page = Page::where('id', 1)->first();
        return view('back-end.admin.pages.login', compact('page'));
    }

    public function login_update(Request $request)
    {
        $page = Page::where('id', 1)->first();
        $request->validate([
            'login_title' => 'required',
        ]);

        $page->login_title = $request->login_title;
        $page->login_status = $request->login_status;
        $page->update();

        return redirect()->back()->with('success', 'Data is updated successfully.');
    }

    public function contact()
    {
        $page = Page::where('id', 1)->first();
        return view('back-end.admin.pages.contact', compact('page'));
    }

    public function contact_update(Request $request)
    {
        $page = Page::where('id', 1)->first();
        $request->validate([
            'contact_title' => 'required',
            'contact_map' => 'required',
        ]);

        $page->contact_title = $request->contact_title;
        $page->contact_detail = $request->contact_detail;
        $page->contact_map = $request->contact_map;
        $page->contact_status = $request->contact_status;
        $page->update();

        return redirect()->back()->with('success', 'Data is updated successfully.');
    }




}
