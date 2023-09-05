@extends('layouts.page')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - {{ __('Game mới nhất') }}</title>
@endsection

@section('content')
<div class="box items-grid no-background">
    <div class="row">
        <div class="col-md-12">
            <h1 class="header-6">{{ __('TẤT CẢ CÁC THỂ LOẠI GAME MIỄN PHÍ.') }}<br> {{ __('CHỌN BẤT KỲ MỘT TỪ KHÓA NÀO VÀ CHƠI NGAY!') }}</h1>
            <h2 class="text-regular">{{ __('Bạn đang tìm kiếm một thể loại trò chơi nhất định? Kiểm tra danh sách mở rộng các loại trò chơi tại') }} {{ env('APP_NAME', 'Gamekafe') }} {{ __('Chúng tôi đã gắn nhãn các trò chơi bằng cách sử dụng các tag và danh mục trong hơn một thập kỷ qua. Trang này liệt kê hàng trăm tag khác nhau đại diện cho toàn bộ các bộ sưu tập trò chơi có thể chơi trên trình duyệt.') }}</h2>
            <h3 class="header-7">{{ __('Tất cả') }} {{ $count }} {{ __('thẻ gắn để tìm game miễn phí về giấc mơ của bạn') }}</h3>
        </div>
    </div>

    <div class="items-container" id="items_container">
        @foreach($games as $game)
        <div id="item_159195" class="item thumb videobox grid-column" data-item-id="159195">
            <a title="Trò chơi {{ $game['name'] }} - {{ __('Chơi trực tuyến tại') }} {{ env('APP_NAME', 'Gamekafe') }}" href="{{ route('playGames', ['game' => strtolower(str_replace(' ', '-', $game['name']))]) }}">
                <div class="item__thumbarea">
                    <div class="item__microthumb"></div>
                    <div class="item__img-container">
                        <img class="thumb lazy playable" alt="{{ $game['name'] }} - {{ ucfirst($game['category']) }} - {{ env('APP_NAME', 'Gamekafe') }}" src="{{ $game['thumbs'] }}" />
                    </div>
                </div>
                <div class="item__infos">
                    <h4 class="item__title ltr">{{ $game['name'] }}</h4>
                    <div class="item__technology">
                        <p class="{{ $game['category'] }}">{{ ucfirst($game['category']) }}</p>
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
                    <p class="item__plays-count">{{ $game['count_play'] }} chơi
                    </p>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    <div class="navigator mobile">
        <div class="head">
            @if(empty($games->previousPageUrl()))
            <a aria-label="arrow previous" class="arrow previous disable-link"></a>
            @else
            <a aria-label="arrow previous" class="arrow previous" href="{{ $games->previousPageUrl() }}"></a>
            @endif
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
@endsection
