<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="#">
            <img src="{{asset('adminn/assets/img/brand/blue.png')}}" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ni ni-bell-55"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{asset('adminn/assets/img/theme/team-1-800x800.jpg')}}">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome!</h6>
                    </div>
                    <a href="{{asset('adminn/examples/profile.html')}}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>My profile</span>
                    </a>
                    <a href="{{asset('adminn/examples/profile.html')}}" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>Settings</span>
                    </a>
                    <a href="{{asset('adminn/examples/profile.html')}}" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>Activity</span>
                    </a>
                    <a href="{{asset('adminn/examples/profile.html')}}" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>Support</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#!" class="dropdown-item">
                        <i class="ni ni-user-run"></i>
                        <span>Logout</span>
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
                        <a href="#">
                            <img src="{{asset('adminn/assets/img/brand/blue.png')}}">
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
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                @if (isset(Auth::guard('petugas')->user()->level))
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-tv-2 text-primary"></i> Dashboard
                    </a>
                </li>
                    @if (Auth::guard('petugas')->user()->level == 'admin')
                <li class="nav-item">
                    <a class="nav-link {{ (request()->routeIs('admin.masyarakat.index')) ? 'active' : '' }}" href="{{route('admin.masyarakat.index')}}">
                        <i class="ni ni-planet text-purple"></i> Masyarakat
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->routeIs('admin.petugas.index')) ? 'active' : '' }}" href="{{route('admin.petugas.index')}}">
                        <i class="ni ni-single-02 text-green"></i> Petugas
                    </a>
                </li>
                    @endif
                <li class="nav-item">
                    <a class="nav-link {{ (request()->routeIs('admin.pengaduan.index')) ? 'active' : '' }}" href="{{route('admin.pengaduan.index')}}">
                        <i class="ni ni-notification-70 text-yellow"></i> Pengaduan
                    </a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link {{ (request()->routeIs('admin.tanggapan.index')) ? 'active' : '' }}" href="{{route('admin.tanggapan.index')}}">
                        <i class="ni ni-archive-2 text-orange"></i> Tanggapan
                    </a>
                </li> 
                @endif
                @if (Auth::guard('masyarakat')->user())
                <li class="nav-item">
                    <a class="nav-link {{ (request()->routeIs('user.pengaduan.index')) ? 'active' : '' }}" href="{{route('user.pengaduan.index')}}">
                        <i class="ni ni-notification-70 text-yellow"></i> Pengaduan
                    </a>
                </li>
                @endif
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading text-muted">Documentation</h6>
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html">
                        <i class="ni ni-spaceship"></i> Getting started
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
                        <i class="ni ni-palette"></i> Foundation
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html">
                        <i class="ni ni-ui-04"></i> Components
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
