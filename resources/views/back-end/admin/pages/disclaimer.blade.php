@extends('back-end.layouts.app')
@section('heading', 'Edit Disclaimer Page Content')
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_disclaimer_page_update') }}" method="post">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label>Disclaimer Title *</label>
                            <input type="text" name="disclaimer_title" value="{{ $page->disclaimer_title }}" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Disclaimer Detail *</label>
                            <textarea name="disclaimer_detail" class="form-control snote" cols="30" rows="10">{{ $page->disclaimer_detail }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label>Disclaimer Status</label>
                            <select name="disclaimer_status" class="form-control">
                                <option value="Show" {{ $page->disclaimer_status=='Show' ? 'selected' : '' }}>Show</option>
                                <option value="Hide" {{ $page->disclaimer_status=='Hide' ? 'selected' : '' }}>Hide</option>
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