@extends('back-end.layouts.app')
@section('title', 'Create Category')
@section('heading', 'Create Category')
@section('button')
<a href="{{ route('admin_category_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_category_store') }}" method="post">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label>Category Name *</label>
                            <input type="text" name="category_name" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Cateogry Order *</label>
                            <input type="text" name="category_order" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Category Status</label>
                            <select name="category_status" class="form-control">
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