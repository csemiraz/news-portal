@extends('back-end.layouts.app')
@section('title', 'Create Online Poll')
@section('heading', 'Create Online Poll')
@section('button')
<a href="{{ route('admin_online_poll_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_online_poll_store') }}" method="post">
                        @csrf

                        <div class="form-group mb-3">
                            <label>Question *</label>
                            <textarea name="question" class="form-control" cols="30" rows="10" style="height: 100px"></textarea>
                        </div>
                    

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
            </div>
            </div>
        </div>
    </div>
    </div>
@endsection