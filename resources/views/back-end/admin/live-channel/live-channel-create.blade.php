@extends('back-end.layouts.app')
@section('title', 'Create Live Channel')
@section('heading', 'Create Live Channel')
@section('button')
<a href="{{ route('admin_live_channel_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_live_channel_store') }}" method="post">
                        @csrf

                        <div class="form-group mb-3">
                            <label>Heading *</label>
                            <input type="text" name="heading" class="form-control">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label>Video Id</label>
                            <input type="text" name="video_id" class="form-control">
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