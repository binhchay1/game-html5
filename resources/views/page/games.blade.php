<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="#000000" name="theme-color">
    <link type="image/png" href="{{ $getGame['icon'] }}" rel="icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>{{ $getGame['title-game'] }}</title>
    <?php
    if (!empty($getGame['background'])) {
        echo
        "<style id='game_theme' type='text/css'>
        body {
            background-color: " . $getGame['color'] . ";
            background-image: url('" . $getGame['background'] . "');
            background-position: 50% 0;
        }";
    } else {
        echo
        "<style id='game_theme' type='text/css'>
        body {
            background-color: " . $getGame['color'] . ";
        }";
    }

    echo ".wrapper {
        width: 1000px;
        height: 700px;
        position: relative;
        margin: -30px auto 0 auto;
        top: 15%;
    }

    .vote {
        position: relative;
        top: 30%;
        text-align: center;
    }

    .vote h1, .vote h2, .vote h3, .vote h4, .vote h5, .vote h6, .vote i {
        color:" . $getGame['text-color'] . "
    }

    .vote i {
        font-size: 25px !important;
    }

    .vote a {
        text-decoration: none;
    }
    </style>";
    ?>
</head>

<body>
    <div class="wrapper">
        <iframe id="iframe-games" src="{{ $getGame['link'] }}" width="100%" height="100%" frameBorder="0" scrolling="no"></iframe>
    </div>

    @if(Auth::check())
    <div class="vote">
        <a id="vote-like" style="margin-right: 20px;"><i class="fa fa-thumbs-up"></i></a>
        <a id="vote-unlike"><i class="fa fa-thumbs-down"></i></a>
        <h1>Vote if you like it!</h1>
    </div>
    @endif

    <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
    <script>
        const gameName = '<?php echo $getGame['name']; ?>';

        $('#vote-like').on('click', function() {
            $.ajax({
                url: '/vote-by-user',
                type: 'GET',
                data: {
                    vote: 'like',
                    gameName: gameName
                }
            }).done(function(result) {
                $('#vote-unlike').css('opacity', '0.3');
                $('#vote-like').css('opacity', '1');
            });
        });

        $('#vote-unlike').on('click', function() {
            $.ajax({
                url: '/vote-by-user',
                type: 'GET',
                data: {
                    vote: 'unlike',
                    gameName: gameName
                }
            }).done(function(result) {
                $('#vote-like').css('opacity', '0.3');
                $('#vote-unlike').css('opacity', '1');
            });
        });

        function countPlay() {
            $.getJSON("https://api.ipify.org?format=json", function(data) {
                let ip = data.ip;
                $.ajax({
                    url: '/count-play',
                    type: 'GET',
                    data: {
                        ip: ip,
                        gameName: gameName
                    }
                });
            })
        }
        setTimeout(countPlay, 10000);
    </script>
</body>

</html>
