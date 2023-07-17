<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="shortcut icon" href="/images/ico.ico" type="image/x-icon">
    <link rel="stylesheet" href="/fonts/font-awesome/css/font-awesome.min.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div id="app">
        <div>
            @include('navigation')
        </div>

        <main class="py-3">
            @include('alert')
            @yield('content')

            <a href="https://wa.me/6285820226510?text=*halo%20admin,%20saya%20pelanggan%20v-citife%20ingin%20bertanya*%20" class="whats-app rounded-circle shadow" target="_blank">
                <i class="fa fa-whatsapp my-float" aria-hidden="true"></i>
            </a>

        </main>

        <div>
            @include('footer')
        </div>
    </div>

    <script src="/js/script.js"></script>
</body>
</html>
