<?php

namespace App\Http\Controllers\Front;

use App\Mail\Websitemail;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriberController extends Controller
{
    public function subscriber(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'email' => 'required|email'
        ]);
        if(!$validator->passes())
        {
            return response()->json(['code'=>0,'error_message'=>$validator->errors()->toArray()]);
        }
        else
        {
            $token = hash('sha256', time());
            $subscriber = new Subscriber();
            $subscriber->email = $request->email;
            $subscriber->token = $token;
            $subscriber->status = 'Pending';
            $subscriber->save();

            // Send email
            $subject = 'Subscriber Email Verify';

            $verification_link = url('subscriber/verify/'.$token.'/'.$request->email);

            $message = 'Please click on the following link in order to verify as subscriber<br>';
            $message .= '<a href="'.$verification_link.'">';
            $message .= $verification_link;
            $message .= '</a>';

            \Mail::to($request->email)->send(new Websitemail($subject,$message));

            return response()->json(['code'=>1,'success_message'=>'Please check your email address to verify as subscriber.']);
        }
    }

    public function verify($token,$email)
    {     
        $subscriber_data = Subscriber::where('token',$token)->where('email',$email)->first();
    
        if($subscriber_data) 
        {
            $subscriber_data->token = '';
            $subscriber_data->status = 'Active';
            $subscriber_data->update();

            return redirect()->back()->with('success', 'You are successfully verified as a subscriber to this system.');
        } 
        else 
        {
            return redirect()->route('home');
        }
    }


}
