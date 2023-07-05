@php $route = Route::currentRouteName(); @endphp
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="" class="brand-link">
        <img src="{{asset('/backend/images/1536478465006.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">Modobom</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="" class="nav-link ">
                        <i class="nav-icon fas fa-solid fa-user"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link  ">
                        <i class="nav-icon fas fa-solid fa-list"></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link  ">
                        <i class="nav-icon fas fa-solid fa-calendar"></i>
                        <p>
                           Brand
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link  ">
                        <i class="nav-icon fab fa-product-hunt"></i>
                        <p>
                            Product
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
