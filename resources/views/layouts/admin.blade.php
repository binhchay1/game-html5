<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @yield('title')

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/plugins/fontawesome/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/ionicons/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/datatables/jquery.dataTables.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/black-logo-no-background.png') }}" />
    <style>
        body a {
            text-decoration: none;
        }

        .alert-fixed {
            position: fixed !important;
            top: 57px;
            left: 85.4%;
            width: 270px;
            z-index: 9999;
            border-radius: 0px;
            margin: 0;
        }
    </style>

    @yield('js_sort_users')

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="font-weight: 700;color: #292424">
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>

        @php $route = Route::currentRouteName(); @endphp
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="{{ route('dashboard') }}" class="brand-link">
                <img src="{{ asset('/images/color-logo-no-background.png') }}" alt="{{ env('APP_NAME', 'Gamekafe') }} Logo" class="brand-image img-circle elevation-3">
                <span class="brand-text font-weight-light">{{ env('APP_NAME', 'Gamekafe') }}</span>
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('dashboard')}}" class="nav-link" id="dashboard">
                                <i class="nav-icon fas fa-solid fa-chart-line"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.index') }}" class="nav-link" id="list-user">
                                <i class="nav-icon fas fa-solid fa-user"></i>
                                <p>
                                    User
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('category.index') }}" class="nav-link" id="list-category">
                                <i class="nav-icon fas fa-solid fa-list"></i>
                                <p>
                                    Category
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('game.index') }}" class="nav-link" id="list-game">
                                <i class="nav-icon fas fa-solid fa-gamepad"></i>
                                <p>
                                    Game
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('report.index') }}" class="nav-link" id="list-report">
                                <i class="nav-icon fas fa-solid fa-bug"></i>
                                <p>
                                    Report bug
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('comment.index') }}" class="nav-link" id="list-comment">
                                <i class="nav-icon fas fa-solid fa-comments"></i>
                                <p>
                                    Comment
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('achievement.index') }}" class="nav-link" id="list-achievement">
                                <i class="nav-icon fas fa-solid fa-trophy"></i>
                                <p>
                                    Achievements
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('search.index') }}" class="nav-link" id="list-search">
                                <i class="nav-icon fas fa-solid fa-search"></i>
                                <p>
                                    Search
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('tag.index') }}" class="nav-link" id="list-tags">
                                <i class="nav-icon fas fa-solid fa-tags"></i>
                                <p>
                                    Tags
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('post.index') }}" class="nav-link" id="list-post">
                                <i class="nav-icon fas fa-solid fa-clone"></i>
                                <p>
                                    Post
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    @if(Session::has('alert'))
                    <div class="alert {{ strpos(strtolower(Session::get('alert')), 'failed') == false ?  'alert-success' : 'alert-danger' }} alert-fixed" role="alert" id="alert-admin" style="width: fit-content !important;">
                        {{ Session::get('alert') }}
                    </div>
                    @endif
                    @yield('main_content')
                </div>
            </section>
        </div>
        <footer class="main-footer">
            <strong>Copyright &copy; 2023 <a href="{{ route('dashboard') }}">Gamekafe</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>

    <script src="{{ asset('js/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="{{ asset('js/plugins/bootstrap/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('js/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('js/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('js/admin/adminlte.js') }}"></script>
    <script src="{{ asset('js/admin/admin.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="{{ asset('js/plugins/datatables/jquery.dataTables.js') }}"></script>
    @yield('js')
</body>

</html>
