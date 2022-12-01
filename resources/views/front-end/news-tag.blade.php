@extends('front-end.layouts.app')
@section('title', 'News Tag')
@section('main_content')

<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>All posts of {{ $tag_name }}</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item">Tag</li>
                        <li class="breadcrumb-item active">{{ $tag_name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6"> 
                <div class="category-page">
                    <div class="row">

                       {{--  @if(count($all_posts))
                        @foreach($all_posts as $item)
                        @if(!in_array($item->id,$all_post_ids))
                            @continue
                        @endif --}}

                        @if(count($posts)>0)

                        @foreach($posts as $row)
                            @foreach ($row as $item)
                            <div class="col-lg-6 col-md-12">
                                <div class="category-page-post-item">
                                    <div class="photo">
                                        <img src="{{ asset('assets/images/'.$item->post_photo) }}" alt="">
                                    </div>
                                    <div class="category">
                                        <span class="badge bg-success">{{ $item->rSubCategory->subcategory_name }}</span>
                                    </div>
                                    <h3><a href="{{ route('news_detail', $item->id) }}">{{ $item->post_title }}</a></h3>
                                    <div class="date-user">
                                        <div class="user">
                                            @if($item->author_id==0)
                                                @php
                                                    $user_data = \App\Models\Admin::where('id', $item->admin_id)->first();
                                                @endphp
                                            @else
                                                @php
                                                    $user_data = \App\Models\Admin::where('id', $item->admin_id)->first();
                                                @endphp
                                            @endif
                                            <a href="javascript:void(0)">{{ $user_data->name }}</a>
                                        </div>
                                        <div class="date">
                                            @php
                                                $st = strtotime($item->updated_at);
                                                $date = date("j F,Y", $st);
                                            @endphp
                                            <a href="javascript:void(0)">{{ $date }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach             
                        @endforeach

                        @else
                        <h2 class="text-danger">No news found under the categories!</h2>
                        @endif
                        

                       

                    </div>
                </div>

            </div>

            <div class="col-lg-4 col-md-6 sidebar-col">

                @include('front-end.layouts.partial.sidebar')
                
            </div>

            

        </div>
    </div>
</div>


@endsection