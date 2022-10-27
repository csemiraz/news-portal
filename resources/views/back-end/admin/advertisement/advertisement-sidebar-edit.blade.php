@extends('back-end.layouts.app')
@section('title', 'Edit Advertisement')
@section('heading', 'Update Advertisement')
@section('button')
<a href="{{ route('admin_sidebar_ad_view') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_sidebar_ad_update', $sidebar_ad_data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label>Existing Photo</label>
                            <img src="{{ asset('assets/front-end/uploads/'.$sidebar_ad_data->sidebar_ad_photo) }}" alt="sidebar" style="width: 100%; height: 200px">
                        </div>

                        <div class="form-group mb-3">
                            <label>Change Photo</label>
                            <input type="file" name="sidebar_ad_photo" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>URL</label>
                            <input type="text" name="sidebar_ad_url" value="{{ $sidebar_ad_data->sidebar_ad_url }}" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Location</label>
                            <select name="sidebar_ad_location" class="form-control">
                                <option value="Top" {{ $sidebar_ad_data->sidebar_ad_location=='Top' ? 'selected' : '' }}>Top</option>
                                <option value="Bottom" {{ $sidebar_ad_data->sidebar_ad_location=='Bottom' ? 'selected' : '' }}>Bottom</option>
                            </select>
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