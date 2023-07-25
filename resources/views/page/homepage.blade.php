@extends('layouts.page')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }}</title>
@endsection

@section('css')
<link rel="manifest" href="{{ asset('json/manifest.json') }}" crossorigin="use-credentials">
<style type="text/css">
    .disable-link {
        cursor: not-allowed;
        pointer-events: none;
        opacity: 0.5;
    }

    .top-tags ul li {
        list-style-type: none;
    }

    .top-tags ul {
        display: flex;
        flex-direction: row;
    }
</style>
@endsection

@section('content')
<div class="main">
    <div class="categories-tags-block box">
        <div class="top-categories">
            <div class="row single-line">
                <ul>
                    @foreach($listCategory as $category)
                    <li class="inactive {{ $category['name'] }} li-category">
                        <a class="{{ $category['name'] }}" title="{{ $category['title'] }}" href="{{ route('category', ['category' => $category['name']]) }}">
                            <span class="name">{{ ucfirst($category['name']) }}</span>
                            <span class="number">{{ $category['games_count'] }} game</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="top-tags">
            <div class="row single-line">
                <ul>
                    @foreach($listTag as $tag)
                    <li style="margin-top: 5px;">
                        <a class="tag" href="{{ route('tags', ['tag' => $tag]) }}">
                            <h4>
                                {{ $tag }}
                            </h4>
                        </a>
                    </li>
                    @endforeach
                    <li class="more-tags">
                        <a class="tag all-tags top" href="{{ route('listTags') }}">{{ __('Tất cả các thẻ') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="main js-search-trends">
    <div class="box search-trends-box">
        <div class="row single-line">
            <div class="search-trends-container col-md-12">
                <p class='h5'>{{ __('Tìm kiếm hàng đầu') }}</p>
                <div class="search-trends">
                    <ul>
                        @foreach($search as $keyword)
                        <li style="display: inline-block;">
                            <a href="{{ route('search') }}?q={{ $keyword['keyword'] }}" rel="nofollow">{{ $keyword['keyword'] }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="country-chooser-modal sub-menu">
    <div class="row controls-2">
        <div class="search-input-col col-md-12"></div>
    </div>
    <div class="row content-1">
        <div class="col-md-12 countries-container">
            <div class="countries"></div>
        </div>
    </div>
    <div class="row content-2">
        <div class="search-results"></div>
    </div>
</div>
<div class="tint"></div>
<div class="main">
    <div class="box items-grid no-background">
        <div class="row">
            <div class="item-title-container col-md-12">
                <h3 class="home-title">{{ __('Trò chơi') }} ({{ $countGame }})
                </h3>
            </div>
        </div>
        <div class="items-container" id="items_container">
            @foreach($games as $game)
            <div class="item thumb videobox grid-column">
                <a title="{{ __('Trò chơi') }} {{ $game['name'] }} - {{ __('Chơi trực tuyến tại') }} {{ env('APP_URL', 'Gamekafe.com') }}" href="{{ route('playGames', ['game' => strtolower(str_replace(' ', '-', $game['name']))]) }}">
                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="{{ $game['name'] }} - {{ ucfirst($game['category']) }} - Gamekafe" src="{{ $game['thumbs'] }}" />
                        </div>
                    </div>
                    <div class="item__infos">
                        <h4 class="item__title ltr">{{ $game['name'] }}</h4>
                        <div class="item__technology">
                            <p class="{{ $game['category'] }}">{{ ucfirst($game['category']) }}</p>
                        </div>
                        <p class="item__rating">
                            @if($game['rating'] > 50)
                            <span class="item__success">
                                {{ $game['rating'] }}%
                            </span>
                            @else
                            <span class="item__fail">
                                {{ $game['rating'] }}%
                            </span>
                            @endif
                        </p>
                        <p class="item__plays-count">{{ $game['count_play'] }} {{ __('chơi') }}
                        </p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="navigator mobile">
            <div class="head">
                <a aria-label="arrow previous" class="arrow previous {{ $games->currentPage() == 1 ? 'disable-link' : '' }}" href="{{ $games->previousPageUrl() }}"></a>
                <ul>
                    @if($games->currentPage() != 1)
                    <li>
                        <a href="?page={{ $games->previousPageUrl() }}">{{ $games->currentPage() - 1 }}</a>
                    </li>
                    @endif
                    <li class='current'>
                        <span>{{ $games->currentPage() }}</span>
                    </li>
                    @if($games->currentPage() != $games->lastPage())
                    <li>
                        <a href="{{ $games->nextPageUrl() }}">{{ $games->currentPage() + 1 }}</a>
                    </li>
                    @endif
                    @if($games->lastPage() > $games->currentPage() + 2)
                    <li class="separator">
                        <span>...</span>
                    </li>
                    @endif
                    @if($games->lastPage() > $games->currentPage() + 1)
                    <li>
                        <a href="?page={{ $games->lastPage() }}">{{ $games->lastPage() }}</a>
                    </li>
                    @endif
                </ul>
                <a aria-label="arrow next" class="arrow next {{ $games->currentPage() == $games->lastPage() ? 'disable-link' : '' }}" href="{{ $games->nextPageUrl() }}"></a>
            </div>
        </div>
    </div>
    <h1>{{ env('APP_NAME', 'Gamekafe') }} - {{ __('Các trò chơi Trực tuyến Miễn phí tại') }} {{ env('APP_URL', 'Gamekafe.com') }}</h1>
    <h2>{{ __('Chơi game miễn phí trên Gamekafe. Các game hai người chơi và game trang điểm hàng đầu. Tuy nhiên, game mô phỏng và game nấu ăn cũng rất phổ biến trong các người chơi. Gamekafe cũng hoạt động trên các thiết bị di động và có nhiều game cảm ứng cho điện thoại. Ghé thăm Gamekafe và gia nhập với cộng đồng người chơi ngay.') }}</h2>
</div>
@endsection
