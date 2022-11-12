<?php

namespace App\Http\Controllers\Admin;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminVideoController extends Controller
{
    public function show()
    {
        $videos = Video::latest()->get();
        return view('back-end.admin.video-gallery.video-show', compact('videos'));
    }

    public function create()
    {
        return view('back-end.admin.video-gallery.video-create');
    }

    public function store(Request $request)
    {
        $video = new video();
        $request->validate([
            'video_id' => 'required',
            'video_caption' => 'required',
        ]);
        $video->video_id = $request->video_id;
        $video->video_caption = $request->video_caption;
        $video->save();

        return redirect()->back()->with('success', 'Data is created successfully.');
    }

    public function edit($id)
    {
        $video = Video::find($id);
        return view('back-end.admin.video-gallery.video-edit', compact('video'));
    }

    public function update(Request $request, $id)
    {
        $video = Video::find($id);
        $request->validate([
            'video_id' => 'required',
            'video_caption' => 'required',
        ]);

        $video->video_id = $request->video_id;
        $video->video_caption = $request->video_caption;
        $video->update();
        return redirect()->route('admin_video_gallery_show')->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        $video = Video::find($id);
        $video->delete();
        return redirect()->route('admin_video_gallery_show')->with('success', 'Data is deleted successfully.');
    }


}
