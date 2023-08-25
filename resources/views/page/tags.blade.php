@extends('layouts.page')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - {{ __('Thẻ') }}</title>
@endsection

@section('css')
<link rel="manifest" href="{{ asset('json/manifest.json') }}" crossorigin="use-credentials">

@endsection

@section('content')
<div class="main tag">
    <div class="box items-grid no-background">
        <div class="row" style="margin-bottom: 0;">
            <div class="col-md-12">
                <div class="two-cols two-cols--items-center ">
                    <a class="button button--xs button--grey" href="{{ route('listTags') }}">{{ __('Xem tất cả thẻ gắn') }}</a>
                </div>

                <div class="meta-description-text">
                    <h1 class="with-description header-5">
                        {{ __('Game trực tuyến miễn phí hàng đầu được gắn thẻ') }} {{ $tag }}
                    </h1>
                    <h2 class="text-regular">
                        {{ __('Xem tất cả thẻ gắn') }} {{ __('Chơi trò chơi') }} {{ $tag }} {{ __('trên') }} {{ env('APP_URL', 'Gamekafe.com') }}.
                    </h2>
                </div>
                <div class="sub-title">
                    <div class="left">
                        <a class="active" rel="nofollow" title="{{ __('Game Trực Tuyến Miễn Phí Hàng đầu được Gắn Thẻ') }} {{ $tag }} - {{ env('APP_URL', 'Gamekafe.com') }}" href="{{ route('tags', ['tag' => $tag]) }}">
                            <h3>
                                {{ __('Tất cả') }}
                                {{ __('Game trực tuyến miễn phí hàng đầu được gắn thẻ') }} {{ $tag }}
                                <span>({{ count($games) }})</span>
                            </h3>
                        </a>
                    </div>
                    <div class="sort-by"><span>{{ __('Sắp xếp theo:') }}</span>
                        <select name="sort" id="sort" class="form-control">
                            <option value="popularity">{{ __('Độ phổ biến') }}</option>
                            <option value="rating">{{ __('Đánh giá') }}</option>
                            <option value="date">{{ __('Ngày') }}</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="items-container">
                @foreach($games as $game)
                <div id="item_5515" class="item thumb videobox grid-column">
                    <a title="{{ __('Trò chơi') }} {{ $game['name'] }} - {{ __('Chơi trực tuyến tại') }} {{ env('APP_URL', 'Gamekafe.com') }}" href="{{ route('playGames', ['game' => strtolower(str_replace(' ', '-', $game['name']))]) }}">
                        <div class="item__thumbarea">
                            <div class="item__microthumb"></div>
                            <div class="item__img-container">
                                <img class="thumb playable" alt="{{ $game['name'] }} - {{ ucfirst($game['category']) }} - Gamekafe" src="{{ $game['thumbs'] }}">
                            </div>
                        </div>
                        <div class="item__infos">
                            <h4 class="item__title ltr">{{ $game['name'] }}</h4>
                            <div class="item__technology">
                                <p class="{{ $game['category'] }}">
                                    {{ ucfirst($game['category']) }}
                                </p>
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
                            <p class="item__plays-count">
                                {{ $game['count_play'] }} {{ __('chơi') }}
                            </p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>

            <div class="navigator short">
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
    </div>
</div>
@endsection
