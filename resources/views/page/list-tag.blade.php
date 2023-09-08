@extends('layouts.page')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - {{ __('Danh sách thẻ') }}</title>
@endsection

@section('content')
<div class="items-grid">
    <div class="box no-background">
        <div class="row">
            <div class="col-md-12">
                <h1 class="header-6">{{ __('TẤT CẢ CÁC THỂ LOẠI GAME MIỄN PHÍ.') }}<br> {{ __('CHỌN BẤT KỲ MỘT TỪ KHÓA NÀO VÀ CHƠI NGAY!') }}</h1>
                <h2 class="text-regular">{{ __('Bạn đang tìm kiếm một thể loại trò chơi nhất định? Kiểm tra danh sách mở rộng các loại trò chơi tại') }} {{ env('APP_NAME', 'Gamekafe') }}. {{ __('Chúng tôi đã gắn nhãn các trò chơi bằng cách sử dụng các tag và danh mục trong hơn một thập kỷ qua. Trang này liệt kê hàng trăm tag khác nhau đại diện cho toàn bộ các bộ sưu tập trò chơi có thể chơi trên trình duyệt.') }}</h2>
                <h3 class="header-7">{{ __('Tất cả') }} {{ $totalTags }} {{ __('thẻ gắn để tìm game miễn phí về giấc mơ của bạn') }}</h3>
            </div>
        </div>

        <div class="items-container" id="items_container">
            <div class="col-md-12">
                <ul class="tag">
                    @foreach($arrData['data'] as $tag => $item)
                    <li>
                        <a class="tag" title="{{ __('Game Trực Tuyến Miễn Phí Hàng đầu được Gắn Thẻ') }} {{ $item['trans'] }} - {{ env('APP_URL', 'Gamekafe') }}" href="{{ route('tags', ['tag' => $tag]) }}">
                            <h4><i id="{{ $tag }}" class="tag-36x28 tag-36x28-listTag tag-36x28-{{ $item['numberIcon'] }}"></i>{{ $item['trans'] }}<span style="font-size:13px;">{{ $item['count'] }}</span></h4>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="navigator short">
            <div class="head">
                @if(empty($arrData['prev_page_url']))
                <a aria-label="arrow previous" class="arrow previous disable-link"></a>
                @else
                <a aria-label="arrow previous" class="arrow previous" href="{{ $arrData['prev_page_url'] }}"></a>
                @endif
                <ul>
                    @if($arrData['current_page'] != 1)
                    <li>
                        <a href="{{ $arrData['prev_page_url'] }}">{{ $arrData['current_page'] - 1 }}</a>
                    </li>
                    @endif
                    <li class='current'>
                        <span>{{ $arrData['current_page'] }}</span>
                    </li>
                    @if($arrData['current_page'] != $arrData['last_page'])
                    <li>
                        <a href="{{ $arrData['next_page_url'] }}">{{ $arrData['current_page'] + 1 }}</a>
                    </li>
                    @endif
                    @if($arrData['last_page'] > $arrData['current_page'] + 2)
                    <li class="separator">
                        <span>...</span>
                    </li>
                    @endif
                    @if($arrData['last_page'] > $arrData['current_page'] + 1)
                    <li>
                        <a href="?page={{ $arrData['last_page'] }}">{{ $arrData['last_page'] }}</a>
                    </li>
                    @endif
                </ul>
                <a aria-label="arrow next" class="arrow next {{ $arrData['current_page'] == $arrData['last_page'] ? 'disable-link' : '' }}" href="{{ $arrData['next_page_url'] }}"></a>
            </div>
        </div>
    </div>
</div>
@endsection
