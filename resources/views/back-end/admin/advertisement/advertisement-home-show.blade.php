@extends('back-end.layouts.app')
@section('title', 'Home Advertisement')
@section('heading', 'Home Advertisement')
@section('main_content')
<div class="section-body">
    <form action="{{ route('admin_home_ad_update') }}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                <h4>Above Search</h4>
                    <div class="form-group mb-3">
                        <label>Existing Photo</label>
                        <img src="{{ asset('assets/front-end/uploads/'.$admin_ad_data->above_search_ad) }}" style="width: 100%; height: 200px;" alt="above search photo">
                    </div>

                    <div class="form-group mb-3">
                        <label>Change Photo</label>
                        <input type="file" name="above_search_ad" class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label>URL</label>
                        <input type="text" name="above_search_ad_url" class="form-control" value="{{ $admin_ad_data->above_search_ad_url }}">
                    </div>

                    <div class="form-group mb-3">
                        <label>Status</label>
                        <select name="above_search_ad_status" class="form-control">
                            <option {{ $admin_ad_data->above_search_ad_status=='Show' ? 'selected' : '' }}>Show</option>
                            <option {{ $admin_ad_data->above_search_ad_status == 'Hide' ? 'selected' : '' }}>Hide</option>
                        </select>
                    </div> 
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card">
                <div class="card-body">
                <h4>Above Footer</h4>
                    <div class="form-group mb-3">
                        <label>Existing Photo</label>
                        <img src="{{ asset('assets/front-end/uploads/'.$admin_ad_data->above_footer_ad) }}" style="width: 100%; height: 200px;" alt="above footer photo">
                    </div>

                    <div class="form-group mb-3">
                        <label>Change Photo</label>
                        <input type="file" name="above_footer_ad" class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label>URL</label>
                        <input type="text" name="above_footer_ad_url" class="form-control" value="{{ $admin_ad_data->above_footer_ad_url }}">
                    </div>

                    <div class="form-group mb-3">
                        <label>Status</label>
                        <select name="above_footer_ad_status" class="form-control">
                            <option {{ $admin_ad_data->above_footer_ad_status=='Show' ? 'selected' : '' }}>Show</option>
                            <option {{ $admin_ad_data->above_footer_ad_status == 'Hide' ? 'selected' : '' }}>Hide</option>
                        </select>
                    </div> 
                </div>
            </div>
        </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
    </div>
@endsection