<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
        <meta name="description" content="">
        <title>@yield('title')</title>        
		
        <link rel="icon" type="image/png" href="{{ asset('assets/front-end/') }}/uploads/favicon.png">

        <!-- All CSS -->
        @include('front-end.layouts.partial.styles')
        
        <!-- All Javascripts -->
        @include('front-end.layouts.partial.scripts')

        <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">

        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6212352ed76fda0a"></script>        
        
        <!-- Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-84213520-6"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-84213520-6');
        </script>

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