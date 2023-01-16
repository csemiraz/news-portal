<?php

namespace App\Http\Controllers\Admin;


use App\Models\Author;
use App\Mail\WebsiteMail;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminAuthorController extends Controller
{
    public function show()
    {
        $authors = Author::orderBy('id', 'desc')->get();
        return view('back-end.admin.author.author-show', compact('authors'));
    }

    public function create() {
        return view('back-end.admin.author.author-create');
    }

    public function store(Request $request) 
    {
        $author = new Author();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:authors',
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);

            $ext = $request->file('photo')->extension();
            $final_name = 'author'.'_'.time().'.'.$ext;
            $request->file('photo')->move(public_path('assets/images/'), $final_name);

            $author->photo = $final_name;
        }

        $author->name = $request->name;
        $author->email = $request->email;
        $author->password = Hash::make($request->password);
        $author->token = "";
        $author->save();

        // Send email
        $subject = 'Your account is created to the website';
        $message = 'Hi, your account is created successfully and now you can login to our system from the front end login page. Please go to this link: <br><br>';
        $message .= '<a href="'.route('author_login').'">';
        $message .= 'Click on this link';
        $message .= '</a>';
        $message .= '<br><br>Please see your password here and after login, change that immediately:<br>';
        $message .= $request->password;

        \Mail::to($request->email)->send(new Websitemail($subject,$message));

        return redirect()->route('admin_author_show')->with('success', 'Author is created successfully');
    }

    public function edit($id)
    {
        $author = Author::find($id);
        return view('back-end.admin.author.author-edit', compact('author'));
    }

    public function update(Request $request, $id)
    {
        $author = Author::find($id);
        $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('authors')->ignore($author->id)
            ]
        ]);

        if($request->password != '') {
            $request->validate([
                'password' => 'required',
                'retype_password' => 'required|same:password',
            ]);

            $author->password = Hash::make($request->password);
        }

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);

            unlink(public_path('assets/images/'.$author->photo));

            $ext = $request->file('photo')->extension();
            $final_name = 'author'.'_'.time().'.'.$ext;
            $request->file('photo')->move(public_path('assets/images/'), $final_name);

            $author->photo = $final_name;
        }

        $author->name = $request->name;
        $author->email = $request->email;
        $author->save();

        return redirect()->route('admin_author_show')->with('success', 'Author is updated successfully');

    }

    public function delete($id)
    {
        $author = Author::find($id);
       
        if($author->photo != NULL) {
            unlink(public_path('assets/images/'.$author->photo));
        }
        $author->delete();
        return redirect()->back()->with('success', 'Author info deleted successfully.');
    }


}
