@extends('back-end.layouts.app')

@section('title', 'Photo Gallery')
@section('heading', 'Photo Galleries')

@section('button')
<a href="{{ route('admin_photo_gallery_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Create</a>
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
                                    <th>Caption</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($photo_galleries as $key=>$data)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                            <img src="{{ asset('assets/images/'.$data->photo) }}" style="width: 150px; height: 150px" alt="">
                                        </td>
                                        <td>{{ $data->caption }}</td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('admin_photo_gallery_edit', $data->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('admin_photo_gallery_delete', $data->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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