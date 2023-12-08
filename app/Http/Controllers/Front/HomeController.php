<?php

namespace App\Http\Controllers\Front;

use App\Models\Post;
use App\Models\Video;
use App\Models\Setting;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\HomeAdvertisement;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $home_ad_data = HomeAdvertisement::where('id', 1)->first();
        $setting_data = Setting::where('id', 1)->first();
        $post_data = Post::orderBy('id', 'desc')->get();
        $sub_category_data = SubCategory::orderBy('subcategory_order', 'asc')->where('show_on_home', 'Show')->get();
        $category_data = Category::orderBy('category_order', 'asc')->get();
        $home_videos = Video::latest()->get();
        return view('front-end.home', compact('home_ad_data','setting_data','post_data','sub_category_data', 'category_data', 'home_videos'));
    }

    public function subcategory_by_category($id)
    {
        $sub_category_data = SubCategory::where('category_id', $id)->get();
        $response = "<option value=''>Select SubCategory</option>";
        foreach ($sub_category_data as $item) {
            $response .= "<option value='".$item->id."'>".$item->subcategory_name."</option>";
        }
        return response()->json(['sub_category_data'=>$response]);
    }

    public function search_result(Request $request)
    {
        if($request->search_text == '') {
            $request->validate([
                'sub_category' => 'required'
            ],
            [
                'sub_category.required' => 'The text field or category field is required.'
            ]);
        }
        
         $post_data = Post::orderBy('id', 'desc');
        
         if($request->search_text != '') {
            $post_data = $post_data->where('post_title', 'like', '%'.$request->search_text.'%');
         }

         if($request->sub_category !='') {
            $post_data = $post_data->where('sub_category_id', $request->sub_category);
         }
         $post_data = $post_data->get();

         return view('front-end.search-result', compact('post_data'));
    }



}
