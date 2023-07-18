<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="#000000" name="theme-color">
    <link type="image/png" href="{{ $getGame['icon'] }}" rel="icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>{{ $getGame['name'] }}</title>
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
        width: 700px;
        height: 500px;
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
        <iframe src="{{ $getGame['link'] }}" width="100%" height="100%" frameBorder="0"></iframe>
    </div>

    @if(Auth::check())
    <div class="vote">
        <a onclick="voteHandle('like')" style="margin-right: 20px;"><i class="fa fa-thumbs-up"></i></a>
        <a onclick="voteHandle('unlike')"><i class="fa fa-thumbs-down"></i></a>
        <h1>Vote if you like it!</h1>
    </div>
    @endif

    <script>
        function voteHandle($id) {

        }
    </script>
</body>

</html>
