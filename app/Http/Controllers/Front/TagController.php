<?php

namespace App\Http\Controllers\Front;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function show($tag_name)
    {
    
        $tags = Tag::where('tag_name',$tag_name)->get();
        //$all_post_ids = [];
        $posts = [];
        foreach($tags as $row) {
            //$all_post_ids[] = $row->post_id;
            $posts[] = Post::where('id', $row->post_id)->get();
        }

        return view('front-end.news-tag', compact('posts', 'tag_name'));
    }
}
