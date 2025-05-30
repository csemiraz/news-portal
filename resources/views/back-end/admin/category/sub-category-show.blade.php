@extends('back-end.layouts.app')

@section('title', 'Sub Category View')
@section('heading', 'Sub Category View')

@section('button')
<a href="{{ route('admin_sub_category_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Create</a>
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
                                    <th>Sub Category Name</th>
                                    <th>Category Name</th>
                                    <th>Sub Category Order</th>
                                    <th>Sub Category Status</th>
                                    <th>Show On Home?</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($sub_categories as $key=>$data)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $data->subcategory_name }}</td>
                                        <td>{{ $data->rCategory->category_name }}</td>
                                        <td>{{ $data->subcategory_order }}</td>
                                        <td>{{ $data->subcategory_status }}</td>
                                        <td>{{ $data->show_on_home }}</td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('admin_sub_category_edit', $data->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('admin_sub_category_delete', $data->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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