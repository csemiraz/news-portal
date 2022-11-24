@extends('back-end.layouts.app')
@section('heading', 'Edit Terms and Conditions Page Content')
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_terms_page_update') }}" method="post">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label>Terms Title *</label>
                            <input type="text" name="terms_title" value="{{ $page->terms_title }}" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Terms Detail *</label>
                            <textarea name="terms_detail" class="form-control snote" cols="30" rows="10">{{ $page->terms_detail }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label>Terms Status</label>
                            <select name="terms_status" class="form-control">
                                <option value="Show" {{ $page->terms_status=='Show' ? 'selected' : '' }}>Show</option>
                                <option value="Hide" {{ $page->terms_status=='Hide' ? 'selected' : '' }}>Hide</option>
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