@extends('back-end.layouts.app')
@section('title', 'Update Social Item')
@section('heading', 'Update Social Item')
@section('button')
<a href="{{ route('admin_social_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_social_update', $social_item->id) }}" method="post">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label>Icon Preview</label>
                            <div>
                                <i class="{{ $social_item->icon }}" style="font-size: 40px"></i>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Social Icon *</label>
                            <input type="text" name="icon" value="{{ $social_item->icon }}" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Social URL *</label>
                            <input type="text" name="url" value="{{ $social_item->url }}" class="form-control">
                        </div>

                
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
            </div>
            </div>
        </div>
    </div>
    </div>
@endsection