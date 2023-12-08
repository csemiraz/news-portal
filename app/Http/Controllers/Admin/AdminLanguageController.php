<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminLanguageController extends Controller
{
    public function show()
    {
        $languages = Language::get();
        return view('back-end.admin.language.language-show', compact('languages'));
    }

    public function create()
    {
        return view('back-end.admin.language.language-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'short_name' => 'required|unique:languages',
        ]);

        if($request->is_default == 'Yes')
        {
            DB::table('languages')->where('is_default', 'Yes')->update(['is_default'=>'No']);
        }

        $language = new Language();
        $language->name = $request->name;
        $language->short_name = $request->short_name;
        $language->is_default = $request->is_default;
        $language->save();

        return redirect()->back()->with('success', 'Data is created successfully.');
    }

    public function edit($id)
    {
        $language = Language::find($id);
        return view('back-end.admin.language.language-edit', compact('language'));
    }

    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required',
            'short_name' => 'required',
        ]);

        if($request->is_default == 'Yes')
        {
            DB::table('languages')->where('is_default', 'Yes')->update(['is_default'=>'No']);
        }

        $language = Language::find($id);
        $language->name = $request->name;
        $language->short_name = $request->short_name;
        $language->is_default = $request->is_default;
        $language->update();

        return redirect()->route('admin_language_show')->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        $language = Language::find($id);
        
        if($language->is_default == 'Yes')
        {
            DB::table('languages')->where('id', 1)->update(['is_default'=>'Yes']);
        }

        $language->delete();

        return redirect()->back()->with('success', 'Data is deleted successfully.');
    }


}
