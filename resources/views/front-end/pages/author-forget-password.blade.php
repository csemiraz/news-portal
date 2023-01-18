@extends('front-end.layouts.app')
@section('title', 'Forget Password')
@section('main_content')

<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Forget Password</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Forget Password</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('author_forget_password_submit') }}" method="post">
                    @csrf
                    <div class="login-form">
                        <div class="mb-3">
                            <label for="" class="form-label">Email Address</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary bg-website">Send Password Reset Link</button>
                        </div>
                        <div class="mb-3">
                            <a href="{{ route('author_login') }}">Back to the login page?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection