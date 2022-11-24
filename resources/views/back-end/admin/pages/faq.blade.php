@extends('back-end.layouts.app')
@section('heading', 'Edit FAQ Page Content')
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_faq_page_update') }}" method="post">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label>FAQ Title *</label>
                            <input type="text" name="faq_title" value="{{ $page->faq_title }}" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>FAQ Detail</label>
                            <textarea name="faq_detail" class="form-control snote" cols="30" rows="10">{{ $page->faq_detail }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label>FAQ Status</label>
                            <select name="faq_status" class="form-control">
                                <option value="Show" {{ $page->faq_status=='Show' ? 'selected' : '' }}>Show</option>
                                <option value="Hide" {{ $page->faq_status=='Hide' ? 'selected' : '' }}>Hide</option>
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