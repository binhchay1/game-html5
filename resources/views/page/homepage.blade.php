@extends('layouts.page')

@section('title')
<title>Gamekafe</title>
@endsection

@section('content')
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
            <a title="Trò chơi Dynamons World - Chơi trực tuyến tại Y8.com" href="https://vi.y8.com/games/dynamons_world">
                <input type="hidden" name="for-girls-159195" id="for-girls-159195" value="false" />
                <div class="item__thumbarea">
                    <div class="item__microthumb"></div>
                    <div class="item__img-container">
                        <img class="thumb lazy playable" alt="Dynamons World - Strategy/RPG - Y8.COM" data-src="{{ asset($game['thumbs']) }}" data-srcset="{{ asset($game['thumbs']) }} 1x" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" />
                    </div>
                </div>
                <div class="item__infos">
                    <h4 class="item__title ltr">{{ $game['name'] }}</h4>
                    <div class="item__technology">
                        <p class="html5">{{ ucfirst($game['category']) }}</p>
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
            <div class='arrow previous opacity'></div>
            <ul>
                <li class='current'>
                    <span>1</span>
                </li>
                <li>
                    <a href="/?page=2">2</a>
                </li>
                <li>
                    <a href="/?page=3">3</a>
                </li>
                <li class="separator">
                    <span>...</span>
                </li>
                <li>
                    <a href="/?page=300">300</a>
                </li>
            </ul>
            <a aria-label="arrow next" class="arrow next" href="/?page=2"></a>
        </div>
    </div>
</div>
<h1>Gamekafe - Các trò chơi Trực tuyến Miễn phí tại Gamekafe.com</h1>
<h2>Chơi game miễn phí trên Gamekafe. Các game hai người chơi và game trang điểm hàng đầu. Tuy nhiên, game mô phỏng và game nấu ăn cũng rất phổ biến trong các người chơi. Gamekafe cũng hoạt động trên các thiết bị di động và có nhiều game cảm ứng cho điện thoại. Ghé thăm Y8.com và gia nhập với cộng đồng người chơi ngay.</h2>
@endsection
