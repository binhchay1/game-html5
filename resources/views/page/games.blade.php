<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="#000000" name="theme-color">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="image/png" href="{{ $getGame['icon'] }}" rel="icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
    <iframe src="{{ $getGame['link'] }}" id="game-iframe" frameBorder="0" scrolling="no" allowfullscreen='true' webkitallowfullscreen='true' mozallowfullscreen='true' oallowfullscreen="true" msallowfullscreen="true">
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
    @endif

    @include('includes.modal_report_bug')
    @include('includes.modal_thank_report')
    @include('includes.modal_duplicate_report')

    <script>
        const gameName = '<?php echo $getGame['name']; ?>';
        const themeColor = '<?php echo $getGame['color']; ?>';
    </script>

    <script src="{{ asset('js/plugins/jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{ asset('js/page/game.js') }}"></script>
</body>

</html>
