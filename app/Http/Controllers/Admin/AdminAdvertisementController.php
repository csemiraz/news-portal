<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\TopAdvertisement;
use App\Models\HomeAdvertisement;
use App\Http\Controllers\Controller;
use App\Models\SidebarAdvertisement;

class AdminAdvertisementController extends Controller
{
    public function home_ad_show()
    {
        $home_ad_data = HomeAdvertisement::where('id', 1)->first();
        return view('back-end.admin.advertisement.advertisement-home-show', compact('home_ad_data'));
    }

    public function home_ad_update(Request $request)
    {
        $home_ad_data = HomeAdvertisement::where('id', 1)->first();
        
        if($request->hasFile('above_search_ad')) {
            $request->validate([
                'above_search_ad' => 'image|mimes:png,jpg,jpeg,gif',
            ]);

            if(file_exists('assets/front-end/uploads/'.$home_ad_data->above_search_ad)) {
                unlink(public_path('assets/front-end/uploads/'.$home_ad_data->above_search_ad));
            }

            $ext = $request->file('above_search_ad')->extension();
            $final_name = 'above_search_ad'.'.'.$ext;
            $request->file('above_search_ad')->move('assets/front-end/uploads/', $final_name);

            $home_ad_data->above_search_ad = $final_name;
        }

        if($request->hasFile('above_footer_ad')) {
            $request->validate([
                'above_footer_ad' => 'image|mimes:png,jpg,jpeg,gif',
            ]);

            if(file_exists('assets/front-end/uploads/'.$home_ad_data->above_footer_ad)) {
                unlink(public_path('assets/front-end/uploads/'.$home_ad_data->above_footer_ad));
            }

            $ext = $request->file('above_footer_ad')->extension();
            $final_name = 'above_footer_ad'.'.'.$ext;
            $request->file('above_footer_ad')->move('assets/front-end/uploads/', $final_name);

            $home_ad_data->above_footer_ad = $final_name;
        }

        $home_ad_data->above_search_ad_url = $request->above_search_ad_url;
        $home_ad_data->above_search_ad_status = $request->above_search_ad_status;
        $home_ad_data->above_footer_ad_url = $request->above_footer_ad_url;
        $home_ad_data->above_footer_ad_url = $request->above_footer_ad_url;
        $home_ad_data->update();

        return redirect()->back()->with('success', 'Home advertisement updated successfully.');

    }

    public function top_ad_show()
    {
        $top_ad_data = TopAdvertisement::where('id', 1)->first();
        return view('back-end.admin.advertisement.advertisement-top-show', compact('top_ad_data'));
    }

    public function top_ad_update(Request $request)
    {
        $top_ad_data = TopAdvertisement::where('id', 1)->first();

        if($request->hasFile('top_ad')) {
            $request->validate([
                'top_ad' => 'image|mimes:png,jpg,jpeg,gif',
            ]);

            if(file_exists('assets/front-end/uploads/'.$top_ad_data->top_ad)) {
                unlink(public_path('assets/front-end/uploads/'.$top_ad_data->top_ad));
            }

            $ext = $request->file('top_ad')->extension();
            $final_name = 'top_ad'.'.'.$ext;
            $request->file('top_ad')->move('assets/front-end/uploads/', $final_name);

            $top_ad_data->top_ad = $final_name;
        }

        $top_ad_data->top_ad_url = $request->top_ad_url;
        $top_ad_data->top_ad_status = $request->top_ad_status;

        $top_ad_data->update();

        return redirect()->back()->with('success', 'Top advertisement updated successfully.');

    }

    public function sidebar_ad_view()
    {
        $sidebar_ad_data = SidebarAdvertisement::latest()->get();
        return view('back-end.admin.advertisement.advertisement-sidebar-view', compact('sidebar_ad_data'));
    }

    public function sidebar_ad_create()
    {
        return view('back-end.admin.advertisement.advertisement-sidebar-create');
    }

    public function sidebar_ad_store(Request $request)
    {
        $request->validate([
            'sidebar_ad_photo' => 'required|image|mimes:png,jpg,jpeg,gif'
        ]);

        $ext = $request->file('sidebar_ad_photo')->extension();
        $final_name = 'sidebar_ad_photo_'.time().'.'.$ext;
        $path = 'assets/front-end/uploads/';
        $request->file('sidebar_ad_photo')->move($path, $final_name);

        $sidebar_ad_data = new SidebarAdvertisement();
        $sidebar_ad_data->sidebar_ad_photo = $final_name;
        $sidebar_ad_data->sidebar_ad_url = $request->url;
        $sidebar_ad_data->sidebar_ad_location = $request->sidebar_ad_location;
        $sidebar_ad_data->save();

        return redirect()->back()->with('success', 'Advertisement created successfully');
    }

    public function sidebar_ad_edit($id)
    {
        $sidebar_ad_data = SidebarAdvertisement::find($id);
        return view('back-end.admin.advertisement.advertisement-sidebar-edit', compact('sidebar_ad_data'));
    }

    public function sidebar_ad_update(Request $request, $id)
    {
        $sidebar_ad_data = SidebarAdvertisement::find($id);

        if($request->hasFile('sidebar_ad_photo')) {
            $request->validate([
                'sidebar_ad_photo'=> 'image|mimes:png,jpg,jpeg,gif'
            ]);

            unlink(public_path('assets/front-end/uploads/'.$sidebar_ad_data->sidebar_ad_photo));

            $ext = $request->file('sidebar_ad_photo')->extension();
            $final_name = 'sidebar_ad_photo'.'_'.time().'.'.$ext;
            $path = 'assets/front-end/uploads/';
            $request->file('sidebar_ad_photo')->move($path, $final_name);
           
            $sidebar_ad_data->sidebar_ad_photo = $final_name;

        }

        $sidebar_ad_data->sidebar_ad_url = $request->sidebar_ad_url;
        $sidebar_ad_data->sidebar_ad_location = $request->sidebar_ad_location;
        $sidebar_ad_data->update();

        return redirect()->route('admin_sidebar_ad_view')->with('success', 'Ad updated successfully');
    }

    public function sidebar_ad_delete($id)
    {
        $sidebar_ad_data = SidebarAdvertisement::find($id);
        
        unlink(public_path('assets/front-end/uploads/'.$sidebar_ad_data->sidebar_ad_photo));

        $sidebar_ad_data->delete();

        return redirect()->back()->with('success', 'Ad deleted successfully');
    }

    



}
