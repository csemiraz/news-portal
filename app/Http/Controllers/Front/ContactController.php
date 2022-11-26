<?php

namespace App\Http\Controllers\Front;

use App\Models\Page;
use App\Mail\Websitemail;
use App\Models\Admin;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        $page = Page::where('id', 1)->first();
        return view('front-end.pages.contact', compact('page'));
    }

    public function contact_form_submit(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);
        if(!$validator->passes())
        {
            return response()->json(['code'=>0,'error_message'=>$validator->errors()->toArray()]);
        }
        else
        {
            $contact = new Contact();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->message = $request->message;
            $contact->save();

             // Send email
             $admin_data = Admin::where('id',1)->first();
             $subject = 'Contact Form Email';
             $message = 'Visitor Message Detail:<br>';
             $message .= '<b>Visitor Name: </b>'.$request->name.'<br>';
             $message .= '<b>Visitor Email: </b>'.$request->email.'<br>';
             $message .= '<b>Visitor Message: </b>'.$request->message;
             \Mail::to($admin_data->email)->send(new Websitemail($subject,$message));

            return response()->json(['code'=>1,'success_message'=>'Contact info saved and mail send to admin.']);
        }
        
    }


}
