<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <link rel="icon" type="image/png" href="{{ asset('assets/back-end/uploads/favicon.png') }}">

    <title>Admin Forget Password</title>

    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">

    @include('back-end.layouts.partial.styles')

    @include('back-end.layouts.partial.scripts')

</head>

<body>
<div id="app">
    <div class="main-wrapper">
        <section class="section">
            <div class="container container-login">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="card card-primary border-box">
                            <div class="card-header card-header-auth">
                                <h4 class="text-center">Reset Password</h4>
                                @if(Session::has('error'))
                                    <h4 class="text-danger text-center">{{ Session::get('error') }}</h4>
                                @endif
                            </div>
                            <div class="card-body card-body-auth">
                                <form method="POST" action="{{ route('admin_forget_password_submit') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="email" placeholder="Email Address" value="" autofocus>
                                    @error('email')
                                      <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Send Password Reset Link
                                        </button>
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <a href="{{ route('admin_login') }}">
                                                Back to login page
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@include('back-end.layouts.partial.scripts_footer')

</body>
</html>