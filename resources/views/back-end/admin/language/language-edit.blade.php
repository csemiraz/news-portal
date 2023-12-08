@extends('back-end.layouts.app')
@section('title', 'Edit Language')
@section('heading', 'Update Language')
@section('button')
<a href="{{ route('admin_language_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_language_update', $language->id) }}" method="post">
                        @csrf
                                
                        <div class="form-group mb-3">
                            <label>Name *</label>
                            <input type="text" name="name" class="form-control" value="{{ $language->name }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>Short Name *</label>
                            <input type="text" name="short_name" class="form-control" value="{{ $language->short_name }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>Is Default?</label>
                            <select name="is_default" class="form-control">
                                <option value="Yes" {{ $language->is_default=='Yes' ? 'selected' : '' }}>Yes</option>
                                <option value="No" {{ $language->is_default=='No' ? 'selected' : '' }}>No</option>
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