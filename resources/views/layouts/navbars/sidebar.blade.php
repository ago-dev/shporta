<nav class="support-nav background-1 navbar navbar-vertical fixed-left navbar-expand-md navbar-light" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
            aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="nav-brand-link" href="{{ route('home') }}">
            <div class="brand-container">
                <div class="shporta-logo circle-logo"></div>
            <h1 class="nav-brand cl-mid-white">Shporta
            </h1>
            </div>
        </a>
        <!-- User -->

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <h1>Shporta</h1>
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                            data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                            aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended"
                        placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" href="{{ route('home') }}">
                        <i class="ni ni-tv-2"></i> {{ __('Dashboard') }}
                    </a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('employees')) ? 'active' : '' }}" href="{{ route('employees') }}">
                        <i class="ni ni-single-02"></i> {{ __('Employees') }}
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ (request()->is('orders')) ? 'active' : '' }}" href="{{ route('orders') }}">
                        <i class="ni ni-cart"></i> {{ __('Orders') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('food-services')) ? 'active' : '' }}" href="{{ route('food-services') }}">
                        <i class="ni ni-shop"></i> {{ __('Food Services') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('menus')) ? 'active' : '' }}" href="{{ route('menus') }}">
                        <i class="ni ni-album-2"></i> {{ __('Menus') }}
                    </a>
                </li>
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading text-muted">Documentation</h6>
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-spaceship"></i> Guidelines
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-palette"></i> Help
                    </a>
                </li>
            </ul>
        </div
    </div>
</nav>
