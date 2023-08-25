<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/error.css') }}">
</head>

<body class="bg-purple">
    <div class="stars">
        <div class="central-body">
            <h1 class="code-error">@yield('code')</h1>
            <h1>@yield('message')</h1>
            <a href="{{ route('home') }}" class="btn-go-home" target="_blank">{{ __('Về trang chủ') }}</a>
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
</body>

</html>
