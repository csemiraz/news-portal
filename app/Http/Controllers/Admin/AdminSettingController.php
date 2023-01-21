<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminSettingController extends Controller
{
    public function index()
    {
        $setting_data = Setting::where('id', 1)->first();
        return view('back-end.admin.setting', compact('setting_data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'news_ticker_total' => 'required'
        ]);

        $setting = Setting::where('id', 1)->first();
        $setting->news_ticker_total = $request->news_ticker_total;
        $setting->news_ticker_status = $request->news_ticker_status;

        if($request->hasFile('logo')) {
            $request->validate([
                'logo' => 'image|mimes:png,jpg, jpeg, gif'
            ]);
            unlink(public_path('assets/images/'.$setting->logo));
            $ext = $request->file('logo')->extension();
            $final_name = 'logo'.'.'.$ext;
            $request->file('logo')->move(public_path('assets/images/'), $final_name);

            $setting->logo = $final_name;
        }

        if($request->hasFile('favicon')) {
            $request->validate([
                'favicon' => 'image|mimes:png,jpg, jpeg, gif'
            ]);
            unlink(public_path('assets/images/'.$setting->favicon));
            $ext = $request->file('favicon')->extension();
            $final_name = 'favicon'.'.'.$ext;
            $request->file('favicon')->move(public_path('assets/images/'), $final_name);

            $setting->favicon = $final_name;
        }

        $setting->top_bar_date_status = $request->top_bar_date_status;
        $setting->top_bar_email = $request->top_bar_email;
        $setting->top_bar_email_status = $request->top_bar_email_status;
        $setting->theme_color_1 = $request->theme_color_1;
        $setting->theme_color_2 = $request->theme_color_2;
        $setting->analytic_id = $request->analytic_id;
        $setting->analytic_status = $request->analytic_status;
        $setting->disqus_code = $request->disqus_code;
        $setting->update();

        return redirect()->route('admin_setting')->with('success', 'Data is updated successfully');
        
    }


}
