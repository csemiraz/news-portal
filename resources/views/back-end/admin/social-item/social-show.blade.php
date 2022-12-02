@extends('back-end.layouts.app')

@section('title', 'Social Item Show')
@section('heading', 'Social Item')

@section('button')
<a href="{{ route('admin_social_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Create</a>
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
                                    <th>Preview</th>
                                    <th>Icon</th>
                                    <th>URL</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($social_item_data as $key=>$data)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                            <i class="{{ $data->icon }}"></i>
                                        </td>
                                        <td>{{ $data->icon }}</td>
                                        <td>{{ $data->url }}</td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('admin_social_edit', $data->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('admin_social_delete', $data->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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