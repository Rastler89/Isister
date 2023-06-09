<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @yield('styles')
</head>
<body>
    <div id="app">
        @if(Auth::guest())
            @if(!str_contains(url()->current(), '/login') && !str_contains(url()->current(), 'register'))
                @include('layouts.header_public')
            @endif
        @else
            @include('layouts.header_private')
        @endif
 
        <main>
            @yield('content')
        </main>

        @if(!str_contains(url()->current(), '/login') && !str_contains(url()->current(), 'register'))
        @include('layouts.footer_public')
        @endif
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    @yield('javascript')
</body>
</html>
