@extends('layouts.page')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - Category</title>
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
                <h1 class="title header-5">
                    Game trực tuyến miễn phí hàng đầu gắn thẻ {{ ucfirst($category['name']) }}
                </h1>
                <h2 class="description text-regular">
                    {{ $category['title'] }}
                </h2>
            </div>
        </div>
        <div class="right-col col-md-6">
            <div class="top-tags">
                <div class="row">
                    <div class="collapse-tags-container col-md-12">
                        <h3 class="title">
                            Các thẻ liên quan tới chiến thuật &amp; nhập vai
                        </h3>
                        <div class="tags-container">
                            @foreach($listTag as $tag)
                            <a class="tag cat-strategy" title="" href="/tags/role_playing">
                                <h4><span>{{ $tag }}</span></h4>
                            </a>
                            @endforeach
                        </div>
                        <p class="view-all-link">
                            <span>
                                Hiển thị tất cả
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
                        <a class="active" title="Game trực tuyến miễn phí hàng đầu gắn thẻ Chiến lược &amp; RPG ♘ - {{ env('APP_URL', 'Gamekafe.com') }}" href="/categories/strategy">
                            <h3>
                                Tất cả
                                {{ ucfirst($category['name']) }}
                                <span>({{ count($games) }})</span>
                            </h3>
                        </a>
                    </div>
                    <div class="sort-by">
                        <span>Sắp xếp theo:</span>
                        <select name="sort" id="sort" class="form-control">
                            <option value="popularity">Độ phổ biến</option>
                            <option value="rating">Đánh giá</option>
                            <option value="date">Ngày</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="items-container">
            @foreach($games as $game)
            <div id="item_5515" class="item thumb videobox grid-column" data-item-id="5515" data-label-ids="Fighting,1 Player,Action,Series,Dinosaur,Strategy,Defend,GameDistribution.com,HTML5,Touchscreen,Android game,iPad,iPhone,Mobile" data-poster-url="https://img.{{ env('APP_URL', 'Gamekafe.com') }}/assets/video_loader_180x135-63697df7850db644b0fe994bd8a23977d297e8e22941cb82c831a334ec57745a.gif" data-technologies="[&quot;html5&quot;,&quot;flash&quot;]" data-mp4-movie="https://img.{{ env('APP_URL', 'Gamekafe.com') }}/cloud/y8-rollover/videos/1891/886b918d03ee393e14795e99c6d6c09bf71f7b23.mp4?1459138753" data-ogv-movie="https://img.{{ env('APP_URL', 'Gamekafe.com') }}/cloud/y8-rollover/videos/1891/954a86fed305ed9349c404fd06e71680d11157f9.ogv?1459138753" data-vp8-movie="https://img.{{ env('APP_URL', 'Gamekafe.com') }}/cloud/y8-rollover/videos/1891/2583e41d3a894b9e70e97be322cbcf6db8d0bf06.webm?1459138753" data-thumb-movie="[&quot;https://img.{{ env('APP_URL', 'Gamekafe.com') }}/cloud/y8-rollover/videos/1891/2dec5e74754053fb765439f6662dcb28ffd5997d.gif?1459138753&quot;,&quot;https://img.{{ env('APP_URL', 'Gamekafe.com') }}/cloud/y8-rollover/videos/1891/3ce60e143b78551d38c571d54d93efe9680a1359.gif?1459138753&quot;,&quot;https://img.{{ env('APP_URL', 'Gamekafe.com') }}/cloud/y8-rollover/videos/1891/065e7629af9d600c193f7f78420b1169f49144e4.gif?1459138753&quot;,&quot;https://img.{{ env('APP_URL', 'Gamekafe.com') }}/cloud/y8-rollover/videos/1891/92d1a421c9ba1873d8a3c93f50ac6f3fcb50507e.gif?1459138753&quot;]">
                <a title="Trò chơi {{ $game['name'] }} - Chơi trực tuyến tại {{ env('APP_URL', 'Gamekafe.com') }}" href="{{ route('playGames', ['game' => $game['name']]) }}">
                    <input type="hidden" name="for-girls-5515" id="for-girls-5515" value="false">
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
                            {{ $game['count_play'] }} chơi
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

@endsection

@section('js')
<script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
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
