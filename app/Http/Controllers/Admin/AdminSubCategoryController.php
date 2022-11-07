<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminSubCategoryController extends Controller
{
    public function show()
    {
        $sub_categories = SubCategory::orderBy('subcategory_order', 'asc')->get();
        return view('back-end.admin.category.sub-category-show', compact('sub_categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('category_order', 'asc')->get();
        return view('back-end.admin.category.sub-category-create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subcategory_name' => 'required',
            'subcategory_order' => 'required',
        ]);

        $sub_category = new SubCategory();

        $sub_category->subcategory_name = $request->subcategory_name;
        $sub_category->category_id = $request->category_id;
        $sub_category->subcategory_order = $request->subcategory_order;
        $sub_category->subcategory_status = $request->subcategory_status;
        $sub_category->show_on_home = $request->show_on_home;
        $sub_category->save();

        return redirect()->back()->with('success', 'Sub Category info saved successfully.');
    }
    
    public function edit($id)
    {
        $categories = Category::orderBy('category_order', 'asc')->get();
        $sub_category = SubCategory::find($id);
        return view('back-end.admin.category.sub-category-edit', compact('categories', 'sub_category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'subcategory_name' => 'required',
            'subcategory_order' => 'required',
        ]);

        $sub_category = SubCategory::find($id);
        $sub_category->subcategory_name = $request->subcategory_name;
        $sub_category->category_id = $request->category_id;
        $sub_category->subcategory_order = $request->subcategory_order;
        $sub_category->subcategory_status = $request->subcategory_status;
        $sub_category->show_on_home = $request->show_on_home;
        $sub_category->update();

        return redirect()->route('admin_sub_category_show')->with('success', 'Sub Category info updated successfully');
    }

    public function delete($id)
    {
        $sub_category = SubCategory::find($id);
        $sub_category->delete();

        return redirect()->back()->with('success', 'Sub Category info deleted successfully');
    }



}
