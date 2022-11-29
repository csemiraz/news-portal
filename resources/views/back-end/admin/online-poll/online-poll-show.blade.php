@extends('back-end.layouts.app')

@section('title', 'Online Poll')
@section('heading', 'Online Poll')

@section('button')
<a href="{{ route('admin_online_poll_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Create</a>
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
                                    <th>Question</th>
                                    <th>Yes Vote</th>
                                    <th>No Vote</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($online_polls as $key=>$data)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $data->question }}</td>
                                        <td>{{ $data->yes_vote }}</td>
                                        <td>{{ $data->no_vote }}</td>
                                      
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('admin_online_poll_edit', $data->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('admin_online_poll_delete', $data->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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