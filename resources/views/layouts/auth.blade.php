<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Gamefake') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/error.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="bg-purple">
    <div id="app">
        <div class="stars">
            <div class="central-body">
                @yield('content')
            </div>
            <div class="objects">
                <img class="object_rocket" src="{{ asset('svg/rocket.svg') }}" width="40px">
                <div class="earth-moon">
                    <img class="object_earth" src="{{ asset('svg/earth.svg') }}" width="100px">
                    <img class="object_moon" src="{{ asset('svg/moon.svg') }}" width="80px">
                </div>
                <div class="box_astronaut">
                    <img class="object_astronaut" src="{{ asset('svg/astronaut.svg') }}" width="140px">
                </div>
            </div>
            <div class="glowing_stars">
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
            </div>
        </div>
    </div>
</body>

</html>
