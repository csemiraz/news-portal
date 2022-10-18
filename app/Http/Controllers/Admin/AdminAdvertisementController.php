<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\HomeAdvertisement;
use App\Http\Controllers\Controller;

class AdminAdvertisementController extends Controller
{
    public function home_ad_show()
    {
        $admin_ad_data = HomeAdvertisement::where('id', 1)->first();
        return view('back-end.admin.advertisement.advertisement-home-show', compact('admin_ad_data'));
    }

    public function home_ad_update(Request $request)
    {
        $admin_ad_data = HomeAdvertisement::where('id', 1)->first();
        
        if($request->hasFile('above_search_ad')) {
            $request->validate([
                'above_search_ad' => 'image|mimes:png,jpg,jpeg,gif',
            ]);

            if(file_exists('assets/front-end/uploads/'.$admin_ad_data->above_search_ad)) {
                unlink(public_path('assets/front-end/uploads/'.$admin_ad_data->above_search_ad));
            }

            $ext = $request->file('above_search_ad')->extension();
            $final_name = 'above_search_ad'.'.'.$ext;
            $request->file('above_search_ad')->move('assets/front-end/uploads/', $final_name);

            $admin_ad_data->above_search_ad = $final_name;
        }

        if($request->hasFile('above_footer_ad')) {
            $request->validate([
                'above_footer_ad' => 'image|mimes:png,jpg,jpeg,gif',
            ]);

            if(file_exists('assets/front-end/uploads/'.$admin_ad_data->above_footer_ad)) {
                unlink(public_path('assets/front-end/uploads/'.$admin_ad_data->above_footer_ad));
            }

            $ext = $request->file('above_footer_ad')->extension();
            $final_name = 'above_footer_ad'.'.'.$ext;
            $request->file('above_footer_ad')->move('assets/front-end/uploads/', $final_name);

            $admin_ad_data->above_footer_ad = $final_name;
        }

        $admin_ad_data->above_search_ad_url = $request->above_search_ad_url;
        $admin_ad_data->above_search_ad_status = $request->above_search_ad_status;
        $admin_ad_data->above_footer_ad_url = $request->above_footer_ad_url;
        $admin_ad_data->above_footer_ad_url = $request->above_footer_ad_url;
        $admin_ad_data->update();

        return redirect()->back()->with('success', 'Home advertisement updated successfully.');

    }
}
