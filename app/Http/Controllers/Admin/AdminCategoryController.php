<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminCategoryController extends Controller
{
    public function show()
    {
        $categories = Category::orderBy('category_order', 'asc')->get();
        return view('back-end.admin.category.category-show', compact('categories'));
    }

    public function create()
    {
        return view('back-end.admin.category.category-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'category_order' => 'required|numeric',
        ]);

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->category_order = $request->category_order;
        $category->category_status = $request->category_status;
        $category->save();

        return redirect()->back()->with('success', 'Category info saved successfully');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('back-end.admin.category.category-edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $category->category_name = $request->category_name;
        $category->category_order = $request->category_order;
        $category->category_status = $request->category_status;
        $category->update();

        return redirect()->route('admin_category_show')->with('success', 'Category info updated successfully.');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->back()->with('success', 'Category info deleted successfully.');
    }


}
