@extends('back-end.layouts.app')
@section('title', 'Edit Category')
@section('heading', 'Update Category')
@section('button')
<a href="{{ route('admin_photo_gallery_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_photo_gallery_update', $photo_gallery->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label>Existing Photo</label>
                           <img src="{{ asset('assets/images/'.$photo_gallery->photo) }}" style="width: 100%; " alt="">
                        </div>

                        <div class="form-group mb-3">
                            <label>Change Photo</label>
                            <input type="file" name="photo" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Caption</label>
                            <input type="text" name="caption" class="form-control" value="{{ $photo_gallery->caption }}">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
            </div>
            </div>
        </div>
    </div>
    </div>
@endsection