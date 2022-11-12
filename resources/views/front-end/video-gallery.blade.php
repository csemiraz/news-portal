@extends('front-end.layouts.app')
@section('title', 'Video Gallery')
@section('main_content')

<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Video Gallery</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Video Gallery</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="video-gallery">
            <div class="row">
                @foreach($videos as $item)
                <div class="col-lg-3 col-md-4">
                    <div class="video-thumb">
                        <img src="http://img.youtube.com/vi/{{ $item->video_id }}/0.jpg" alt="">
                        <div class="bg"></div>
                        <div class="icon">
                            <a href="http://www.youtube.com/watch?v={{ $item->video_id }}" class="video-button"><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                    <div class="video-caption">
                        <a href="">{{ $item->video_caption }}</a>
                    </div>
                    <div class="video-date">
                        @php
                            $st = strtotime($item->created_at);
                            $date = date("M d, Y", $st);
                        @endphp
                        <i class="fas fa-calendar-alt"></i> {{ $date }}
                    </div>
                </div>
                @endforeach


                <div class="col-md-12">
                    <nav aria-label="Page navigation example">
                        {{ $videos->links() }}
                    </nav>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
