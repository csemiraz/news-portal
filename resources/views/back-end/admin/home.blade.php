@extends('back-end.layouts.app')

@section('title', 'Admin Dashboard')
@section('heading', 'Dashboard')

@section('main_content')
<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fas fa-book-open"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total News</h4>
                </div>
                <div class="card-body">
                    {{ $total_posts }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="fas fa-book-open"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Category</h4>
                </div>
                <div class="card-body">
                    {{ $total_categories }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="fas fa-book-open"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Sub Category</h4>
                </div>
                <div class="card-body">
                    {{ $total_subcategories }}
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Authors</h4>
                </div>
                <div class="card-body">
                    {{ $total_authors }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Subscriber</h4>
                </div>
                <div class="card-body">
                    {{ $total_subscribers }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="fas fa-book-open"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>New Subscribers Today</h4>
                </div>
                <div class="card-body">
                    {{ $new_subscribers_today }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Recent News</h3>
            </div>
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
                            <th>Admin</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($recent_news as $key=>$data)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    <img src="{{ asset('assets/images/'.$data->post_photo) }}" style="width:100px; height:100px;">
                                </td>
                                <td>{{ $data->post_title }}</td>
                                <td>{{ $data->rSubCategory->subcategory_name }}</td>
                                <td>{{ $data->rSubCategory->rCategory->category_name }}</td>
                                <td>{{ Auth::guard('admin')->user()->name }}</td>
                                <td class="pt_10 pb_10">
                                    <a href="{{ route('admin_post_edit', $data->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('admin_post_delete', $data->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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
@endsection