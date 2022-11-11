@extends('front-end.layouts.app')
@section('title', 'Photo Gallery')
@section('main_content')

 
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Photo Gallery</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Photo Gallery</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="photo-gallery">
            <div class="row">

                @foreach($photo_galleries as $item)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="photo-thumb">
                        <img src="{{ asset('assets/images/'.$item->photo) }}" alt="">
                        <div class="bg"></div>
                        <div class="icon">
                            <a href="{{ asset('assets/images/'.$item->photo) }}" class="magnific"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="photo-caption">
                        <a href="">{{ $item->caption }}</a>
                    </div>
                    <div class="photo-date">
                        @php
                            $st = strtotime($item->created_at);
                            $date = date("j F, Y", $st);
                        @endphp
                        <i class="fas fa-calendar-alt"></i> {{ $date }}
                    </div>
                </div>
                @endforeach


                <div class="col-md-12">
                    {{ $photo_galleries->links() }}
                </div>

            </div>
        </div>
    </div>
</div>

@endsection