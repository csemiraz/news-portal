@extends('front-end.layouts.app')
@section('title', 'News Detail')
@section('main_content')

<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $post_detail->post_title }}</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('news-category', $post_detail->sub_category_id) }}">{{ $post_detail->rSubCategory->subcategory_name }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $post_detail->post_title }}</li>
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
                <div class="featured-photo">
                    <img src="{{ asset('assets/images/'.$post_detail->post_photo) }}" alt="">
                </div>
                <div class="sub">
                    <div class="item">
                        <b><i class="fas fa-user"></i></b>
                        <a href="javascript:void(0)">{{ $user_data->name }}</a>
                    </div>
                    <div class="item">
                        <b><i class="fas fa-edit"></i></b>
                        <a href="{{ route('news-category', $post_detail->sub_category_id) }}">{{ $post_detail->rSubCategory->subcategory_name }}</a>
                    </div>
                    <div class="item">
                        <b><i class="fas fa-clock"></i></b>
                        @php
                            $st = strtotime($post_detail->updated_at);
                            $date = date("j F, Y", $st);
                        @endphp
                        {{-- 25 February, 2022 --}}
                        {{ $date }}
                    </div>
                    <div class="item">
                        <b><i class="fas fa-eye"></i></b>
                        {{ $post_detail->post_views }}
                    </div>
                </div>
                <div class="main-text">
                    {!! $post_detail->post_detail !!}
                </div>
                <div class="tag-section">
                    <h2>Tags</h2>
                    <div class="tag-section-content">
                        @foreach($tags as $item)
                        <a href="{{ route('news_tags', $item->tag_name) }}"><span class="badge bg-success">{{ $item->tag_name }}</span></a>
                        @endforeach
                    </div>
                </div>
                
                @if($post_detail->is_share == 1)
                <div class="share-content">
                    <h2>Share</h2>
                    <div class="addthis_inline_share_toolbox"></div>
                </div>
                @endif

                @if($post_detail->is_comment == 1)
                <div class="comment-fb">
                    <div id="disqus_thread"></div>
                    <script>
                        
                        (function() { // DON'T EDIT BELOW THIS LINE
                        var d = document, s = d.createElement('script');
                        s.src = 'https://news-portal-2023.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                        })();
                    </script>
                </div>
                @endif
                



                <div class="related-news">
                    <div class="related-news-heading">
                        <h2>Related News</h2>
                    </div>
                    <div class="related-post-carousel owl-carousel owl-theme">

                        @foreach ($related_post as $item)
                        @if($item->id == $post_detail->id)
                            @continue
                        @endif
                        <div class="item">
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
                                        $user_data = \App\Models\Admin::where('id',$item->admin_id)->first();
                                        @endphp
                                    @else
                                        @php
                                        $user_data = \App\Models\Author::where('id',$item->author_id)->first();
                                        @endphp
                                    @endif
                                    <a href="javascript:void(0)">{{ $user_data->name }}</a>
                                </div>
                                <div class="date">
                                    @php
                                        $st = strtotime($item->updated_at);
                                        $date = date("j M, Y", $st);
                                    @endphp
                                    <a href="javascript:void(0)">{{ $date }}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
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