@extends('back-end.layouts.app')

@section('title', 'Category Show')
@section('heading', 'Category')

@section('button')
<a href="{{ route('admin_category_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Create</a>
@endsection

@section('main_content')

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example1">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Category Name</th>
                                    <th>Category Order</th>
                                    <th>Category Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $key=>$data)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $data->category_name }}</td>
                                        <td>{{ $data->category_order }}</td>
                                        <td>{{ $data->category_status }}</td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('admin_category_edit', $data->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('admin_category_delete', $data->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
                                        </td>                                 
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection