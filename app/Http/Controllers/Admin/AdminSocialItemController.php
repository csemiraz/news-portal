<?php

namespace App\Http\Controllers\Admin;

use App\Models\SocialItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminSocialItemController extends Controller
{
    public function show()
    {
        $social_item_data = SocialItem::orderBy('id', 'desc')->get();
        return view('back-end.admin.social-item.social-show', compact('social_item_data'));
    }

    public function create()
    {
        return view('back-end.admin.social-item.social-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required',
            'url' => 'required',
        ]);

        $social_item = new SocialItem();
        $social_item->icon = $request->icon;
        $social_item->url = $request->url;
        $social_item->save();

        return redirect()->back()->with('success', 'Data info saved successfully');
    }

    public function edit($id)
    {
        $social_item = socialItem::find($id);
        return view('back-end.admin.social-item.social-edit', compact('social_item'));
    }

    public function update(Request $request, $id)
    {
        $social_item = SocialItem::find($id);

        $social_item->icon = $request->icon;
        $social_item->url = $request->url;
        $social_item->update();

        return redirect()->route('admin_social_show')->with('success', 'Data info updated successfully.');
    }

    public function delete($id)
    {
        $social_item = SocialItem::find($id);
        $social_item->delete();

        return redirect()->back()->with('success', 'Data info deleted successfully.');
    }


}
