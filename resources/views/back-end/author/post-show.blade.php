@extends('back-end.author.layouts.app')

@section('title', 'Author | Posts')
@section('heading', 'Posts')

@section('button')
<a href="{{ route('author_post_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Create</a>
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
                                    <th>Thumbnail</th>
                                    <th>Post Title</th>
                                    <th>Sub Category</th>
                                    <th>Category</th>
                                    <th>Author</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($posts as $key=>$data)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                            <img src="{{ asset('assets/images/'.$data->post_photo) }}" style="width:100px; height:100px;">
                                        </td>
                                        <td>{{ $data->post_title }}</td>
                                        <td>{{ $data->rSubCategory->subcategory_name }}</td>
                                        <td>{{ $data->rSubCategory->rCategory->category_name }}</td>
                                        <td>{{ Auth::guard('author')->user()->name }}</td>
                                       
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('author_post_edit', $data->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('author_post_delete', $data->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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