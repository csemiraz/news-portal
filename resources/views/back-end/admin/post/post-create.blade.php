@extends('back-end.layouts.app')
@section('title', 'Create Post')
@section('heading', 'Create Post')
@section('button')
<a href="{{ route('admin_post_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_post_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label>Post Title *</label>
                            <input type="text" name="post_title" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Post Detail *</label>
                            <textarea name="post_detail" cols="30" rows="10" class="form-control snote"></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label>Post Photo *</label>
                            <input type="file" name="post_photo" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Select Category</label>
                            <select name="sub_category_id" class="form-control">
                                @foreach ($sub_categories as $item)
                                <option value="{{ $item->id }}">{{ $item->subcategory_name }} ({{ $item->rCategory->category_name }})</option>
                                @endforeach
                            </select>
                        </div> 

                        <div class="form-group mb-3">
                            <label>Is Shareable?</label>
                            <select name="is_share" class="form-control">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div> 

                        <div class="form-group mb-3">
                            <label>Is Comment?</label>
                            <select name="is_comment" class="form-control">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div> 

                        <div class="form-group mb-3">
                            <label>Tags</label>
                            <input type="text" name="tags" class="form-control" placeholder="tag1,tag2,tag3.....">
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