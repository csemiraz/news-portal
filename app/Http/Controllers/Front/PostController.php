<?php

namespace App\Http\Controllers\Front;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Admin;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function news_detail($id)
    {
        $post_detail = Post::find($id);

        //update post_views count
        $post_views_increment = $post_detail->post_views + 1;
        $post_detail->post_views = $post_views_increment;
        $post_detail->update();

        //Post tags
        $tags = Tag::where('post_id', $id)->get();

        //Author and Admin name show
        if($post_detail->author_id==0) {
            $user_data = Admin::where('id', $post_detail->admin_id)->first();
        }
        else {
            $user_data = Author::where('id', $post_detail->author_id)->first();
        }

        //Related News

        $related_post = Post::where('sub_category_id', $post_detail->sub_category_id)->orderBy('id', 'desc')->get();

        return view('front-end.post_detail', compact('post_detail', 'tags', 'user_data', 'related_post'));
    }
}
