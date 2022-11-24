@extends('back-end.layouts.app')
@section('heading', 'Edit Login Page Content')
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_login_page_update') }}" method="post">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label>Login Title *</label>
                            <input type="text" name="login_title" value="{{ $page->login_title }}" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Login Status</label>
                            <select name="login_status" class="form-control">
                                <option value="Show" {{ $page->login_status=='Show' ? 'selected' : '' }}>Show</option>
                                <option value="Hide" {{ $page->login_status=='Hide' ? 'selected' : '' }}>Hide</option>
                            </select>
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