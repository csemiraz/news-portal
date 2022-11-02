@extends('back-end.layouts.app')
@section('title', 'Edit Post')
@section('heading', 'Update Post')
@section('button')
<a href="{{ route('admin_post_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_post_update', $post->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label>Post Title *</label>
                            <input type="text" value="{{ $post->post_title }}" name="post_title" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Post Detail *</label>
                            <textarea name="post_detail" cols="30" rows="10" class="form-control snote">{{ $post->post_detail }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label>Existing Photo</label><br>
                            <img src="{{ asset('assets/images/'.$post->post_photo) }}" style="width: 350px; height: 250px">
                        </div>

                        <div class="form-group mb-3">
                            <label>Change Photo</label>
                            <input type="file" name="post_photo" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Select Category</label>
                            <select name="sub_category_id" class="form-control">
                                @foreach ($sub_categories as $item)
                                <option value="{{ $item->id }}" {{ $item->id==$post->sub_category_id ? 'selected' : '' }}>{{ $item->subcategory_name }} ({{ $item->rCategory->category_name }})</option>
                                @endforeach
                            </select>
                        </div> 

                        <div class="form-group mb-3">
                            <label>Is Shareable?</label>
                            <select name="is_share" class="form-control">
                                <option value="1" {{ $post->is_share==1 ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ $post->is_share==0 ? 'selected' : '' }}>No</option>
                            </select>
                        </div> 

                        <div class="form-group mb-3">
                            <label>Is Comment?</label>
                            <select name="is_comment" class="form-control">
                                <option value="1" {{ $post->is_comment==1 ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ $post->is_comment==0 ? 'selected' : '' }}>No</option>
                            </select>
                        </div> 

                        <div class="form-group mb-3">
                            <label>Existing Tags</label>
                            <table class="table table-bordered">
                                @foreach($existing_tags as $item)
                                <tr>
                                    <td>{{ $item->tag_name }}</td>
                                    <td>
                                        <a href="{{ route('admin_tag_delete', $item->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>

                        <div class="form-group mb-3">
                            <label>Tags</label>
                            <input type="text" name="tags" class="form-control" placeholder="tag1,tag2,tag3.....">
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