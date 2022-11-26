<?php

namespace App\Http\Controllers\Admin;

use App\Mail\WebsiteMail;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminSubscriberController extends Controller
{
    public function show()
    {
        $subscribers = Subscriber::where('status', 'Active')->get();
        return view('back-end.admin.subscriber.subscriber-show', compact('subscribers'));
    }

    public function send_email()
    {
        return view('back-end.admin.subscriber.subscriber-send-email');
    }

    public function send_email_submit(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'message' => 'required',
        ]);

        $subject = $request->subject;
        $message = $request->message;

        $subscribers = Subscriber::where('status', 'Active')->get();

        foreach($subscribers as $data) {
            \Mail::to($data->email)->send(new WebsiteMail($subject, $message));
        }

        return redirect()->back()->with('success', 'Email is sent successfully.');
    }


}
