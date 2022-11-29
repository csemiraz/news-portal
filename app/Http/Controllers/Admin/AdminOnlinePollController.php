<?php

namespace App\Http\Controllers\Admin;

use App\Models\OnlinePoll;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminOnlinePollController extends Controller
{
    public function show()
    {
        $online_polls = OnlinePoll::latest()->get();
        return view('back-end.admin.online-poll.online-poll-show', compact('online_polls'));
    }

    public function create()
    {
        return view('back-end.admin.online-poll.online-poll-create');
    }

    public function store(Request $request)
    {
        $online_poll = new OnlinePoll();
        $request->validate([
            'question' => 'required',
        ]);
        $online_poll->question = $request->question;
        $online_poll->yes_vote = 0;
        $online_poll->no_vote = 0;
        $online_poll->save();

        return redirect()->back()->with('success', 'Data is created successfully.');
    }

    public function edit($id)
    {
        $online_poll = OnlinePoll::find($id);
        return view('back-end.admin.online-poll.online-poll-edit', compact('online_poll'));
    }

    public function update(Request $request, $id)
    {
        $online_poll = OnlinePoll::find($id);

        $request->validate([
            'question' => 'required',
        ]);
        $online_poll->question = $request->question;
        $online_poll->update();

        return redirect()->route('admin_online_poll_show')->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        $online_poll = OnlinePoll::find($id);  
        $online_poll->delete();
        
        return redirect()->back()->with('success', 'Data is deleted successfully.');
    }



}
