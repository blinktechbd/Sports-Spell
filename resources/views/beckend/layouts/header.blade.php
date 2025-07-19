<nav class="main-header navbar navbar-expand navbar-danger navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-white"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('dashboard') }}" class="nav-link text-white">Home</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user text-white"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header"> {{ Auth::user()->name . ' Profile' ?? 'Admin Profile' }}</span>
                <div class="dropdown-divider"></div>
                <a href="{{ route('profile.settings') }}" class="dropdown-item">
                    <i class="fas fa-cog mr-2"></i> Profile Settings
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('admin.logout') }}" class="dropdown-item">
                    <i class="fas fa-sign-out-alt mr-2"></i> Sign Out
                </a>
            </div>
        </li>
    </ul>
</nav>
