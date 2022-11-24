@extends('back-end.layouts.app')
@section('heading', 'Edit Contact Page Content')
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_contact_page_update') }}" method="post">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label>Contact Title *</label>
                            <input type="text" name="contact_title" value="{{ $page->contact_title }}" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Contact Detail</label>
                            <textarea name="contact_detail" class="form-control snote" cols="30" rows="10">{{ $page->contact_detail }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label>Contact Map(iFrame Code)</label>
                            <textarea name="contact_map" class="form-control snote" cols="30" rows="10">{{ $page->contact_map }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label>Contact Status</label>
                            <select name="contact_status" class="form-control">
                                <option value="Show" {{ $page->contact_status=='Show' ? 'selected' : '' }}>Show</option>
                                <option value="Hide" {{ $page->contact_status=='Hide' ? 'selected' : '' }}>Hide</option>
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