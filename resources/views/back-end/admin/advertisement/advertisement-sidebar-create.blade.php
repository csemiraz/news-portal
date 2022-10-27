@extends('back-end.layouts.app')
@section('title', 'Create Advertisement')
@section('heading', 'Create Advertisement')
@section('button')
<a href="{{ route('admin_sidebar_ad_view') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_sidebar_ad_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label>Photo</label>
                            <input type="file" name="sidebar_ad_photo" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>URL</label>
                            <input type="text" name="sidebar_ad_url" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Location</label>
                            <select name="sidebar_ad_location" class="form-control">
                                <option value="Top">Top</option>
                                <option value="Bottom">Bottom</option>
                            </select>
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