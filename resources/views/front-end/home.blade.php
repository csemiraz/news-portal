@extends('front-end.layouts.app')
@section('title', 'News Portal')
@section('main_content')

{{-- Home News Ticker --}}
@if($setting_data->news_ticker_status=='Show')
<div class="news-ticker-item">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="acme-news-ticker">
                    <div class="acme-news-ticker-label">Latest News</div>
                    <div class="acme-news-ticker-box">
                        <ul class="my-news-ticker">
                            @php
                                $i=0;
                            @endphp
                            @foreach($post_data as $item)
                            @php
                                $i++;
                            @endphp
                            @if($i>$setting_data->news_ticker_total)
                                @break;
                            @endif
                            <li><a href="{{ route('news_detail', $item->id) }}">{{ $item->post_title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

{{-- Featured News --}}
<div class="home-main">
    <div class="container">
        <div class="row g-2">
            <div class="col-lg-8 col-md-12 left">
                <div class="inner">
                    @php
                        $i=0;
                    @endphp
                    @foreach($post_data as $item)
                    @php
                        $i++;
                    @endphp
                    @if($i>1)
                        @break;
                    @endif
                    <div class="photo">
                        <div class="bg"></div>
                        <img src="{{ asset('assets/images/'.$item->post_photo) }}" alt="">
                        <div class="text">
                            <div class="text-inner">
                                <div class="category">
                                    <span class="badge bg-success badge-sm">{{ $item->rSubCategory->subcategory_name }}</span>
                                </div>
                                <h2><a href="{{ route('news_detail', $item->id) }}">{{ $item->post_title }}</a></h2>
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
        
                                        <a href="">{{ $user_data->name }}</a>
                                    </div>
                                    <div class="date">
                                        @php
                                            $st = strtotime($item->updated_at);
                                            $date = date("j F, Y", $st);
                                        @endphp
                                        <a href="">{{ $date }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                @php
                    $i=0;
                @endphp
                @foreach($post_data as $item)
                @php
                    $i++;
                @endphp
                
                    @if($i==1)
                        @continue;
                    @endif
            
                    @if($i>3)
                        @break;
                    @endif
                <div class="inner inner-right">
                    <div class="photo">
                        <div class="bg"></div>
                        <img src="{{ asset('assets/images/'.$item->post_photo) }}" alt="">
                        <div class="text">
                            <div class="text-inner">
                                <div class="category">
                                    <span class="badge bg-success badge-sm">{{ $item->rSubCategory->subcategory_name }}</span>
                                </div>
                                <h2><a href="{{ route('news_detail', $item->id) }}">{{ $item->post_title }}</a></h2>
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
                                            $date = date("j F, Y", $st);
                                        @endphp
                                        <a href="javascript:void(0)">{{ $date }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@if($home_ad_data->above_search_ad_status=='Show')
<div class="ad-section-2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if($home_ad_data->above_search_ad_url!='')
                <a href="{{ $home_ad_data->above_search_ad_url }}">
                    <img src="{{ asset('assets/front-end/uploads/'.$home_ad_data->above_search_ad) }}" alt="">
                </a>
                @else
                <img src="{{ asset('assets/front-end/uploads/'.$home_ad_data->above_search_ad) }}" alt="">
                @endif 
            </div>
        </div>
    </div>
</div>
@endif

<div class="search-section">
    <div class="container">
        <div class="inner">
            <form action="{{ route('search_result') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" name="search_text" class="form-control" placeholder="Title or Description">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="category" id="category" class="form-select">
                                <option value="">Select Category</option>
                                @foreach ($category_data as $item)
                                    <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="sub_category" id="sub_category" class="form-select">
                                <option value="">Select SubCategory</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>

<div class="home-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6 left-col">
                <div class="left">

                    @foreach($sub_category_data as $item)

                    @if(count($item->rPost)==0)
                        @continue;
                    @endif

                    <!-- News Of Category -->
                    <div class="news-total-item">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <h2>{{ $item->subcategory_name }}</h2>
                            </div>
                            <div class="col-lg-6 col-md-12 see-all">
                                <a href="{{ route('news-category', $item->id) }}" class="btn btn-primary btn-sm">See All News</a>
                            </div>
                            <div class="col-md-12">
                                <div class="bar"></div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($item->rPost as $single)
            
                                @if($loop->iteration==2)
                                    @break;
                                @endif

                            <div class="col-lg-6 col-md-12">
                                <div class="left-side">
                                    <div class="photo">
                                        <img src="{{ asset('assets/images/'.$single->post_photo) }}" alt="">
                                    </div>
                                    <div class="category">
                                        <span class="badge bg-success">{{ $item->subcategory_name }}</span>
                                    </div>
                                    <h3><a href="{{ route('news_detail', $single->id) }}">{{ $single->post_title }}</a></h3>
                                    <div class="date-user">
                                        <div class="user">
                                            @if($single->author_id==0)
                                            @php
                                               $user_data = \App\Models\Admin::where('id', $single->admin_id)->first();  
                                            @endphp
                                               
                                            @else
                                            @php
                                                $user_data = \App\Models\Author::where('id', $single->author_id)->first();
                                            @endphp
                                                
                                            @endif
                                            <a href="">{{ $user_data->name }}</a>
                                        </div>
                                        <div class="date">
                                            @php
                                            $st = strtotime($item->updated_at);
                                            $date = date("j F, Y", $st);
                                        @endphp
                                        <a href="">{{ $date }}</a>
                                        </div>
                                    </div>
                                    <p>
                                       
                                        
                                        {!! Str::limit($single->post_detail, '350') !!}

                                    </p>
                                </div>
                            </div>
                            @endforeach

                            <div class="col-lg-6 col-md-12">
                                <div class="right-side">
                                    @foreach ($item->rPost as $single)

                                    @if($loop->iteration==1)
                                        @continue;
                                    @endif

                                    @if($loop->iteration==6)
                                        @break;
                                    @endif
                                   
                                    <div class="right-side-item">
                                        <div class="left">
                                            <img src="{{ asset('assets/images/'.$single->post_photo) }}" alt="">
                                        </div>
                                        <div class="right">
                                            <div class="category">
                                                <span class="badge bg-success">{{ $item->subcategory_name }}</span>
                                            </div>
                                            <h2><a href="{{ route('news_detail', $single->id) }}">{{ $single->post_title }}</a></h2>
                                            <div class="date-user">
                                                <div class="user">
                                                    @if($single->author_id==0)
                                                    @php
                                                        $user_data=\App\Models\Admin::where('id', $single->admin_id)->first();
                                                    @endphp
                                                    @else
                                                    @php
                                                        $user_data=\App\Models\Author::where('id', $single->author_id)->first();
                                                    @endphp
                                                    @endif
                                                    <a href="">{{ $user_data->name }}</a>

                                                </div>
                                                <div class="date">
                                                    @php
                                                        $st = strtotime($single->updated_at);
                                                        $date=date("j F, Y", $st);
                                                    @endphp
                                                    <a href="">{{ $date }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                    <!-- // News Of Category -->


                </div>
            </div>
            <div class="col-lg-4 col-md-6 sidebar-col">

                @include('front-end.layouts.partial.sidebar')
                
            </div>
        </div>
    </div>
</div>


<div class="video-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="video-heading">
                    <h2>Videos</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="video-carousel owl-carousel">
                    @foreach($home_videos as $item)
                    <div class="item">
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
                                $date = date('M d, Y', $st);
                            @endphp
                            <i class="fas fa-calendar-alt"></i> {{ $date }}
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>

@if($home_ad_data->above_footer_ad_status=='Show')
<div class="ad-section-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if($home_ad_data->above_footer_ad_url!='')
                <a href="{{ $home_ad_data->above_footer_ad_url }}">
                    <img src="{{ asset('assets/front-end/uploads/'.$home_ad_data->above_footer_ad) }}" alt="">
                </a>
                @else
                <img src="{{ asset('assets/front-end/uploads/'.$home_ad_data->above_footer_ad) }}" alt="">
                @endif
            </div>
        </div>
    </div>
</div>
@endif


<script>
    (function($){
        $(document).ready(function(){
            $("#category").on("change", function(){
                var categoryId = $("#category").val();
                if(categoryId) {
                    $.ajax({
                        type: "get",
                        url: "{{ url('/subcategory-by-category/') }}" + "/" + categoryId,
                        success: function(response) {
                            $("#sub_category").html(response.sub_category_data);
                        },
                        error:function(err){

                        }
                    })
                }
            })
        });
    })(jQuery);
</script>


@endsection