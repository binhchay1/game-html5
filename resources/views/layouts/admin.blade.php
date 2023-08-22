<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @yield('title')

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/fontawesome/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('css/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/plugins/daterangepicker/daterangepicker.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/black-logo-no-background.png') }}" />
    <style>
        body a {
            text-decoration: none;
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    @yield('js_sort_users')

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            @vite(['resources/sass/app.scss', 'resources/js/app.js'])
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="font-weight: 700;color: #292424">
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
            <a href="" class="brand-link">
                <img src="{{ asset('/images/color-logo-no-background.png') }}" alt="{{ env('APP_NAME', 'Gamekafe') }} Logo" class="brand-image img-circle elevation-3">
                <span class="brand-text font-weight-light">{{ env('APP_NAME', 'Gamekafe') }}</span>
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('admin')}}" class="nav-link" id="admin">
                                <i class="nav-icon fas fa-solid fa-chart-line"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('chart.index') }}" class="nav-link" id="list-chart">
                                <i class="nav-icon fas fa-solid fa-user"></i>
                                <p>
                                    Statistical chart
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
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    @yield('main_content')
                </div>
            </section>
        </div>
        <footer class="main-footer">
            <strong>Copyright &copy; 2023 <a href="https://gamekafe.com">Gamekafe</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>
    <script src="{{asset('js/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="{{ asset('js/plugins/bootstrap/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('js/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('js/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('js/admin/adminlte.js') }}"></script>
    <script src="{{ asset('js/admin/admin.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    @yield('js')
</body>

</html>
