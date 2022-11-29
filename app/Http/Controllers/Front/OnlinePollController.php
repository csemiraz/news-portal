<?php

namespace App\Http\Controllers\Front;

use App\Models\OnlinePoll;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OnlinePollController extends Controller
{
    public function poll_submit(Request $request)
    {
        $online_poll_data = OnlinePoll::where('id', $request->id)->first();

        if($request->vote == 'Yes') {
           $updated_yes_vote = $online_poll_data->yes_vote + 1;
           $online_poll_data->yes_vote = $updated_yes_vote;
        }
        else {
            $updated_no_vote = $online_poll_data->no_vote + 1;
            $online_poll_data->no_vote = $updated_no_vote;
        }

        $online_poll_data->update();

        session()->put('current_poll_id', $online_poll_data->id);

        return redirect()->back()->with('success', 'Your vote has been counted.');

    }

    public function poll_result()
    {
        $poll_results = OnlinePoll::orderBy('id', 'desc')->get();
        return view('front-end.poll-result', compact('poll_results'));
    }


}
