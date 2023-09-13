<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="#000000" name="theme-color">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="image/png" href="{{ $getGame['icon'] }}" rel="icon">
    <link rel="stylesheet" href="{{ asset('css/plugins/fontawesome/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/page/game.css') }}">
    <link rel="stylesheet" href="{{ asset('css/page/ionicons.min.css') }}">
    <title>{{ $getGame['title-game'] }}</title>
    <style>
        #pre-load {
            background: none;
        }
    </style>
    <?php
    if (!empty($getGame['background'])) {
        echo
        "<style id='game_theme' type='text/css'>
        body {
            background-color: " . $getGame['color'] . ";
            background-image: url('" . $getGame['background'] . "');
            background-position: 50% 0;
        }
        </style>";
    } else {
        echo
        "<style id='game_theme' type='text/css'>
        body {
            background-color: " . $getGame['color'] . ";
        }
        </style>";
    }
    ?>
</head>

<body>
    <div class="iframe-area">
        <iframe loading="lazy" data-src="{{ $getGame['link'] }}" id="game-iframe" frameBorder="0" scrolling="yes" allowfullscreen='true' webkitallowfullscreen='true' mozallowfullscreen='true' oallowfullscreen="true" msallowfullscreen="true">
        </iframe>

        <div class="btn-play-area d-flex flex-column">
            @if($getGame['icon'])
            <img src="{{ $getGame['icon'] }}" id="game-icon-play" />
            @else
            <span class="text-white">{{ ucwords(str_replace("-", " ", $getGame['name'])) }}</span>
            @endif
            <button class="btn" id="btn-play">Play</button>
        </div>

        <div id="pre-load" class="d-none">
            <image src="{{ asset('images/color-logo-no-background.png') }}" width="150"></image>
            <p style="color:white !important">Loading...</p>
        </div>
        <div id="error-load" class="d-none" style="color:white !important">{{ __('Chân thành xin lỗi game hiện tại đang lỗi! Vui lòng thông báo cho ban quản trị và quay lại vào thời gian khác!') }}</div>
    </div>

    <div class="set-button d-none" id="btn-fullscreen-area">
        <button id="fullscreeniframe" title="view in full screen" class="button btn btn-warning rounded-0"><i class="fas fa-expand"></i></button>
    </div>

    @if(Auth::check())
    <div class="vote text-center">
        <a id="vote-like"><i class="fa fa-thumbs-up"></i></a>
        <a id="vote-unlike"><i class="fa fa-thumbs-down"></i></a>
        <h1>Vote if you like it!</h1>
    </div>
    <div class="top-conner text-center">
        @if(!$status)
        <p onclick="saveCollection()" id="button-add-collection">
            ❤ {{ __('Thêm vào bộ sưu tập') }}
        </p>
        @else
        <p id="button-add-collection" style="cursor: auto;">
            {{ __('Trò chơi đã có trong bộ sưu tập của bạn') }}
        </p>
        @endif
        <p id="button-report-bug" data-email="{{ Auth::user()->email }}" data-name="{{ Auth::user()->name }}" data-toggle="modal" data-target="#report-bug-modal">
            🛠 {{ __('Thông báo lỗi trong trò chơi') }}
        </p>
    </div>
    @endif

    <div class="comment-area">
        <h2>Comments</h2>
        @if($statusComment == 0)
        @if(Auth::check())
        <div class="form-comment">
            <form class="d-flex">
                <input class="comment-input" maxlength="255" type="text" placeholder="{{ __('Viết bình luận của bạn') }}">
                <button id="btn-submit-comment">{{ __('Đăng') }}</button>
            </form>
        </div>
        @else
        <div class="form-comment">
            <p class="btn-login-title">{{ __('Vui lòng đăng nhập để có thể để lại bình luận của bạn.') }}</p>
            <a class="btn" href="{{ route('login') }}?return_url={{ env('APP_URL', 'gamekafe.com') . 'games/' . $getGame['name'] }}" id="btn-login">{{ __('Đăng nhập') }}</a>
        </div>
        @endif
        @else
        <div class="form-comment">
            <p>{{ __('Cám ơn bạn đã để lại bình luận. Nếu bạn chưa thấy bình luận của bạn, có thể bình luận vẫn đang trong quá trình kiểm duyệt hoặc hãy liên hệ cho bộ phận hỗ trợ!') }}</p>
        </div>
        @endif
        <div class="container-fluid">
            <div class="post-area row" id="post-area">
                @foreach($comments as $comment)
                <div class="post-item mt-4 col-lg-2 col-sm-3">
                    <div class="post-header">
                        <span class="post-avatar">
                            <a href="{{ route('user.show', ['id' => md5($comment->users->id)]) }}">
                                <img width="25" height="25" src="{{ $comment->users->image ?? asset('/images/default-avatar.png') }}">
                            </a>
                        </span>
                        <span class="post-author">
                            <a class="author-name" href="{{ route('user.show', ['id' => md5($comment->users->id)]) }}">{{ $comment->users->name }}</a>
                        </span>
                        <span class="post-date">
                            <p title="{{ $comment->created_at }}"></p>
                        </span>
                    </div>
                    <div class="post-content">
                        <p>{{ $comment['content'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    @include('includes.modal_report_bug')
    @include('includes.modal_thank_report')
    @include('includes.modal_duplicate_report')

    <script>
        const gameName = '<?php echo $getGame['name']; ?>';
        const themeColor = '<?php echo $getGame['color']; ?>';
        const urlMain = window.location.href;
    </script>

    <script src="{{ asset('js/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('js/plugins/popper/popper.min.js') }}"></script>
    <script src="{{ asset('js/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('js/sdk/sw.js') }}"></script>
    <script src="{{ asset('js/page/game.js') }}"></script>

</body>

</html>
