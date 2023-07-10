@extends('layouts.page')

@section('title')
<title>Gamekafe</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
@endsection

@section('content')
<div class="css-1iuj5ih">
    <div class="css-cydm8w">
        <div class="titleContainer css-x933z2">
            <h2 class="carouselTitle">Recommended for you</h2>
        </div>
        <div class="prime-carousel css-1nehx92">
            <ul class="prime-carousel-container css-lpurl3">
                <li class="primeCarouselLi">
                    <a class="css-h13zhk" href="https://www.crazygames.com/game/bloxdhop-io">
                        <div class="gameThumbTitleContainer">Bloxd.io</div><img class="GameThumbImage" loading="eager" src="{{ asset('images/games/') }}" fetchpriority="high">
                    </a>
                </li>
            </ul>
            <button class="arrow css-1pzb6vf" aria-label="Right arrow"></button>
        </div>
    </div>
    <div class="css-zyoi9w">
        <div class="titleContainer css-18689kv">
            <h2 class="carouselTitle">Feature game</h2>
        </div>
        <div class="prime-carousel css-1nehx92">
            <ul class="prime-carousel-container css-lpurl3">
                @foreach($featureGames as $feature)
                <li class="primeCarouselLi">
                    <a class="css-h13zhk" href="{{ $feature->link }}">
                        <div class="gameThumbTitleContainer">{{ $feature['name'] }}</div><img class="GameThumbImage" loading="eager" src="{{ asset($feature['thumbs']) }}">
                    </a>
                </li>
                @endforeach
            </ul><button class="arrow css-1pzb6vf" aria-label="Right arrow"></button>
        </div>
    </div>

    @foreach($gamesByCategory as $category)
    <div class="css-zyoi9w">
        <div class="titleContainer css-18689kv">
            <h2 class="carouselTitle">{{ ucfirst($category->name) }}</h2>
        </div>
        <div class="prime-carousel css-1nehx92">
            <ul class="prime-carousel-container css-lpurl3">
                @foreach($category->games as $game)
                <li class="primeCarouselLi">
                    <a class="css-h13zhk" href="{{ $feature->link }}">
                        <div class="gameThumbTitleContainer">{{ $game['name'] }}</div><img class="GameThumbImage" loading="eager" src="{{ asset($game['thumbs']) }}">
                    </a>
                </li>
                @endforeach
            </ul><button class="arrow css-1pzb6vf" aria-label="Right arrow"></button>
        </div>
    </div>
    @endforeach

    <div style="overflow-anchor:auto" class="css-41foc0">
        <div style="overflow:hidden" class="css-1xcs8fm">
            <div>
                <h2>Play the Newest Games Instantly</h2>
                <p>Gamekafe features the latest and best free online games. You can enjoy playing fun games without interruptions from downloads, intrusive ads, or pop-ups. Just load up your favorite games instantly in your web browser and enjoy the experience.</p>
                <p>You can play our games on desktop mobile devices. That includes everything from desktop PCs, laptops, and Chromebooks, to the latest smartphones and tablets from Apple and Android. </p>
            </div>
        </div>
    </div>
</div>
@endsection
