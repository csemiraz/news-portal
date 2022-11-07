@extends('back-end.layouts.app')
@section('title', 'Create Sub Category')
@section('heading', 'Create Sub Category')
@section('button')
<a href="{{ route('admin_sub_category_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_sub_category_store') }}" method="post">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label>Sub Category Name *</label>
                            <input type="text" name="subcategory_name" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Category Name</label>
                            <select name="category_id" class="form-control">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label>Sub Cateogry Order *</label>
                            <input type="text" name="subcategory_order" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Sub Category Status</label>
                            <select name="subcategory_status" class="form-control">
                                <option value="Show">Show</option>
                                <option value="Hide">Hide</option>
                            </select>
                        </div> 

                        <div class="form-group mb-3">
                            <label>Show On Home?</label>
                            <select name="show_on_home" class="form-control">
                                <option value="Show">Show</option>
                                <option value="Hide">Hide</option>
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