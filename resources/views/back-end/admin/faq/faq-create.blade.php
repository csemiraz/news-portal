@extends('back-end.layouts.app')
@section('title', 'Create FAQ')
@section('heading', 'Create FAQ')
@section('button')
<a href="{{ route('admin_faq_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_faq_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label>FAQ Title *</label>
                            <input type="text" name="faq_title" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>FAQ Detail *</label>
                            <textarea name="faq_detail" cols="30" rows="10" class="form-control snote"></textarea>
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