@extends('back-end.layouts.app')

@section('title', 'Sidebar Advertisement')
@section('heading', 'Sidebar Advertisement')

@section('button')
<a href="{{ route('admin_sidebar_ad_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Create</a>
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
                                    <th>Photo</th>
                                    <th>URL</th>
                                    <th>Location</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($sidebar_ad_data as $key=>$data)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                            <img style="width: 200px; height:150px" src="{{ asset('assets/front-end/uploads/'.$data->sidebar_ad_photo) }}" alt="sidebar_ad_photo">
                                        </td>
                                        <td>{{ $data->sidebar_ad_url }}</td>
                                        <td>{{ $data->sidebar_ad_location }}</td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('admin_sidebar_ad_edit', $data->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('admin_sidebar_ad_delete', $data->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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