<!DOCTYPE html>
<html class="no-touch" lang="vi" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0, minimal-ui" />
    <meta name="theme-color" content="#FFF">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    @yield('title')

    <meta name="description" content="{{ __('Chơi trò chơi miễn phí trên') }} {{ env('APP_NAME', 'Gamekafe') }}. {{ __('Các game hai người chơi và game trang điểm hàng đầu. Tuy nhiên, game mô phỏng và game nấu ăn cũng rất phổ biến trong các người chơi. Gamekafe cũng hoạt động trên các thiết bị di động và có nhiều game cảm ứng cho điện thoại. Ghé thăm Gamekafe và gia nhập với cộng đồng người chơi ngay.') }}" />
    <meta name="keywords" content="{{ __('chơi trò chơi miễn phí') }}, {{ __('chơi trò chơi trực tuyến') }}, {{ __('chơi trò chơi, gamekafe, gamekafe, kafe, fake, gameka, chơi trò chơi bóng đá, chơi trò chơi android, chơi trò chơi đua xe, chơi trò chơi zombie, chơi candy crush, chơi trò chơi đua tốc độ, chơi trò chơi casino, chơi poker, chơi trò chơi bắn nhau, chơi trò chơi thời trang, chơi trò chơi nữ giới, chơi trò chơi nấu ăn, chơi trò chơi phiêu lưu, chơi trò chơi câu cá, chơi trò chơi halloween, chơi trò chơi tình yêu, chơi trò chơi đố vui, chơi trò chơi thể thao, chơi trò chơi chiến tranh, chơi trò chơi bóng đá') }}" />
    <meta property="og:title" content="{{ env('APP_NAME', 'Gamekafe') }} -  {{ __('Các trò chơi Trực tuyến Miễn phí tại') }} {{ env('APP_NAME', 'Gamekafe') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ env('APP_URL', 'gamekafe.com') }}">
    <meta property="og:image" content="{{ asset('images/black-logo-no-background.png') }}">
    <meta property="og:image:width" content="500">
    <meta property="og:image:height" content="500">
    <meta property="og:site_name" content="{{ env('APP_NAME', 'Gamekafe') }}">
    <meta property="og:description" content="{{ __('Chơi trò chơi miễn phí trên') }} {{ env('APP_NAME', 'Gamekafe') }}. {{ __('Các game hai người chơi và game trang điểm hàng đầu. Tuy nhiên, game mô phỏng và game nấu ăn cũng rất phổ biến trong các người chơi.') }} {{ env('APP_NAME', 'Gamekafe') }} cũng hoạt động trên các thiết bị di động và có nhiều game cảm ứng cho điện thoại. Ghé thăm Gamekafe và gia nhập với cộng đồng người chơi ngay.">
    <link rel="canonical" href="{{ env('APP_URL', 'https://gamekafe.com') }}" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/black-logo-no-background.png') }}" />
    <link rel="icon" sizes="192x192" href="{{ asset('images/black-logo-no-background.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/black-logo-no-background.png') }}">
    <link rel="stylesheet" href="{{ asset('css/page/application.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/page/latin.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/page/user.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/plugins/fontawesome/all.min.css') }}" type='text/css'>

    @yield('css')
</head>

<body class="items index games-active">
    <nav class="navbar">
        <div class="container">
            <div class="y8-navbar-left">
                <div class="mobile-burger-menu">
                    <span class="burger-btn">
                        <img width="20" height="17" class="hamburger-icon" alt="Menu" src="{{ asset('svg/hamburger.svg') }}" />
                        <img width="16" height="16" class="hamburger-active-icon" alt="Menu" src="{{ asset('svg/hamburger-active.svg') }}" />
                    </span>
                </div>
                <div class="logo">
                    <a class="no-event" aria-label="logo" href="{{ route('home') }}">
                        <img width="50" height="50" alt="{{ env('APP_NAME', 'Gamekafe') }}" src="{{ asset('images/black-logo-no-background.png') }}" />
                    </a>
                </div>
                <div class="mobile-search-user-container">
                    <div class="search-btn" id="mobile-search-icon">
                        <img width="28" height="28" alt="{{ __('Tìm kiếm trò chơi') }}" src="{{ asset('svg/search.svg') }}" />
                    </div>
                    <div class="profile-btn">
                        @if(Auth::check())
                        <img class="profile-icon avatar" alt="Profile" src="{{ Auth::user()->image ?? asset('/images/default-avatar.png') }}" id="profile-icon-image" />
                        @else
                        <img class="profile-icon avatar" alt="Profile" src="{{ asset('svg/profile.svg') }}" id="profile-icon-image" />
                        @endif
                        <img class="arrow-up-icon" alt="Profile" src="{{ asset('svg/arrow-up.svg') }}" id="arrow-up-image" />
                    </div>
                </div>
            </div>

            <form id="items-search-form" class="navbar-form" action="{{ route('search') }}" accept-charset="UTF-8" method="get">
                <input type="text" name="q" id="q" placeholder="{{ __('Tìm kiếm trò chơi') }}" class="form-control query fake-button" required="required" />
                <button type="submit" aria-label="Search">
                    <i class="y-icon y-icon--search"></i>
                </button>
                <span class="close-search-form"></span>
            </form>

            <div class="y8-navbar-right">
                <a style="text-decoration: none;" href="{{ route('new-games') }}">
                    <div class="fake-button js-top-menu two-lines btn-header-actions new-games">
                        {{ __('Game Mới') }}
                        <span class="sub-title">
                            {{ __('trong tháng') }}
                        </span>
                    </div>
                </a>

                <a style="text-decoration: none;" href="{{ route('best-games') }}">
                    <div class="fake-button js-top-menu two-lines btn-header-actions browse">
                        {{ __('Game Phổ Biến') }}
                        <span class="sub-title">{{ __('được quan tâm') }}
                        </span>
                        <div class="with-notification"></div>
                    </div>
                </a>

                <div class="waiting-idnet">
                    @if (!auth()->user())
                    <div id="user_not_logged_in">
                        <a href="{{ route('register') }}">
                            <button type="button" class="fake-button fake-button-red idnet-fast-register-link">{{ __('Đăng ký') }}
                            </button>
                        </a>
                        <a href="{{route('login')}}">
                            <button type="button" class="fake-button idnet-fast-login-link">{{ __('Đăng nhập') }}
                            </button>
                        </a>
                    </div>
                    @else
                    <div id="user_logged_in">
                        <div class="fake-button js-top-menu user-toggle" data-menu="account">
                            <img src="{{ Auth::user()->image ?? asset('/images/default-avatar.png') }}" class="avatar" alt="avatar">
                        </div>
                        <div class="links-container-container">
                            <div class="links-container sub-menu">
                                <div class="sub-menu-header">
                                    <span class="username username_box">{{ Auth::user()->name }}</span>
                                </div>
                                <ul>
                                    <li>
                                        <a class="account-menu-link" id="account-menu-link-profile" href="{{ route('user.edit') }}">{{ __('Hồ sơ') }}</a>
                                    </li>
                                    <li>
                                        <a class="account-menu-link" id="account-menu-link-games" href="{{ route('user.favorite') }}">
                                            {{ __('Yêu thích') }}
                                            (<span class="js-favorites-count">{{ $countGameInCollection }}</span>)
                                        </a>
                                    </li>
                                    <li>
                                        <a class="account-menu-link" id="account-menu-link-visited" href="{{ route('game.played') }}">
                                            {{ __('Trò đã chơi') }}
                                        </a>
                                    </li>
                                </ul>
                                <div class="sub-menu-footer">
                                    <ul>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <a onclick="this.closest('form').submit();return false;" class="account-menu-link logout">{{ __('Đăng xuất') }}</a>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <div class="mobile-header-block">
                    <div class="popular-newest-games-links">
                        <a class="games-link new-game fake-button" title="{{ __('Các trò chơi Trực tuyến Miễn phí tại') }} {{ env('APP_NAME', 'Gamekafe') }}" href="{{ route('new-games') }}">{{ __('Game Mới') }}</a>
                        <a class="games-link pop-game fake-button" title="{{ __('Các trò chơi Trực tuyến Miễn phí tại') }} {{ env('APP_NAME', 'Gamekafe') }}" href="{{ route('best-games') }}">{{ __('Game Phổ Biến') }}</a>
                    </div>

                    <div class="top-categories-mobile">
                        <div class="title">
                            {{ __('Các loại game') }}
                        </div>
                        <div class="row">
                            <ul>
                                @foreach($listCategory as $category)
                                <li class="inactive {{ $category['name'] }} li-category">
                                    <a class="{{ $category['name'] }}" title="{{ $category['title'] }}" href="{{ route('category', ['category' => $category['name']]) }}">
                                        @if(session('locale') == 'vi')
                                        <span class="name">{{ \App\Enums\TransVietnamese::CATEGORY_VIETNAMESE[ucfirst($category['name'])] }}</span>
                                        @else
                                        <span class="name">{{ __(ucfirst($category['name'])) }}</span>
                                        @endif
                                        <span class="number">{{ $category['games_count'] }} game</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="top-tags-mobile">
                        <div class="title">
                            {{ __('Thẻ') }}
                        </div>
                        <div class="top-tags-mobile__wrapper">
                            <div class="row top-tags__height">
                                <ul>
                                    @foreach($listTag as $tag)
                                    <li style="margin-top: 5px;">
                                        <a class="tag" href="{{ route('tags', ['tag' => $tag]) }}">
                                            <h4>
                                                {{ $tag }}
                                            </h4>
                                        </a>
                                    </li>
                                    @endforeach
                                    <li class="more-tags">
                                        <a class="tag all-tags top" href="{{ route('listTags') }}">{{ __('Tất cả các thẻ') }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="locale-selector-dropdown" class="locale-selector-dropdown fake-button">
                    <div id="button-flag" onclick="dropDownLocate()">
                        <img src="{{ asset(\App\Enums\Locale::LIST_FLAG[Session::get('locale')]) }}" class="image-flag">
                    </div>

                    <div id="locate-dropdown">
                        <ul>
                            <li>
                                <a aria-label="{{ __('Lựa chọn ngôn ngữ') }}" href="{{ route('app.setLocale', ['locale' => 'vi']) }}" id="locale-vi">
                                    <img src="{{ asset('svg/flag/vn.svg') }}" class="image-flag mt-3">
                                </a>
                            </li>
                            <li>
                                <a aria-label="{{ __('Lựa chọn ngôn ngữ') }}" href="{{ route('app.setLocale', ['locale' => 'en']) }}" id="locale-en">
                                    <img src="{{ asset('svg/flag/gb.svg') }}" class="image-flag mt-3">
                                </a>
                            </li>
                            <li>
                                <a aria-label="{{ __('Lựa chọn ngôn ngữ') }}" href="{{ route('app.setLocale', ['locale' => 'hr']) }}" id="locale-hr">
                                    <img src="{{ asset('svg/flag/hr.svg') }}" class="image-flag mt-3">
                                </a>
                            </li>
                            <li>
                                <a aria-label="{{ __('Lựa chọn ngôn ngữ') }}" href="{{ route('app.setLocale', ['locale' => 'th']) }}" id="locale-th">
                                    <img src="{{ asset('svg/flag/th.svg') }}" class="image-flag mt-3">
                                </a>
                            </li>
                            <li>
                                <a aria-label="{{ __('Lựa chọn ngôn ngữ') }}" href="{{ route('app.setLocale', ['locale' => 'ro']) }}" id="locale-ro">
                                    <img src="{{ asset('svg/flag/ro.svg') }}" class="image-flag mt-3">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
    <footer class="footer" style="margin-top: 15px;">
        <div class="container">
            <div class="text-container">
                <div class="column question-icon">
                    <div class="title red">{{ env('APP_NAME', 'Gamekafe') }} {{ __('là gì?') }}
                    </div>
                    <h2 class="text">
                        <p>
                            {{ __('Bạn có biết') }} <a href="{{ env('APP_URL', 'Gamekafe.com') }}">{{ env('APP_NAME', 'Gamekafe') }}</a> {{ __('đang cung cấp các game và câu đố trực tuyến từ năm 2006?') }}<br>
                            {{ __('Đã hơn 15 năm thú vị của') }} {{ env('APP_NAME', 'Gamekafe') }}! {{ __('Cảm ơn bạn đã là một phần của cộng đồng') }} {{ env('APP_NAME', 'Gamekafe') }}!<br>
                            <a href="{{ env('APP_URL', 'Gamekafe.com') }}">{{ env('APP_NAME', 'Gamekafe') }}</a> {{ __('là một đơn vị phát hành và phát triển game') }}. {{ __('Nền tảng của') }} {{ env('APP_NAME', 'Gamekafe') }} {{ __('là mạng xã hội với 30 triệu người chơi và đang không ngừng phát triển.') }}
                            {{ __('Danh mục giải trí phát triển hàng ngày') }} <a href="{{ route('new-games') }}">{{ __('Trò chơi mới') }}</a>
                            {{ __('được phát hành từng ngày.') }} {{ __('Vì') }} <a href="{{ env('APP_URL', 'Gamekafe.com') }}">{{ env('APP_NAME', 'Gamekafe') }}</a> {{ __('có một lịch sử lâu dài, chúng tôi đã ghi lại các hiện tượng xã hội trên các trình duyệt game. Nội dung này là một phương tiện nghệ thuật quan trọng và có thể có thể lý giải cái gì người ta thích trong những giai đoạn khác nhau.') }}
                        </p>
                    </h2>
                </div>
                <div class="column game-categories-icon">
                    <h3 class="title blue">{{ __('Thể loại game') }}
                    </h3>
                    <h4 class="text">
                        <p>
                            {{ __('Trước đây,') }} <a href="{{ env('APP_URL', 'Gamekafe.com') }}">{{ env('APP_NAME', 'Gamekafe') }}</a> {{ __('nổi tiếng với các dòng game như arcade và games cổ điển khi') }}. {{ __('Đáng chú ý là,') }} <a href="{{ route('tags', ['tag' => 'singleplayer']) }}">{{ __('một người chơi') }}</a>
                            {{ __('đã trở thành game trình duyệt nổi tiếng cùng với') }} <a href="{{ route('tags', ['tag' => '2d']) }}">{{ __('trò chơi 2d') }}</a>
                            . {{ __('Một phần trò chơi quan trọng cuối cùng là') }} <a href="{{ route('tags', ['tag' => 'multiplayer']) }}">{{ __('nhiều người chơi') }}</a>
                            , {{ __('chơi danh mục mở rộng của game mạng xã hội hỗ trợ mạng') }}
                        </p>
                    </h4>
                </div>
                <div class="column technologies-icon">
                    <h3 class="title green">{{ __('Công nghệ') }}
                    </h3>
                    <h4 class="text">
                        <p>
                            <a href="{{ env('APP_URL', 'Gamekafe.com') }}">{{ env('APP_NAME', 'Gamekafe') }}</a> {{ __('là ngôi nhà cho mọi game thủ trên bất kỳ thiết bị nào.') }} {{ __('Chơi') }} <a href="{{ route('tags', ['tag' => 'pixel']) }}" rel="nofollow">{{ __('trò chơi dưới dạng điểm ảnh') }}</a>
                            {{ __('hoặc tải đồ họa 3D phong phú trên máy tính bằng cách chơi') }} <a href="{{ route('tags', ['tag' => 'web']) }}" rel="nofollow">{{ __('trò chơi cổ điển') }}</a>
                            . {{ __('Mặt khác, nếu bạn chỉ thích chơi trò chơi 2D thông thường, thì') }} <a href="{{ route('tags', ['tag' => 'html5']) }}" rel="nofollow">{{ __('trò chơi') }} HTML5</a>
                            {{ __('sẽ phù hợp với bạn. Nếu bạn muốn tiếp cận với công nghệ mới, hãy truy cập kho lưu trữ') }} <a href="{{ route('tags', ['tag' => '3d']) }}" rel="nofollow">{{ __('trò chơi') }} 3d</a>
                            {{ __('để chơi các trò chơi chưa hề có ở những nơi khác.') }} {{ __('Cuối cùng, đừng quên đăng ký') }} <a href="{{ route('register') }}" rel="nofollow">{{ env('APP_NAME', 'Gamekafe') }} {{ __('tài khoản') }}</a>
                            . {{ __('Đây là mạng xã hội cộng đồng hỗ trợ người chơi.') }}
                        </p>
                    </h4>
                </div>
            </div>
            <div class="bottom-section">
                <div class="logo-container">
                    <a class="no-event" aria-label="logo" href="{{ route('home') }}">
                        <img width="67" height="30" alt="Gamekafe" src="{{ asset('images/black-logo-no-background.png') }}" />
                    </a>
                    <span>© 2023 {{ env('APP_NAME', 'Gamekafe') }}</span>
                    <span>{{ __('Đã đăng ký bản quyền.') }}</span>
                </div>
                <div class="menu-games">
                    <div class="title">{{ env('APP_NAME', 'Gamekafe') }}
                    </div>
                    <ul>
                        <li>
                            <a title="{{ env('APP_NAME', 'Gamekafe') }} -  {{ __('Các trò chơi Trực tuyến Miễn phí tại') }} {{ env('APP_NAME', 'Gamekafe') }}" href="{{ route('new-games') }}">{{ __('Game mới') }}</a>
                        </li>
                        <li>
                            <a rel="nofollow" title="{{ env('APP_NAME', 'Gamekafe') }} -  {{ __('Các trò chơi Trực tuyến Miễn phí tại') }} {{ env('APP_NAME', 'Gamekafe') }}" href="{{ route('best-games') }}">{{ __('Phổ biến nhất') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="footer-image">
                    <img src="{{ asset('images/footer_image1.webp') }}" alt="footer image" class="lazy" />
                </div>
            </div>
        </div>
    </footer>
    <div class="dark-overlay"></div>
    <div class="policy-validation" id="policy-validation" style="display: none;">
        <div style="display: flex;">
            <div class="logo">
                <img width="59" height="27" alt="Gamekafe" src="{{ asset('images/black-logo-no-background.png') }}" />
            </div>
            <div class="content">
                {{ __('Chúng tôi sử dụng cookie để đề xuất nội dung và phân tích lưu lượng truy cập và quảng cáo. Khi sử dụng trang web này, bạn đồng ý với') }} <a target="_blank" rel="nofollow" href="{{ route('privacy') }}">{{ __('Chính sách bảo mật') }}</a>
                {{ __('và') }} <a target="_blank" rel="nofollow" href="{{ route('cookie-policy') }}">{{ __('Chính sách Cookie') }}</a>
            </div>
            <div class="actions" onclick="storeAccepted('accepted')">
                <span class="validate-policy">{{ __('Đã hiểu') }}</span>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/plugins/jquery/jquery.min.js') }}"></script>
    <script>
        <?php if (Auth::check()) { ?>
            const loginDefined = true;
        <?php } else { ?>
            loginDefined = false;
        <?php } ?>

        const locale = '<?php echo Session::get('locale') ?>';
    </script>
    <script src="{{ asset('js/page/main.js') }}"></script>
    <script src="{{ asset('js/admin/user.js') }}"></script>
    @yield('js')
</body>

</html>
