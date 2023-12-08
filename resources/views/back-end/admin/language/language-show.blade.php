@extends('back-end.layouts.app')

@section('title', 'Languages')
@section('heading', 'Languages')

@section('button')
<a href="{{ route('admin_language_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Create</a>
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
                                    <th>Name</th>
                                    <th>Short Name</th>
                                    <th>Is Default?</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($languages as $key=>$data)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->short_name }}</td>
                                        <td>{{ $data->is_default }}</td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('admin_language_edit', $data->id) }}" class="btn btn-primary" aria-readonly="">Edit</a>
                                            @if($data->is_default == 'Yes')
                                            <button class="btn btn-danger" disabled>Delete</button>
                                            @else
                                            <a href="{{ route('admin_language_delete', $data->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
                                            @endif
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