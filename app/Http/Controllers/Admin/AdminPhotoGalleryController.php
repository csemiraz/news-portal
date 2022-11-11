<?php

namespace App\Http\Controllers\Admin;

use App\Models\PhotoGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPhotoGalleryController extends Controller
{
    public function show()
    {
        $photo_galleries = PhotoGallery::latest()->get();
        return view('back-end.admin.photo.photo-gallery-show', compact('photo_galleries'));
    }

    public function create()
    {
        return view('back-end.admin.photo.photo-gallery-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'caption' => 'required',
            'photo' => 'required|image|mimes:png,jpg,jpeg,gif'
        ]);

        $ext = $request->file('photo')->extension();
        $final_name = 'photo_gallery_'.time().'.'.$ext;
        $path = 'assets/images/';
        $request->file('photo')->move($path, $final_name);

        $photo_gallery = new PhotoGallery();
        $photo_gallery->photo = $final_name;
        $photo_gallery->caption = $request->caption;
        $photo_gallery->save();

        return redirect()->back()->with('success', 'Data is created successfully');
    }

    public function edit($id)
    {
        $photo_gallery = PhotoGallery::find($id);
        return view('back-end.admin.photo.photo-gallery-edit', compact('photo_gallery'));
    }

    public function update(Request $request, $id)
    {
       $photo_gallery = PhotoGallery::find($id);
        
        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:png,jpg, jpeg, gif'
            ]);
            unlink(public_path('assets/images/'.$photo_gallery->photo));
            $ext = $request->file('photo')->extension();
            $final_name = 'photo_gallery'.'_'.time().'.'.$ext;
            $request->file('photo')->move(public_path('assets/images/'), $final_name);

            $photo_gallery->photo = $final_name;
        }

        $photo_gallery->caption = $request->caption;
        $photo_gallery->update();

        return redirect()->route('admin_photo_gallery_show')->with('success', 'Data is updated successfully');
    }

    public function delete($id)
    {
        $photo_gallery = PhotoGallery::find($id);
        
        unlink(public_path('assets/images/'.$photo_gallery->photo));

        $photo_gallery->delete();

        return redirect()->back()->with('success', 'Data is deleted successfully');
    }


}
