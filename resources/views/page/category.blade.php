@extends('layouts.page')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - {{ __('Thể loại') }} | {{ __(ucfirst($category['name'])) }} </title>
@endsection

@section('css')
<link rel="manifest" href="{{ asset('json/manifest.json') }}" crossorigin="use-credentials">
<style type="text/css">
    .disable-link {
        cursor: not-allowed;
        pointer-events: none;
        opacity: 0.5;
    }
</style>
@endsection

@section('content')
<div class="main category">
    <div class="header-category-page">
        <div class="left-col col-md-6">
            <div class="icon-col">
                <img alt="icon-category" src="{{ asset('svg/category/' . $category['name'] . '.svg') }}">
            </div>
            <div class="text-col">
                @if(session('locale') == 'vi')
                <h1 class="title header-5">
                    {{ __('Game trực tuyến miễn phí hàng đầu gắn thẻ') }} {{ ucfirst(__(\App\Enums\TransVietnamese::CATEGORY_VIETNAMESE[ucfirst($category['name'])])) }}
                </h1>
                @else
                <h1 class="title header-5">
                    {{ __('Game trực tuyến miễn phí hàng đầu gắn thẻ') }} {{ __(ucfirst($category['name'])) }}
                </h1>
                @endif
            </div>
        </div>
        <div class="right-col col-md-6">
            <div class="top-tags">
                <div class="row">
                    <div class="collapse-tags-container col-md-12">
                        <h3 class="title">
                            {{ __('Các thẻ liên quan tới') }} {{ __(ucfirst($category['name'])) }}
                        </h3>
                        <div class="tags-container">
                            @foreach($listTag as $tag => $value)
                            <a class="tag cat-strategy" title="{{ __('Tham gia chiến game cùng với ') }} {{ $tag }}" href="{{ route('tags', ['tag' => $tag]) }}">
                                <h4><span>{{ $value['trans'] }}</span></h4>
                            </a>
                            @endforeach
                        </div>
                        <p class="view-all-link">
                            <span>
                                {{ __('Hiển thị tất cả') }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="box items-grid no-background">
        <div class="row">
            <div class="col-md-12">
                <div class="sub-title">
                    <div class="left">
                        <a class="active" title="{{ __('Game trực tuyến miễn phí hàng đầu gắn thẻ') }} {{ $category }} - {{ env('APP_URL', 'Gamekafe.com') }}" href="/categories/strategy">
                            <h3>
                                {{ __('Tất cả') }}
                                @if(session('locale') == 'vi')
                                {{ __('Game trực tuyến miễn phí hàng đầu gắn thẻ') }} {{ ucfirst(__(\App\Enums\TransVietnamese::CATEGORY_VIETNAMESE[ucfirst($category['name'])])) }}
                                @else
                                {{ __('Game trực tuyến miễn phí hàng đầu gắn thẻ') }} {{ __(ucfirst($category['name'])) }}
                                @endif
                                <span>({{ count($games) }})</span>
                            </h3>
                        </a>
                    </div>
                    <div class="sort-by">
                        <span>{{ __('Sắp xếp theo:') }}</span>
                        <select name="sort" id="sort" class="form-control">
                            <option value="popularity">{{ __('Độ phổ biến') }}</option>
                            <option value="rating">{{ __('Đánh giá') }}</option>
                            <option value="date">{{ __('Ngày') }}</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="items-container">
            @foreach($games as $game)
            <div id="item_5515" class="item thumb videobox grid-column">
                <a title="{{ __('Trò chơi') }} {{ $game['name'] }} - {{ __('Chơi trực tuyến tại') }} {{ env('APP_URL', 'Gamekafe.com') }}" href="{{ route('play.games', ['game' => strtolower(str_replace(' ', '-', $game['name']))]) }}">
                    <div class="item__thumbarea">
                        <div class="item__microthumb"></div>
                        <div class="item__img-container">
                            <img class="thumb playable" alt="{{ $game['name'] }} - {{ ucfirst($game['category']) }} - Gamekafe" src="{{ $game['thumbs'] }}">
                        </div>
                    </div>
                    <div class="item__infos">
                        <h4 class="item__title ltr">{{ $game['name'] }}</h4>
                        <div class="item__technology">
                            @if(session('locale') == 'vi')
                            <p class="{{ $game['category'] }}">
                                {{ ucfirst(__(\App\Enums\TransVietnamese::CATEGORY_VIETNAMESE[ucfirst($game['category'])])) }}
                            </p>
                            @else
                            <p class="{{ $game['category'] }}">
                                {{ __(ucfirst($game['category'])) }}
                            </p>
                            @endif
                        </div>
                        @if(!empty($game['author']))
                        <p class="item__title ltr">{{ $game['author'] }}</p>
                        @endif
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
                            {{ $game['count_play'] }} chơi
                        </p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        <div class="navigator short">
            <div class="head">
                @if(empty($games->previousPageUrl()))
                <a aria-label="arrow previous" class="arrow previous disable-link"></a>
                @else
                <a aria-label="arrow previous" class="arrow previous" href="{{ $games->previousPageUrl() }}"></a>
                @endif
                <ul>
                    @if($games->currentPage() != 1)
                    <li>
                        <a href="{{ $games->previousPageUrl() }}">{{ $games->currentPage() - 1 }}</a>
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

@endsection

@section('js')
<script src="{{ asset('js/plugins/jquery/jquery.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.view-all-link').hover(function() {
            $('.collapse-tags-container').toggleClass('hover')
        }).click(function() {
            $('.collapse-tags-container').addClass('open')
        });

        $("#sort").change(function() {
            let path = window.location.pathname;
            window.location.href = path + '?sort=' + this.value;
        });
    });
</script>
@endsection
