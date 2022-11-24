@extends('back-end.layouts.app')
@section('heading', 'Edit Privacy Page Content')
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_privacy_page_update') }}" method="post">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label>Privacy Title *</label>
                            <input type="text" name="privacy_title" value="{{ $page->privacy_title }}" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Privacy Detail *</label>
                            <textarea name="privacy_detail" class="form-control snote" cols="30" rows="10">{{ $page->privacy_detail }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label>Privacy Status</label>
                            <select name="privacy_status" class="form-control">
                                <option value="Show" {{ $page->privacy_status=='Show' ? 'selected' : '' }}>Show</option>
                                <option value="Hide" {{ $page->privacy_status=='Hide' ? 'selected' : '' }}>Hide</option>
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