@extends('back-end.layouts.app')
@section('title', 'Language')
@section('heading', 'Language')
@section('button')
<a href="{{ route('admin_language_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_language_store') }}" method="post">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label>Name *</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Short Name *</label>
                            <input type="text" name="short_name" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Is Default?</label>
                            <select name="is_default" class="form-control">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
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