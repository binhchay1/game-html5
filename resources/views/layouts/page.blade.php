<!DOCTYPE html>
<html class="no-touch" lang="vi" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0, minimal-ui" />
    <meta name="theme-color" content="#FFF">
    <link rel="preconnect" href="https://img.y8.com">
    <link rel="preconnect" href="https://cdn.y8.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://account.y8.com">
    <link rel="manifest" href="{{ asset('json/manifest.json') }}" crossorigin="use-credentials">

    <title>@yield('title')</title>
    <meta name="description" content="Chơi game miễn phí trên Gamekafe. Các game hai người chơi và game trang điểm hàng đầu. Tuy nhiên, game mô phỏng và game nấu ăn cũng rất phổ biến trong các người chơi. Gamekafe cũng hoạt động trên các thiết bị di động và có nhiều game cảm ứng cho điện thoại. Ghé thăm Y8.com và gia nhập với cộng đồng người chơi ngay." />
    <meta name="keywords" content="chơi game miễn phí, chơi game trực tuyến, chơi game, gamekafe, gamekafe, kafe, fake, gameka, chơi game bóng đá, chơi game android, chơi game đua xe, chơi game zombie, chơi candy crush, chơi game đua tốc độ, chơi game casino, chơi poker, chơi game bắn nhau, chơi game thời trang, chơi game nữ giới, chơi game nấu ăn, chơi game phiêu lưu, chơi game câu cá, chơi game halloween, chơi game tình yêu, chơi game đố vui, chơi game thể thao, chơi game chiến tranh, chơi game bóng đá" />

    <meta property="og:title" content="Gamekafe -  Các trò chơi Trực tuyến Miễn phí tại Y8.com">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://vi.y8.com/">
    <meta property="og:image" content="https://img.y8.com/assets/y8/logo-social-8740c6b841d8807a50e324495de20bc47850124ac05cecf792e7412f3f9863e0.png">
    <meta property="og:image:width" content="500">
    <meta property="og:image:height" content="500">
    <meta property="og:site_name" content="Y8.Com">
    <meta property="og:description" content="Chơi game miễn phí trên Gamekafe. Các game hai người chơi và game trang điểm hàng đầu. Tuy nhiên, game mô phỏng và game nấu ăn cũng rất phổ biến trong các người chơi. Gamekafe cũng hoạt động trên các thiết bị di động và có nhiều game cảm ứng cho điện thoại. Ghé thăm Y8.com và gia nhập với cộng đồng người chơi ngay.">

    <link rel="shortcut icon" type="image/x-icon" href="https://img.y8.com/assets/y8/favicon-32ba556e0026f47b8a6774c589575902155c4469a8116a68880669d1a5bedd0d.ico" />
    <link rel="icon" sizes="192x192" href="https://img.y8.com/mobile_launch_icons/y8-192.png">
    <link rel="apple-touch-icon" href="https://img.y8.com/mobile_launch_icons/y8-192.png">
    <link rel="stylesheet" media="screen" href="{{ asset('css/page/application.css') }}" />
    <link rel="stylesheet" media="screen" href="{{ asset('css/page/latin.css') }}" />
    @yield('css')
</head>

<body class="items index games-active" data-controller="Items" data-action="index" data-filter-compatibility-games="true" data-items-per-page="32">
    <nav class="navbar">
        <div class="container">
            <div class="y8-navbar-left">
                <div class="mobile-burger-menu">
                    <span class="burger-btn">
                        <img width="20" height="17" class="hamburger-icon" alt="Menu" src="https://img.y8.com/assets/svg/hamburger-c3fe8358b513e219aa93bfd93e7b3d57991bc5741038ed7db7e71d347db0c6ae.svg" />
                        <img width="16" height="16" class="hamburger-active-icon" alt="Menu" src="https://img.y8.com/assets/svg/hamburger-active-03129c9dbc7bf62fc4cf3b24384c95eca4fafade56f0dfe54ce726cd8a718f2f.svg" />
                    </span>
                </div>
                <div class="logo">
                    <a class="no-event" aria-label="logo" href="https://vi.y8.com/">
                        <img width="100" height="48" alt="Y8.com" src="https://img.y8.com/assets/y8/header-logo-b39e5071cb111465fc5a5aef6496121adfcb414692d067f967434d9d80418afc.svg" />
                    </a>
                </div>
                <div class="mobile-search-user-container">
                    <div class="search-btn">
                        <img width="28" height="28" alt="Tìm kiếm trò chơi" src="https://img.y8.com/assets/svg/search-9887eb433e2eff9a1fd0dda066ed7abf52897beecba0dce9ef152c2770dc9082.svg" />
                    </div>
                    <div class="profile-btn">
                        <img class="profile-icon avatar" alt="Profile" src="https://img.y8.com/assets/svg/profile-250b58e83592bb66fe437d6de217d30ee3dae674feee2ff962138996fdffde6e.svg" />
                        <img class="arrow-up-icon" alt="Profile" src="https://img.y8.com/assets/svg/arrow-up-bec5455682ee6239b995f18944808d8a0c75d7776798386efce255166669e5cf.svg" />
                    </div>
                </div>
            </div>
            <form id="items-search-form" class="navbar-form" action="/search" accept-charset="UTF-8" method="get">
                <input type="hidden" name="kind" id="kind" value="game" />
                <input type="text" name="q" id="q" placeholder="Tìm kiếm trò chơi" class="form-control query fake-button" required="required" minlength="2" maxlength="50" pattern=".{2,50}" />
                <button type="submit" aria-label="Search">
                    <i class="y-icon y-icon--search"></i>
                </button>
                <span class="close-search-form"></span>
            </form>
            <div class="y8-navbar-right">
                <div class="fake-button js-top-menu two-lines btn-header-actions new-games" data-menu="newgames">
                    Game Mới
                    <span class="sub-title">
                        Tiếp theo &nbsp;<span class="release-countdown" data-animation-release-cron="8 */12 * * *" data-game-release-cron="7 */2 * * *">00:00</span>
                    </span>
                </div>

                <div class="newgames-menu sub-menu">
                    <div class="newgames-container">
                        <ul>
                            <li>
                                <a class="new_games" title="Gamekafe -  Các trò chơi Trực tuyến Miễn phí tại Y8.com" href="/new/games">
                                    <div class="name">Game mới nhất
                                    </div>
                                    <div id="new-items-count-next-in" class="number">
                                        Bổ sung mới trong
                                        <span class="release-countdown" data-animation-release-cron="8 */12 * * *" data-game-release-cron="7 */2 * * *">00:00</span>
                                    </div>
                                </a>
                            </li>
                            <li class="hr"></li>
                            <li>
                                <a class="best_new_games" rel="nofollow" title="Gamekafe -  Các trò chơi Trực tuyến Miễn phí tại Y8.com" href="/best">
                                    <div class="name">Game mới Tốt nhất
                                    </div>
                                    <div id="new-items-count-best-games" class="number">Những trò chơi hay nhất trong hai tháng gần đây
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="fake-button js-top-menu two-lines btn-header-actions browse" data-menu="browse">
                    Thể loại
                    <span class="sub-title">nhiều hơn
                    </span>
                    <div class="with-notification"></div>
                </div>
                <div class="browse-menu sub-menu">
                    <div class="browse-container">
                        <div class="label-uppercase">THƯ VIỆN
                        </div>
                        <ul>
                            <li>
                                <a class="new_games" title="Gamekafe -  Các trò chơi Trực tuyến Miễn phí tại Y8.com" href="/new/games">
                                    <div class="name">Game Mới
                                    </div>
                                    <div id="new-items-count-next-in-browse" class="number">
                                        Tiếp theo
                                        <span class="release-countdown" data-animation-release-cron="8 */12 * * *" data-game-release-cron="7 */2 * * *">00:00</span>
                                    </div>
                                </a>
                            </li>

                        </ul>
                        <hr>
                        <div class="label-uppercase">THỂ LOẠI
                        </div>
                        <ul>

                            <li class="inactive driving_racing li-category">
                                <a class="driving_racing" title="Video trực tuyến miễn phí hàng đầu gắn thẻ Lái xe và Đua xe 🏎 - Y8.com : Lái xe đua trực tuyến của bạn trên Y8.com. Chơi 5000+ trò chơi hàng đầu về ô tô, đỗ xe, trượt ván, xe mini, xe tải, và xe kéo miễn phí trong bộ sưu tập lớn nhất trên mạng về lái xe và đua xe." href="/categories/driving_racing">
                                    <span class="name">Lái Xe &amp;Đua Xe</span>
                                    <span class="number">534 game</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="waiting-idnet">
                    <div id="user_not_logged_in">
                        <button type="button" class="fake-button fake-button-red idnet-fast-register-link">Đăng ký
                        </button>
                        <button type="button" class="fake-button idnet-fast-login-link">Đăng nhập
                        </button>
                    </div>

                </div>
                <div class="fake-button parental-control">
                    <div class="js-top-menu parental-control-link" data-menu="parental"></div>
                    <a class="parental-control-link-hidden" rel="nofollow" data-remote="true" href="/parental_filters/new"></a>
                </div>
                <div id="parental-filter-form" class="parental-filter-form sub-menu"></div>
                <div id="locale-selector-dropdown" class='locale-selector-dropdown fake-button'>
                    <ul>
                        <li>
                            <a class="vi locale-chooser js-top-menu" aria-label="Lựa chọn Ngôn ngữ" data-menu="locale" href="#">
                                <div class="flag vi">&nbsp;</div>
                                <div class="locale-name">Việt</div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="mobile-header-block">
                    <div class="popular-newest-games-links">
                        <a class="games-link new-game fake-button" title="Gamekafe -  Các trò chơi Trực tuyến Miễn phí tại Y8.com" href="/new/games">Game Mới</a>
                        <a class="games-link pop-game fake-button" title="Gamekafe -  Các trò chơi Trực tuyến Miễn phí tại Y8.com" href="/games/best">Game Phổ biến Nhất</a>
                        <a class="games-link best-game fake-button" title="Gamekafe -  Các trò chơi Trực tuyến Miễn phí tại Y8.com" href="/best">Game mới hay nhất</a>
                    </div>
                    <div class="top-categories-mobile">
                        <div class="title">Các loại Game
                        </div>
                        <div class="row">
                            <ul>
                                <li class="inactive girls li-category">
                                    <a class="girls" title="Game trực tuyến miễn phí hàng đầu gắn thẻ cho phái yếu Con gái 👧 - Y8.com : 30000+ trò chơi trực tuyến miễn phí cho con gái trên Y8.com. Chơi các trò chơi phối đồ của Dora và Disney cũng như các trò chơi trang điểm, trang phục, nấu ăn và hôn nhau cùng với các trò chơi búp bê barbie, tô màu và trang trí." href="/categories/girls">
                                        <span class="name">Cho Con Gái</span>
                                        <span class="number">2,920 game</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="top-tags-mobile">
                        <div class="title">Thẻ
                        </div>
                        <div class="top-tags-mobile__wrapper">
                            <div class="row top-tags__height">
                                <ul>
                                    <li>
                                        <a class="tag" title="Game Trực Tuyến Miễn Phí Hàng đầu được Gắn Thẻ 2 Người Chơi - Y8.COM : Chơi trò chơi cho hai người trên Y8.com. Bạn có ai chơi cùng không? Trải nghiệm những trò chơi hai người chơi này, những trò chơi cho phép hai người chơi tham gia vào cùng một trò chơi! Các trò chơi luôn luôn được tạo ra để kết nối người chơi, vì vậy các trò chơi hai người chơi là một trong những trò chơi vui vẻ nhất khi chơi các video game." href="/tags/2_players">
                                            <h4>
                                                2 Người chơi<span style="font-size:13px;">407</span>
                                            </h4>
                                        </a>
                                    </li>

                                    <li>
                                        <a class="all-tags" href="https://vi.y8.com/tags">Xem tất cả thẻ gắn
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="flash-messages-box" class="flash-messages-box">
            <div class="flash-notice">
                <div class="container">
                    <div id="flash-notice" class="flash"></div>
                    <div class="close">&#215;</div>
                </div>
            </div>
            <div class="flash-alert">
                <div class="container">
                    <div id="flash-alert" class="flash flash-alert"></div>
                    <div class="close">&#215;</div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="main">
            <div class="categories-tags-block box">
                <div class="top-categories">
                    <div class="row single-line">
                        <ul>
                            @foreach($listCategory as $category)
                            <li class="inactive girls li-category">
                                <a class="girls" title="Game trực tuyến miễn phí hàng đầu gắn thẻ cho phái yếu Con gái 👧 - Y8.com : 30000+ trò chơi trực tuyến miễn phí cho con gái trên Y8.com. Chơi các trò chơi phối đồ của Dora và Disney cũng như các trò chơi trang điểm, trang phục, nấu ăn và hôn nhau cùng với các trò chơi búp bê barbie, tô màu và trang trí." href="/categories/girls">
                                    <span class="name">{{ ucfirst($category['name']) }}</span>
                                    <span class="number">{{ $category['games_count'] }} game</span>
                                </a>
                            </li>
                            @endforeach
                            <li class="all-categories-btn" data-menu="browse">
                                <span>Tất cả các thể loại
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="top-tags">
                    <div class="top-tags__wrapper">
                        <div class="row top-tags__height single-line">
                            <ul>
                                <li>
                                    <a class="tag" title="Game Trực Tuyến Miễn Phí Hàng đầu được Gắn Thẻ 2 Người Chơi - Y8.COM : Chơi trò chơi cho hai người trên Y8.com. Bạn có ai chơi cùng không? Trải nghiệm những trò chơi hai người chơi này, những trò chơi cho phép hai người chơi tham gia vào cùng một trò chơi! Các trò chơi luôn luôn được tạo ra để kết nối người chơi, vì vậy các trò chơi hai người chơi là một trong những trò chơi vui vẻ nhất khi chơi các video game." href="/tags/2_players">
                                        <h4>
                                            2 Người chơi<span style="font-size:13px;">407</span>
                                        </h4>
                                    </a>
                                </li>
                                <li class="more-tags">
                                    <a class="tag all-tags top" href="https://vi.y8.com/tags">Tất cả các thẻ
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main js-search-trends" data-endpoint="/game/search_trends">
            <div class="box search-trends-box">
                <div class="row single-line">
                    <div class="search-trends-container col-md-12">
                        <p class='h5'>Tìm kiếm hàng đầu</p>
                        <div class="open-modal-btn">
                            <span class="c y8"></span>
                            <span class="shevron"></span>
                        </div>
                        <div class="search-trends">
                            <ul>
                                <li style="display: inline-block;">
                                    <a href="/search?q=car" rel="nofollow">car</a>
                                </li>
                            </ul>
                        </div>
                        <div class="spinner-container">
                            <img class="spinner" src="https://img.y8.com/assets/spinner-5f5b271a335601ed1f03c9ea4af9e708517e8fa4977229307ca47e02b5ab84a3.gif" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="country-chooser-modal sub-menu">
            <div class="row controls-1">
                <div class="selected-country col-md-12">
                    <ul>
                        <li class="selected" style="display: none;">
                            <div class="wrapper">
                                <div class="cell">
                                    <span class="c y8"></span>
                                </div>
                                <div class="cell">
                                    <div class="country-name">Tất cả các tìm kiếm</div>
                                    <div class="country-description">Lựa chọn hiện tại</div>
                                </div>
                                <div class="cell">
                                    <div class="tick"></div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="navbar-form">
                        <i class="y-icon y-icon--search"></i>
                        <input type="text" placeholder="Bạn đang tìm kiếm nước nào?" class="form-control search fake-button" autocomplete="off" />
                        <i class="y-icon y-icon--remove" style="display: none;"></i>
                    </div>
                </div>
            </div>
            <div class="row controls-2">
                <div class="search-input-col col-md-12"></div>
            </div>
            <div class="row content-1">
                <div class="col-md-12 countries-container">
                    <div class="countries"></div>
                </div>
            </div>
            <div class="row content-2">
                <div class="search-results"></div>
            </div>
        </div>
        <div class="tint"></div>
        <div class="main">
            @yield('content')
        </div>
    </div>
    <div class="header-menu-modal" style="display:none"></div>
    <footer class="footer">
        <div class="container">
            <div class="text-container">
                <div class="column question-icon">
                    <div class="title red">Y8 là gì?
                    </div>
                    <h2 class="text">
                        <p>
                            Bạn có biết Y8 đang cung cấp các game và câu đố trực tuyến từ năm 2006?<br>
                            Đã hơn 15 năm thú vị của Y8.com! Cảm ơn bạn đã là một phần của cộng đồng Y8!<br>
                            Gamekafe là một đơn vị phát hành và phát triển game. Nền tảng của Y8 là mạng xã hội với 30 triệu người chơi và đang không ngừng phát triển. Trang web cũng có <a href="https://vi.y8.com/anim">videos to watch</a>
                            như hoạt hình, video trò chơi, và hướng dẫn trò chơi. Danh mục giải trí phát triển hàng ngày <a href="https://vi.y8.com/new/games">new games</a>
                            được phát hành từng giờ. Vì Y8.com có một lịch sử lâu dài, chúng tôi đã ghi lại các hiện tượng xã hội trên các trình duyệt game. Nội dung này là một phương tiện nghệ thuật quan trọng và có thể có thể lý giải cái gì người ta thích trong những giai đoạn khác nhau.
                        </p>
                    </h2>
                </div>
                <div class="column game-categories-icon">
                    <h3 class="title blue">Thể loại game
                    </h3>
                    <h4 class="text">
                        <p>
                            Trước đây, Y8 nổi tiếng với các dòng game như arcade và games cổ điển khi <a href="https://vi.y8.com/tags/bubble_shooter">Bubble Shooter</a>
                            là game trình duyệt đình đám nhất. Ngày nay, có nhiều dòng game đã trở nên nổi tiếng. Đáng chú ý là, <a href="https://vi.y8.com/tags/2_players">2 player games</a>
                            đã trở thành game trình duyệt nổi tiếng cùng với <a href="https://vi.y8.com/tags/dress_up">dress up games</a>
                            . Một phần trò chơi quan trọng cuối cùng là <a href="https://vi.y8.com/tags/multiplayer">multiplayer games</a>
                            , chơi danh mục mở rộng của game mạng xã hội hỗ trợ Internet
                        </p>
                    </h4>
                </div>
                <div class="column technologies-icon">
                    <h3 class="title green">Công nghệ
                    </h3>
                    <h4 class="text">
                        <p>
                            Gamekafe.com là ngôi nhà cho mọi game thủ trên bất kỳ thiết bị nào. Chơi <a href="https://vi.y8.com/tags/touchscreen" rel="nofollow">phone games</a>
                            hoặc tải đồ họa 3D phong phú trên máy tính bằng cách chơi <a href="https://vi.y8.com/tags/webgl" rel="nofollow">WebGL Games</a>
                            . Mặt khác, nếu bạn chỉ thích chơi game 2D thông thường, thì <a href="https://vi.y8.com/tags/html5" rel="nofollow">HTML5 games</a>
                            sẽ phù hợp với bạn. Nếu bạn muốn nhớ lại những ngày xưa cũ, hãy truy cập kho lưu trữ <a href="https://vi.y8.com/tags/flash" rel="nofollow">Flash games</a>
                            để chơi các trò chơi chưa hề có ở những nơi khác. Cuối cùng, đừng quên đăng ký <a href="https://account.y8.com/" rel="nofollow">Y8 Account</a>
                            . Đây là mạng xã hội cộng đồng hỗ trợ người chơi.
                        </p>
                    </h4>
                </div>
            </div>
            <div class="bottom-section">
                <div class="logo-container">
                    <a class="no-event" aria-label="logo" href="https://vi.y8.com/">
                        <img width="67" height="30" alt="Y8.com" src="https://img.y8.com/assets/y8/header-logo-b39e5071cb111465fc5a5aef6496121adfcb414692d067f967434d9d80418afc.svg" />
                    </a>
                    <span>© 2006 - 2023 Y8.COM.</span>
                    <span>Đã đăng ký bản quyền.</span>
                </div>
                <div class="menu-games">
                    <div class="title">Game Y8
                    </div>
                    <ul>
                        <li>
                            <a title="Gamekafe -  Các trò chơi Trực tuyến Miễn phí tại Y8.com" href="/new/games">Game mới</a>
                        </li>
                        <li>
                            <a rel="nofollow" title="Tải nội dung của bạn lên Y8" href="/upload">Tải lên</a>
                        </li>
                        <li>
                            <a rel="nofollow" title="Gamekafe -  Các trò chơi Trực tuyến Miễn phí tại Y8.com" href="/games/best">Mới tốt nhất</a>
                        </li>
                        <li>
                            <a rel="nofollow" title="Gamekafe -  Các trò chơi Trực tuyến Miễn phí tại Y8.com" href="https://vi.y8.com/popular/games">Phổ biến nhất</a>
                        </li>
                        <li>
                            <a rel="nofollow" title="Tải trình duyệt Y8" href="/download-app">Tải ứng dụng</a>
                        </li>
                    </ul>
                </div>
                <div class="menu-updates">
                    <div class="title">Cập nhật
                    </div>
                    <ul>
                        <li>
                            <a title="Blog" href="https://blog.y8.com/">Blog</a>
                        </li>
                        <li>
                            <a title="Diễn đàn" href="https://forum.y8.com">Diễn đàn</a>
                        </li>
                        <li>
                            <a href="https://twitter.com/y8_com" target="_blank" rel="noreferrer nofollow" title="Twitter">Twitter</a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/Y8-Games-225100494185683/" target="_blank" rel="noreferrer nofollow" title="Facebook">Facebook</a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/y8.games/" target="_blank" rel="noreferrer nofollow" title="Instagram">Instagram</a>
                        </li>
                        <li>
                            <a href="https://discord.gg/ba9yXhj" target="_blank" rel="noreferrer nofollow" title="Discord">Discord</a>
                        </li>
                    </ul>
                </div>

                <div class="follow-us">
                    <div class="title">Theo dõi chúng tôi
                    </div>
                    <ul>
                        <li>
                            <a href="https://twitter.com/y8_com" target="_blank" rel="noreferrer nofollow" aria-label="twitter" title="Twitter">
                                <img src="https://img.y8.com/assets/svg/twitter-40437c6680e014b927c22e09bae7da5f3317948f71fae4e5daee25eb20c63176.svg" width="18" height="14" alt="twitter" />
                            </a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/Y8-Games-225100494185683/" target="_blank" rel="noreferrer nofollow" aria-label="facebook" title="Facebook">
                                <img src="https://img.y8.com/assets/svg/facebook-807ac7b9c731fd2695350e3c8bf65954582dfeacf87bd8a73ab38e0153543daf.svg" width="18" height="18" alt="facebook" />
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/y8.games/" target="_blank" rel="noreferrer nofollow" aria-label="instagram" title="Instagram">
                                <img src="https://img.y8.com/assets/svg/instagram-270989005465900b957b5c234169591ea33e43d5f12a3fd7131f486cf6577cfc.svg" width="18" height="18" alt="instagram" />
                            </a>
                        </li>
                        <li>
                            <a href="https://discord.gg/ba9yXhj" target="_blank" rel="noreferrer nofollow" aria-label="discord" title="Discord">
                                <img src="https://img.y8.com/assets/svg/discord-5fbfb24610991c5e17e89bc628ce593d2f4cfa61b1aa2d12ba7e318728caf974.svg" width="18" height="14" alt="discord" />
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="footer-image">
                    <img data-src="https://img.y8.com/assets/y8/footer_image1-422cedcbdbcd68bb2fbf253eafac355ee154ba97da9ad3c587d2e2052b8d7821.webp" data-srcset="https://img.y8.com/assets/y8/footer_image0-3fe943a45465748e2f015e7cd8c7bf18eb8478d8694f4c9c9434605eaf1d1dcb.webp 1x" alt="footer image" class="lazy" />
                </div>
            </div>
        </div>
    </footer>
    <div class="dark-overlay"></div>
    <div class="policy-validation" id="policy-validation" style="display:none;">
        <div class="logo">
            <img width="59" height="27" alt="Y8.com" src="https://img.y8.com/assets/y8/header-logo-b39e5071cb111465fc5a5aef6496121adfcb414692d067f967434d9d80418afc.svg" />
        </div>
        <div class="content">
            Chúng tôi sử dụng cookie để đề xuất nội dung và phân tích lưu lượng truy cập và quảng cáo. Khi sử dụng trang web này, bạn đồng ý với <a target="_blank" rel="nofollow" href="https://vi.y8.com/privacy">Chính sách bảo mật</a>
            và <a target="_blank" rel="nofollow" href="https://vi.y8.com/cookie-policy">Chính sách Cookie</a>
        </div>
        <div class="actions">
            <span class="validate-policy">Đã hiểu</span>
        </div>
    </div>
    <script src="{{ asset('js/page/application.js') }}"></script>
    <script src="{{ asset('js/page/index.js') }}"></script>
    @yield('js')
</body>

</html>
