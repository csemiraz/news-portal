@extends('back-end.layouts.app')

@section('title', 'Subscribers')
@section('heading', 'Subscribers')

@section('button')
<a href="{{ route('admin_subscribers_send_email') }}" class="btn btn-primary"><i class="fas fa-envelope"></i> Send Email to Subscribers</a>
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
                                    <th>Subscriber Email</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($subscribers as $key=>$data)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $data->email }}</td>                               
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