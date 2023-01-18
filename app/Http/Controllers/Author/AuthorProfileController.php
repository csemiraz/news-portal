<?php

namespace App\Http\Controllers\Author;

use App\Models\Author;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthorProfileController extends Controller
{
    public function edit_profile() 
    {
        return view('back-end.author.edit-profile');
    }

    public function edit_profile_submit(Request $request)
    {
        $author_data = Author::where('email', Auth::guard('author')->user()->email)->first();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        if($request->password != '') {
            $request->validate([
                'password' => 'required',
                'retype_password' => 'required|same:password'
            ]);
            $author_data->password = Hash::make($request->password);
        }

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpg, jpeg, png, gif'
            ]);
            if(file_exists('assets/images/'.$author_data->photo)) {
                unlink(public_path('assets/images/'.$author_data->photo));
            }
           
            $extension = $request->file('photo')->extension();
            $final_name = Str::slug($request->name).'.'.$extension;
            $request->file('photo')->move('assets/images', $final_name);
            
            $author_data->photo = $final_name;
        }

        $author_data->name = $request->name;
        $author_data->email = $request->email;
        $author_data->update();

        return redirect()->back()->with('success', 'Profile info updated successfully');

    }

}
