<?php

namespace App\Http\Controllers\Admin;

use App\Models\LiveChannel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminLiveChannelController extends Controller
{
    public function show()
    {
        $live_channels = LiveChannel::latest()->get();
        return view('back-end.admin.live-channel.live-channel-show', compact('live_channels'));
    }

    public function create()
    {
        return view('back-end.admin.live-channel.live-channel-create');
    }

    public function store(Request $request)
    {
        $live_channel = new LiveChannel();
        $request->validate([
            'heading' => 'required',
            'video_id' => 'required',
        ]);
        $live_channel->heading = $request->heading;
        $live_channel->video_id = $request->video_id;
        $live_channel->save();

        return redirect()->back()->with('success', 'Data is created successfully.');
    }

    public function edit($id)
    {
        $live_channel = LiveChannel::find($id);
        return view('back-end.admin.live-channel.live-channel-edit', compact('live_channel'));
    }

    public function update(Request $request, $id)
    {
        $live_channel = LiveChannel::find($id);
        $request->validate([
            'heading' => 'required',
            'video_id' => 'required',
        ]);

        $live_channel->heading = $request->heading;
        $live_channel->video_id = $request->video_id;
        $live_channel->update();
        return redirect()->route('admin_live_channel_show')->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        $live_channel = LiveChannel::find($id);
        $live_channel->delete();
        return redirect()->route('admin_live_channel_show')->with('success', 'Data is deleted successfully.');
    }
}
