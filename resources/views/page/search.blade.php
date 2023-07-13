@extends('layouts.page')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - Search</title>
@endsection

@section('css')
<link rel="stylesheet" media="screen" href="{{ asset('css/page/search.css') }}" />
@endsection

@section('content')
<div class="container">
    <div class="main">
        <div class="box search-container">
            <form id="items-search-form" class="search-form" action="{{ route('search') }}" accept-charset="UTF-8" method="get">
                <input type="text" name="search" id="q" value="sd" placeholder="Tìm kiếm trò chơi" class="form-control query fake-button" pattern=".{2,50}" />
                <i class="y-icon y-icon--search y-icon--big"></i>
                <button class="search-btn" type="submit" aria-label="Search">
                    Tìm kiếm
                </button>
            </form>
            <div class="advanced-serach-options">
                <div class="title">Tùy chọn tìm kiếm nâng cao</div>
                <div class="column-container">
                    <div class="column">
                        <div class="gray-select category-select" id="category-search" onclick="dropDown('category-search')">
                            <div class="select-header">
                                <span class="icon all-categories"></span>
                                Tất cả các thể loại
                            </div>
                            <div class="select-options scroll">
                                <div class="select-options__wrapper scroll">
                                    <div class="gray-select__item active">
                                        <span class="icon all-categories"></span>
                                        <div class="select-item-title">Tất cả các thể loại</div>
                                    </div>
                                    @foreach($listCategory as $category)
                                    <div class="gray-select__item" data-slug="action_adventure">
                                        <span class="icon action_adventure"></span>
                                        <div class="select-item-title">{{ ucfirst($category) }}</div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="gray-select tag-select" id="tag-search" onclick="dropDown('tag-search')">
                            <div class="select-header">Tất cả các nhãn</div>
                            <div class="select-options">
                                <div class="select-search">
                                    <input type="text" placeholder="Search" class="select-search-input" />
                                    <i class="y-icon y-icon--search"></i>
                                </div>
                                <div class="select-options__wrapper scroll">
                                    <div class="gray-select__item active">
                                        <div class="select-item-title">Tất cả các nhãn</div>
                                    </div>
                                </div>
                                @foreach($listTag as $tag)
                                <div class="gray-select__item" data-slug="1_player">
                                    <div class="select-item-title">{{ $tag }}</div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="box items-grid no-background">
            <div class="mobile-search">
                <a href="/search?mobile=true&q=sd">Click here to show only mobile games results</a>
            </div>
            <div class="items-container" id="search_items_container">
                @foreach($games as $game)
                <div id="item_104800" class="item thumb videobox grid-column">
                    <a title="Trò chơi {{ $game['name'] }} - Chơi trực tuyến tại Y8.com" href="{{ route('playGames', ['game' => $game['name']]) }}">
                        <div class="item__thumbarea">
                            <div class="item__microthumb"></div>
                            <div class="item__img-container">
                                <img class="thumb playable" alt="{{ $game['name'] }}" src="{{ $game['thumbs'] }}">
                            </div>
                        </div>

                        <div class="item__infos">
                            <h4 class="item__title ltr">{{ $game['name'] }}</h4>
                            <div class="item__technology">
                                <p class="flash">
                                    {{ ucfirst($game['category']) }}
                                </p>
                            </div>

                            <p class="item__rating">
                                <span class="item__number">
                                    82%
                                </span>
                            </p>

                            <p class="item__plays-count">
                                {{ $game['count_play'] }}
                            </p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    function dropDown($id) {
        let element = document.getElementById($id);
        if (element.classList.contains('open')) {
            element.classList.remove("open");
        } else {
            element.classList.add("open");
        }
    }
</script>
@endsection
