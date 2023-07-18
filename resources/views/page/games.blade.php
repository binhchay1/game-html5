<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="#000000" name="theme-color">
    <link type="image/png" href="{{ $getGame['icon'] }}" rel="icon">
    <title>{{ $getGame['name'] }}</title>
    <?php
    echo
    "<style id='game_theme' type='text/css'>
    body {
        background-color: " . $getGame['color'] . ";
        background-image: url('" . $getGame['background'] . "');
        background-position: 50% 0;
    }

    .wrapper {
        margin: auto;
        border: 3px solid green;
        padding: 10px;
        width: 700px;
        height: 700px;
    }

    .vote {
        margin: auto;
        padding: 10px;
        width: 700px;
        background-color: #0000;
    }

    </style>"
    ?>

</head>

<body>
    <div class="wrapper">
        <iframe src="{{ $getGame['link'] }}" width="100%" height="100%"></iframe>
    </div>

    <div class="vote">
        <p>Vote if you like it!</p>
    </div>
</body>

</html>
