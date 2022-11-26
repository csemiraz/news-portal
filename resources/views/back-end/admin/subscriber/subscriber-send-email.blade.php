@extends('back-end.layouts.app')
@section('title', 'Send Email To Subscriber')
@section('heading', 'Send Email To Subscriber')
@section('button')
<a href="{{ route('admin_subscribers') }}" class="btn btn-primary"><i class="fas fa-eye"></i> Subscribers</a>
@endsection
@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_subscribers_send_email_submit') }}" method="post">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label>Subject *</label>
                            <input type="text" name="subject" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Messaage *</label>
                            <textarea name="message" class="form-control snote" cols="30" rows="10"></textarea>
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