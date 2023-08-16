<html lang="en">
<style>
.set-button{
    background-color: #9E9E9E;
    height: 50px;
}
#fullscreeniframe {
    height: 50px;
    float: right;
    color: rgb(19, 22, 20);
    width: 50px;
}

</style>
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
        top: 25%;
        left: 15%;
        text-align: center;
    }

    .vote i {
        font-size: 25px !important;
    }

    .vote a {
        text-decoration: none;
    }

    .top-conner{
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
    }

    .top-conner p {
        font-size: 20px;
    }
    </style>";
    ?>
</head>

<body>
    @if(Auth::check())
    @if(!$status)
    <div class="top-conner" onclick="saveCollection()" id="button-add-collection">
        <p>
            ❤ Add to collection
        </p>
    </div>
    @else
    <div class="top-conner" id="button-add-collection" style="cursor: auto;">
        <p>
            Game in your collection!
        </p>
    </div>
    @endif
    @endif

    <div class="wrapper">
        <iframe id="iframe-games" src="{{ $getGame['link'] }}" width="100%" height="100%" frameBorder="0" scrolling="no"></iframe>
       <div class="set-button">
           <button id="fullscreeniframe" title="view in full screen" class="button btn btn-warning"><i class="fas fa-expand"></i></button>
       </div>
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
        const themeColor = '<?php echo $getGame['color']; ?>';
        var all = document.getElementsByTagName("*");

        for (var i = 0, max = all.length; i < max; i++) {
            all[i].style.color = invertColor(themeColor);
        }

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

        function invertColor(hex) {
            if (hex.indexOf('#') === 0) {
                hex = hex.slice(1);
            }

            if (hex.length === 3) {
                hex = hex[0] + hex[0] + hex[1] + hex[1] + hex[2] + hex[2];
            }
            if (hex.length !== 6) {
                throw new Error('Invalid HEX color.');
            }

            var r = (255 - parseInt(hex.slice(0, 2), 16)).toString(16),
                g = (255 - parseInt(hex.slice(2, 4), 16)).toString(16),
                b = (255 - parseInt(hex.slice(4, 6), 16)).toString(16);

            return '#' + padZero(r) + padZero(g) + padZero(b);
        }

        function padZero(str, len) {
            len = len || 2;
            var zeros = new Array(len).join('0');
            return (zeros + str).slice(-len);
        }


        function saveCollection() {
            $.ajax({
                url: '/save-collection',
                type: 'GET',
                data: {
                    gameName: gameName
                }
            }).done(function(result) {
                $('#button-add-collection').css('cursor', 'auto');
                $('#button-add-collection p').html('Game in your collection!');
                $('#button-add-collection').each(function() {
                    this.style.pointerEvents = 'none';
                });
            });
        }


        (function(window, document){
            var $ = function(selector,context){return(context||document).querySelector(selector)};

            var iframe = $("iframe"),
                domPrefixes = 'Webkit Moz O ms Khtml'.split(' ');

            var fullscreen = function(elem) {
                var prefix;
                // Mozilla and webkit intialise fullscreen slightly differently
                for ( var i = -1, len = domPrefixes.length; ++i < len; ) {
                    prefix = domPrefixes[i].toLowerCase();

                    if ( elem[prefix + 'EnterFullScreen'] ) {
                        // Webkit uses EnterFullScreen for video
                        return prefix + 'EnterFullScreen';
                        break;
                    } else if( elem[prefix + 'RequestFullScreen'] ) {
                        // Mozilla uses RequestFullScreen for all elements and webkit uses it for non video elements
                        return prefix + 'RequestFullScreen';
                        break;
                    }
                }

                return false;
            };
            // Webkit uses "requestFullScreen" for non video elements
            var fullscreenother = fullscreen(document.createElement("iframe"));

            if(!fullscreen) {
                alert("Fullscreen won't work, please make sure you're using a browser that supports it and you have enabled the feature");
                return;
            }

            $("#fullscreeniframe").addEventListener("click", function(){
                // iframe fullscreen and non video elements in webkit use request over enter
                iframe[fullscreenother]();
            }, false);
        })(this, this.document);
    </script>
</body>

</html>
