<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <link rel="icon" type="image/png" href="{{ asset('assets/back-end/uploads/favicon.png') }}">

    <title>@yield('title')</title>

    @include('back-end.layouts.partial.styles')


    @include('back-end.layouts.partial.scripts')

</head>

<body>
<div id="app">
    <div class="main-wrapper">

       @include('back-end.layouts.partial.nav')


        @include('back-end.layouts.partial.sidebar')

        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>@yield('heading')</h1>
                </div>
                
                @yield('main_content')

            </section>
        </div>

    </div>
</div>

@include('back-end.layouts.partial.scripts_footer')


</body>
</html>