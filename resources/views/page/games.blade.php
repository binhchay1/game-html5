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
    <iframe src="" id="game-iframe" frameBorder="0" scrolling="no" allowfullscreen='true' webkitallowfullscreen='true' mozallowfullscreen='true' oallowfullscreen="true" msallowfullscreen="true">
    </iframe>
    <div class="set-button">
        <button id="fullscreeniframe" title="view in full screen" class="button btn btn-warning rounded-0"><i class="fas fa-expand"></i></button>
    </div>

    @if(Auth::check())
    <div class="vote text-center">
        <a id="vote-like" style="margin-right: 20px;"><i class="fa fa-thumbs-up"></i></a>
        <a id="vote-unlike"><i class="fa fa-thumbs-down"></i></a>
        <h1>Vote if you like it!</h1>
    </div>
    <div class="top-conner text-center">
        @if(!$status)
        <p onclick="saveCollection()" id="button-add-collection">
            ❤ Add to collection
        </p>
        @else
        <p id="button-add-collection" style="cursor: auto;">
            Game in your collection!
        </p>
        @endif
        <p id="button-report-bug" data-email="{{ Auth::user()->email }}" data-name="{{ Auth::user()->name }}" data-toggle="modal" data-target="#report-bug-modal">
            🛠 Report bug in game
        </p>
    </div>

    <div class="comment-area">
        <h2>Comments</h2>
        @if(Auth::check())
        <div class="form-comment">
            <form action="{{ route('store.comments') }}" method="POST">
                <input class="comment-input" type="text" placeholder="{{ __('Viết bình luận của bạn') }}">
            </form>
        </div>
        @else
        <div class="form-comment">
            <p>{{ __('Vui lòng đăng nhập để có thể để lại bình luận của bạn.') }}</p>
            <a class="btn" href="{{ route('login') }}" id="button-login">{{ __('Đăng nhập') }}</a>
        </div>
        @endif
        <div class="post-area">
            @foreach($comments as $comment)
            <div class="post-item">
                <div class="post-header">
                    <span class="post-avatar">
                        <a href="">
                            <img width="25" height="25" src="{{ $comment->users->image ?? asset('/images/default-avatar.png') }}">
                        </a>
                    </span>
                    <span class="post-author">
                        <a class="author-name" href="">{{ $comment->users->name }}</a>
                    </span>
                    <span class="post-date" title="{{ $comment->created_at }}">
                        3 hours ago
                    </span>
                </div>
                <div class="post-content">
                    <div class="post_body user_formatted">
                        {{ $comment['content'] }}
                    </div>
                    <div class="post_footer">
                        <a href="https://itch.io/post/8496625/reply" class="post_action reply_btn">Reply</a>
                        <a href="#" class="post_action report_btn">Report</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    @include('includes.modal_report_bug')
    @include('includes.modal_thank_report')
    @include('includes.modal_duplicate_report')

    <script>
        const gameName = '<?php echo $getGame['name']; ?>';
        const themeColor = '<?php echo $getGame['color']; ?>';
    </script>

    <script src="{{ asset('js/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('js/plugins/popper/popper.min.js') }}"></script>
    <script src="{{ asset('js/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('js/page/game.js') }}"></script>

</body>

</html>
