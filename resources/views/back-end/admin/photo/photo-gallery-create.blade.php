@extends('back-end.layouts.app')
@section('title', 'Create Photo Gallery')
@section('heading', 'Create Photo Gallery')
@section('button')
<a href="{{ route('admin_photo_gallery_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_photo_gallery_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label>Photo</label>
                            <input type="file" name="photo" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Caption *</label>
                            <input type="text" name="caption" class="form-control">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
            </div>
            </div>
        </div>
    </div>
    </div>
@endsection