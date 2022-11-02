<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminPostController extends Controller
{
    public function show()
    {
        $posts = Post::latest()->get();
        return view('back-end.admin.post.post-show', compact('posts'));
    }

    public function create()
    {
        $sub_categories = SubCategory::latest()->get();
        return view('back-end.admin.post.post-create', compact('sub_categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_title' => 'required',
            'post_detail' => 'required',
            'post_photo' => 'required',
        ]);

        /* $q = DB::select("SHOW TABLE STATUS LIKE 'posts'");
        $ai_id = $q[0]->Auto_increment; */

        $ext = $request->file('post_photo')->extension();
        $final_name = 'post_photo'.'_'.time().'.'.$ext;
        $request->file('post_photo')->move(public_path('assets/images/'), $final_name );

        $post = new Post();
        $post->post_title = $request->post_title;
        $post->post_detail = $request->post_detail;
        $post->post_photo = $final_name;
        $post->sub_category_id = $request->sub_category_id;
        $post->post_views = 0;
        $post->author_id = 0;
        $post->admin_id = Auth::guard('admin')->user()->id;
        $post->is_share = $request->is_share;
        $post->is_comment = $request->is_comment;
        $post->save();

        if($request->tags != '') {
            $tags_array_new = [];
            $tags_array = explode(',',$request->tags);
            for($i=0; $i<count($tags_array); $i++) {
                $tags_array_new[] = trim($tags_array[$i]);
            }
            $tags_array_new = array_values(array_unique($tags_array_new));
            for($i=0; $i<count($tags_array_new); $i++) {
                $tag = new Tag();
                $tag->post_id = $post->id;
                $tag->tag_name = $tags_array_new[$i];
                $tag->save();
            }
        }

        return redirect()->back()->with('success', 'Data is created successfully.');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $sub_categories = SubCategory::latest()->get();
        $existing_tags = Tag::where('post_id', $id)->get();
        return view('back-end.admin.post.post-edit', compact('post', 'sub_categories', 'existing_tags'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'post_title' => 'required',
            'post_detail' => 'required',
        ]);

        $post = Post::find($id);

        if($request->hasFile('post_photo')) {
            $request->validate([
                'post_photo' => 'image|mimes:png,jpg, jpeg, gif'
            ]);
            unlink(public_path('assets/images/'.$post->post_photo));
            $ext = $request->file('post_photo')->extension();
            $final_name = 'post_photo'.'_'.time().'.'.$ext;
            $request->file('post_photo')->move(public_path('assets/images/'), $final_name);

            $post->post_photo = $final_name;
        }

        $post->post_title = $request->post_title;
        $post->post_detail = $request->post_detail;
        $post->sub_category_id = $request->sub_category_id;
        $post->is_share = $request->is_share;
        $post->is_comment = $request->is_comment;
        $post->update();

        if($request->tags != '') {
            $tags_array = explode(',',$request->tags);
            for($i=0;$i<count($tags_array);$i++)
            {
                $total = Tag::where('post_id',$id)->where('tag_name',trim($tags_array[$i]))->count();

                if(!$total) {
                    $tag = new Tag();
                    $tag->post_id = $id;
                    $tag->tag_name = trim($tags_array[$i]);
                    $tag->save();
                }
            }
        }   

        return redirect()->route('admin_post_show')->with('success', 'Data is updated successfully');

    }

    public function delete_tag($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return redirect()->back()->with('success', 'Data is deleted successfully.');
    }

    public function delete($id)
    {
        $post = Post::find($id);
        unlink(public_path('assets/images/'.$post->post_photo));
        $post->delete();

        Tag::where('post_id', $id)->delete();

        return redirect()->back()->with('success', 'Data is deleted successfully.');
    }


}
