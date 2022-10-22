@extends('back-end.layouts.app')
@section('title', 'Top Advertisement')
@section('heading', 'Top Advertisement')
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_top_ad_update') }}" method="post"     enctype="multipart/form-data">
                        @csrf
                        <h4>Top Ad</h4>
                        <div class="form-group mb-3">
                            <label>Existing Photo</label>
                            <img src="{{ asset('assets/front-end/uploads/'.$top_ad_data->top_ad) }}" style="width: 100%; max-height: 200px;" alt="top ad photo">
                        </div>

                        <div class="form-group mb-3">
                            <label>Change Photo</label>
                            <input type="file" name="top_ad" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>URL</label>
                            <input type="text" name="top_ad_url" class="form-control" value="{{ $top_ad_data->top_ad_url }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>Status</label>
                            <select name="top_ad_status" class="form-control">
                                <option {{ $top_ad_data->top_ad_status=='Show' ? 'selected' : '' }}>Show</option>
                                <option {{ $top_ad_data->top_ad_status == 'Hide' ? 'selected' : '' }}>Hide</option>
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