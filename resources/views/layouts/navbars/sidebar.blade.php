<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('images/logo.png') }}">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item {{Request::is('dashboard') ? 'active' : ''}}">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="ni ni-tv-2 text-success"></i> {{ __('Dashboard') }}
                    </a>
                </li>
                <li class="nav-item {{Request::is('user') || Request::is('payment/*') ? 'active' : ''}}">
                    <a class="nav-link" href="{{ route('user.index') }}">
                        <i class="fas fa-money-check-alt text-success"></i> {{ __('Pembayaran SPP') }}
                    </a>
                </li>
                <li class="nav-item {{Request::is('user') || Request::is('fee/*') ? 'active' : ''}}">
                    <a class="nav-link" href="{{ route('user.index') }}">
                        <i class="fas fa-folder text-success"></i> {{ __('SPP') }}
                    </a>
                </li>
                <li class="nav-item {{Request::is('user') || Request::is('student/*') ? 'active' : ''}}">
                    <a class="nav-link" href="{{ route('user.index') }}">
                        <i class="fas fa-user-graduate text-success"></i> {{ __('Siswa') }}
                    </a>
                </li>
                <li class="nav-item {{Request::is('user') || Request::is('class/*') ? 'active' : ''}}">
                    <a class="nav-link" href="{{ route('user.index') }}">
                        <i class="fas fa-chalkboard text-success"></i> {{ __('Kelas') }}
                    </a>
                </li>
                <li class="nav-item {{Request::is('user') || Request::is('user/*') ? 'active' : ''}}">
                    <a class="nav-link" href="{{ route('user.index') }}">
                        <i class="fas fa-users text-success"></i> {{ __('Petugas') }}
                    </a>
                </li>
                <li class="nav-item {{Request::is('role') || Request::is('role/*') ? 'active' : ''}}">
                    <a class="nav-link" href="{{ route('role.index') }}">
                        <i class="fas fa-lock text-success"></i> {{ __('Hak Akses') }}
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link active" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="fab fa-laravel" style="color: #f4645f;"></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('Laravel Examples') }}</span>
                    </a>

                    <div class="collapse show" id="navbar-examples">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile.edit') }}">
                                    {{ __('User profile') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.index') }}">
                                    {{ __('User Management') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
            </ul>
        </div>
    </div>
</nav>
