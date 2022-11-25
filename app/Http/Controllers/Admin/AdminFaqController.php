<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminFaqController extends Controller
{
    public function show()
    {
        $faqs = Faq::latest()->get();
        return view('back-end.admin.faq.faq-show', compact('faqs'));
    }

    public function create()
    {
        return view('back-end.admin.faq.faq-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'faq_title' => 'required',
            'faq_detail' => 'required',
        ]);

        $faq = new Faq();
        $faq->faq_title = $request->faq_title;
        $faq->faq_detail = $request->faq_detail;
        $faq->save();

        return redirect()->back()->with('success', 'Data is created successfully.');
    }

    public function edit($id)
    {
        $faq = Faq::find($id);
        return view('back-end.admin.faq.faq-edit', compact('faq'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'faq_title' => 'required',
            'faq_detail' => 'required',
        ]);

        $faq = Faq::find($id);

        $faq->faq_title = $request->faq_title;
        $faq->faq_detail = $request->faq_detail;
        $faq->save();

        return redirect()->route('admin_faq_show')->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        $faq = Faq::find($id);
        $faq->delete();

        return redirect()->back()->with('success', 'Data is deleted successfully.');
    }


}
