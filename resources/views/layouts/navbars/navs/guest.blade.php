<nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
    <div class="container px-4">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
            <!-- Navbar items -->
            <ul class="navbar-nav ml-auto">
                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="{{ route('home') }}">
                            <i class="fas fa-desktop"></i>
                            <span class="nav-link-inner--text">{{ __('Dashboard') }}</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>