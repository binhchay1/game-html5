@extends('layouts.page')

@section('title')
<title>{{ env('APP_NAME', 'Gamekafe') }} - Newest Game</title>
@endsection

@section('content')
<div class="items-grid">
    <div class="box no-background">
        <div class="row">
            <div class="col-md-12">
                <h1 class="header-6">TẤT CẢ CÁC THỂ LOẠI GAME MIỄN PHÍ.<br> CHỌN BẤT KỲ MỘT TỪ KHÓA NÀO VÀ CHƠI NGAY!</h1>
                <h2 class="text-regular">Bạn đang tìm kiếm một thể loại trò chơi nhất định? Kiểm tra danh sách mở rộng các loại trò chơi tại Y8 Games. Chúng tôi đã gắn nhãn các trò chơi bằng cách sử dụng các tag và danh mục trong hơn một thập kỷ qua. Trang này liệt kê hàng trăm tag khác nhau đại diện cho toàn bộ các bộ sưu tập trò chơi có thể chơi trên trình duyệt.</h2>
                <h3 class="header-7">Tất cả {{ count($listTag) }} thẻ gắn để tìm game miễn phí về giấc mơ của bạn</h3>
            </div>
        </div>

        <div class="items-container" id="items_container">
            <div class="col-md-12">
                <ul class="tag">
                    @foreach($listTag as $tag => $item)
                    <li>
                        <a class="tag" title="Game Trực Tuyến Miễn Phí Hàng đầu được Gắn Thẻ {{ $tag }} - {{ env('APP_URL', 'Gamekafe') }}" href="{{ route('tags', ['tag' => $tag]) }}">
                            <h4><i id="{{ $tag }}" class="tag-36x28 tag-36x28-games tag-36x28-{{ $item['numberIcon'] }}"></i>{{ $tag }}<span style="font-size:13px;">{{ $item['count'] }}</span></h4>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
