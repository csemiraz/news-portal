@extends('back-end.layouts.app')

@section('title', 'Author Show')
@section('heading', 'Author')

@section('button')
<a href="{{ route('admin_author_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Create</a>
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
                                    <th>Author Name</th>
                                    <th>Author Email</th>
                                    <th>Author Photo</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($authors as $key=>$data)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>
                                            @if($data->photo == NULL)
                                            <img src="{{ asset('assets/images/no-image.jpg') }}" alt="No Image" style="width: 100%; height: 120px">
                                            @else
                                            <img src="{{ asset('assets/images/'.$data->photo) }}" alt="{{ $data->name }}" style="width: 100%; height: 120px">
                                            @endif
                                        </td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('admin_author_edit', $data->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('admin_author_delete', $data->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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