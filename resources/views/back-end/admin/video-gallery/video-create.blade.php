@extends('back-end.layouts.app')
@section('title', 'Create Video Gallery')
@section('heading', 'Create Video Gallery')
@section('button')
<a href="{{ route('admin_video_gallery_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_video_gallery_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label>Video Id</label>
                            <input type="text" name="video_id" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Video Caption *</label>
                            <input type="text" name="video_caption" class="form-control">
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