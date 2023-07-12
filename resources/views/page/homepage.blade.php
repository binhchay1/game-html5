@extends('layouts.page')

@section('title')
<title>Gamekafe</title>
@endsection

@section('css')
<link rel="manifest" href="{{ asset('json/manifest.json') }}" crossorigin="use-credentials">
<style type="text/css">
    .disable-link {
        cursor: not-allowed;
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
                        <a class="{{ $category['name'] }}" title="Game trực tuyến miễn phí hàng đầu gắn thẻ cho phái yếu Con gái 👧 - Gamekafe : 30000+ trò chơi trực tuyến miễn phí cho con gái trên Gamekafe. Chơi các trò chơi phối đồ của Dora và Disney cũng như các trò chơi trang điểm, trang phục, nấu ăn và hôn nhau cùng với các trò chơi búp bê barbie, tô màu và trang trí." href="/categories/girls">
                            <span class="name">{{ ucfirst($category['name']) }}</span>
                            <span class="number">{{ $category['games_count'] }} game</span>
                        </a>
                    </li>
                    @endforeach
                    <li class="all-categories-btn" data-menu="browse">
                        <span>Tất cả các thể loại
                        </span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="top-tags">
            <div class="row single-line">
                <ul>
                    @foreach($listTag as $tag)
                    <li style="margin-top: 5px;">
                        <a class="tag" title="Game Trực Tuyến Miễn Phí Hàng đầu được Gắn Thẻ {{ ucfirst($tag) }} - Gamekafe : Chơi trò chơi {{ ucfirst($tag) }} trên Gamekafe. Bạn có ai chơi cùng không? Trải nghiệm những trò chơi hai người chơi này, những trò chơi cho phép hai người chơi tham gia vào cùng một trò chơi! Các trò chơi luôn luôn được tạo ra để kết nối người chơi, vì vậy các trò chơi hai người chơi là một trong những trò chơi vui vẻ nhất khi chơi các video game." href="/tags/2_players">
                            <h4>
                                {{ $tag }}
                            </h4>
                        </a>
                    </li>
                    @endforeach
                    <li class="more-tags">
                        <a class="tag all-tags top" href="https://vi.Gamekafe/tags">Tất cả các thẻ
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
                <p class='h5'>Tìm kiếm hàng đầu</p>
                <div class="search-trends">
                    <ul>
                        @foreach($search as $keyword)
                        <li style="display: inline-block;">
                            <a href="{{ route('search') }}?q={{ $keyword }}" rel="nofollow">{{ $keyword }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="spinner-container">
                    <img class="spinner" src="https://img.Gamekafe/assets/spinner-5f5b271a335601ed1f03c9ea4af9e708517e8fa4977229307ca47e02b5ab84a3.gif" />
                </div>
            </div>
        </div>
    </div>
</div>
<div class="country-chooser-modal sub-menu">
    <div class="row controls-1">
        <div class="selected-country col-md-12">
            <ul>
                <li class="selected" style="display: none;">
                    <div class="wrapper">
                        <div class="cell">
                            <span class="c y8"></span>
                        </div>
                        <div class="cell">
                            <div class="country-name">Tất cả các tìm kiếm</div>
                            <div class="country-description">Lựa chọn hiện tại</div>
                        </div>
                        <div class="cell">
                            <div class="tick"></div>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="navbar-form">
                <i class="y-icon y-icon--search"></i>
                <input type="text" placeholder="Bạn đang tìm kiếm nước nào?" class="form-control search fake-button" autocomplete="off" />
                <i class="y-icon y-icon--remove" style="display: none;"></i>
            </div>
        </div>
    </div>
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
                <h3 class="home-title">Trò chơi ({{ $countGame }})
                </h3>
            </div>
        </div>
        <div class="items-container" id="items_container" data-base-url="/" data-max-page="300">
            @foreach($games as $game)
            <div id="item_159195" class="item thumb videobox grid-column" data-item-id="159195" data-label-ids="1 Player,Adventure,Fighting,Turn Based,Role Playing,GameDistribution.com,Touchscreen,Android game,iPad,iPhone,Mobile">
                <a title="Trò chơi Dynamons World - Chơi trực tuyến tại Gamekafe" href="https://vi.Gamekafe/games/dynamons_world">
                    <input type="hidden" name="for-girls-159195" id="for-girls-159195" value="false" />
                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb lazy playable" alt="Dynamons World - Strategy/RPG - Gamekafe" src="{{ $game['thumbs'] }}" />
                        </div>
                    </div>
                    <div class="item__infos">
                        <h4 class="item__title ltr">{{ $game['name'] }}</h4>
                        <div class="item__technology">
                            <p class="{{ $game['category'] }}">{{ ucfirst($game['category']) }}</p>
                        </div>
                        <p class="item__rating">
                            <span class="item__number">90%
                            </span>
                        </p>
                        <p class="item__plays-count">3,027,577 chơi
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
    <h1>Gamekafe - Các trò chơi Trực tuyến Miễn phí tại Gamekafe.com</h1>
    <h2>Chơi game miễn phí trên Gamekafe. Các game hai người chơi và game trang điểm hàng đầu. Tuy nhiên, game mô phỏng và game nấu ăn cũng rất phổ biến trong các người chơi. Gamekafe cũng hoạt động trên các thiết bị di động và có nhiều game cảm ứng cho điện thoại. Ghé thăm Gamekafe và gia nhập với cộng đồng người chơi ngay.</h2>
</div>

@endsection
