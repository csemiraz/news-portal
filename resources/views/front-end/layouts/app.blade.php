<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
        <meta name="description" content="">
        <title>@yield('title')</title>        
		
        <link rel="icon" type="image/png" href="{{ asset('assets/images/'.$global_setting_data->favicon) }}">

        <!-- All CSS -->
        @include('front-end.layouts.partial.styles')
        
        <!-- All Javascripts -->
        @include('front-end.layouts.partial.scripts')

        <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">

        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6212352ed76fda0a"></script>        
        
        <!-- Google Analytics -->
        @if($global_setting_data->analytic_status=='Show')
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $global_setting_data->analytic_id }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{ $global_setting_data->analytic_id }}');
        </script>
        @endif


    <style>
        .website-menu,
        .website-menu .bg-primary,
        .acme-news-ticker-label,
        .search-section button[type="submit"],
        .home-content .left .news-total-item .see-all a,
        .video-content,
        .footer ul.social li a,
        .footer input[type="submit"],
        .scroll-top,
        .widget .poll button,
        .nav-pills .nav-link.active,
        .related-news .owl-nav .owl-prev,
        .related-news .owl-nav .owl-next,
        .bg-website,
        .page-item.active .page-link {
            background: #{{ $global_setting_data->theme_color_1 }}!important;
        }

        .acme-news-ticker,
        .page-item.active .page-link {
            border-color: #{{ $global_setting_data->theme_color_1 }}!important;
        }

        ul.my-news-ticker li a,
        .home-content .left .news-total-item .left-side h3 a:hover,
        .home-content .left .news-total-item .right-side-item .right h2 a:hover,
        .home-content .left .news-total-item .left-side .date-user .user a:hover, 
        .home-content .left .news-total-item .left-side .date-user .date a:hover,
        .home-content .left .news-total-item .right-side-item .right .date-user .user a:hover, 
        .home-content .left .news-total-item .right-side-item .right .date-user .date a:hover,
        .widget .news-item .right h2 a:hover,
        .widget .news-item .right .date-user .user a:hover, 
        .widget .news-item .right .date-user .date a:hover,
        .nav-pills .nav-link,
        .video-carousel .owl-nav .owl-prev,
        .video-carousel .owl-nav .owl-next,
        li.breadcrumb-item a,
        .category-page-post-item h3 a:hover,
        .category-page-post-item .date-user .user a:hover, 
        .category-page-post-item .date-user .date a:hover,
        .related-news .item h3 a:hover,
        .related-news .item .date-user .user a:hover, 
        .related-news .item .date-user .date a:hover,
        .accordion-button:not(.collapsed),
        .login-form a,
        ul.pagination .page-link {
            color: #{{ $global_setting_data->theme_color_1 }}!important;
        }


        .home-main .inner .text-inner .category span, 
        .home-main .inner .text-inner .category span a,
        .home-content .left .news-total-item .left-side .category span, 
        .home-content .left .news-total-item .left-side .category span a,
        .home-content .left .news-total-item .right-side-item .right .category span, 
        .home-content .left .news-total-item .right-side-item .right .category span a,
        .widget .news-item .right .category span, 
        .widget .news-item .right .category span a,
        .category-page-post-item .category span, 
        .category-page-post-item .category span a,
        .tag-section-content span {
            background: #{{ $global_setting_data->theme_color_2 }}!important;
        }

        .nav-pills .nav-link.active,
        .page-item.active .page-link {
            color: #fff!important;
        }

    </style>

    </head>
    <body>

        @include('front-end.layouts.partial.header')

        @include('front-end.layouts.partial.navbar')

        
        @yield('main_content')
        

        @include('front-end.layouts.partial.footer')
     
        <div class="scroll-top">
            <i class="fas fa-angle-up"></i>
        </div>
		
       @include('front-end.layouts.partial.scripts_footer')   
       
       
       @if($errors->any())
    @foreach ($errors->all() as $error)
    <script>
        iziToast.error({
            title: '',
            position: 'topRight',
            message: '{{ $error }}'
        });
    </script>
    @endforeach
@endif

@if(session()->has('success'))
    <script>
        iziToast.success({
            title: '',
            position: 'topRight',
            message: '{{ session()->get('success') }}'
        });
    </script>
@endif

@if(session()->has('error'))
    <script>
        iziToast.error({
            title: '',
            position: 'topRight',
            message: '{{ session()->get('error') }}'
        });
    </script>
@endif
		
   </body>
</html>