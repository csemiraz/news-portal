@extends('back-end.layouts.app')

@section('title', 'Live Channels')
@section('heading', 'Live Channels')

@section('button')
<a href="{{ route('admin_live_channel_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Create</a>
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
                                    <th>Heading</th>
                                    <th>Video</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($live_channels as $key=>$data)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $data->heading }}</td>
                                        <td>
                                            <iframe style="width: 250px; height: 200px;" width="560" height="315" src="https://www.youtube.com/embed/{{ $data->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        </td>
                                      
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('admin_live_channel_edit', $data->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('admin_live_channel_delete', $data->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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