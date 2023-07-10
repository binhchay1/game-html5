<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=5.0, width=device-width, height=device-height">
    <meta name="theme-color" content="#ffffff">

    <link rel="preconnect" href="https://videos.crazygames.com/" crossorigin="anonymous">
    <link rel="preconnect" href="https://workers.crazygames.com/" crossorigin="anonymous">
    <link rel="preconnect" href="https://images.crazygames.com/" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <link rel="preconnect" href="https://builds.crazygames.com" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body dir="ltr">
<div id="__next">
    <div style="pointer-events:auto" class="css-1f20jmh">
        <header id="czyHeader" class="css-14otk5e">
            @include('page.user.layout.header')
        </header>
        <div class="css-v2g78o"></div>
        <nav id="mainNav" class="css-eolj6i">
            @include('page.user.layout.sidebar')
        </nav>
        <div class="css-wwwalv"></div>
        <div id="one_tap_container" style="position: fixed; top: 60px; right: 20px; z-index: 9999;"></div>
        <main id="layoutMain" class="css-oi51ei">
            <div class="css-linpkp">
                <div class="css-19dlbhf"></div>
            </div>
            @include('page.user.layout.homepage')
        </main>
    </div>
</div>
</body>

</html>
