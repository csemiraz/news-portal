@extends('back-end.layouts.app')
@section('title', 'Create Social Item')
@section('heading', 'Create Social Item')
@section('button')
<a href="{{ route('admin_social_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_social_store') }}" method="post">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label>Icon *</label>
                            <input type="text" name="icon" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>URL *</label>
                            <input type="text" name="url" class="form-control">
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