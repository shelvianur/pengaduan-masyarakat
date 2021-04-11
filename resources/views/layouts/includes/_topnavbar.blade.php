<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        @if (request()->routeIs('admin.index'))
            <h4 class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Dashboard</h4>
        @elseif (request()->routeIs('admin.masyarakat.index'))
            <h4 class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Masyarakat</h4>
        @elseif (request()->routeIs('admin.petugas.index'))
            <h4 class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Petugas</h4>
        @elseif (request()->routeIs('admin.pengaduan.index'))
            <h4 class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Pengaduan</h4>
        @elseif (request()->routeIs('admin.tanggapan.index'))
            <h4 class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Tanggapan</h4>
        @elseif (request()->routeIs('admin.pengaduan.user'))
            <h4 class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Laporan Pengaduan</h4>
        @elseif (request()->routeIs('admin.laporan.tanggal'))
            <h4 class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Cetak Laporan Pengaduan</h4>
        @elseif (request()->routeIs('admin.laporan.status'))
            <h4 class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Cetak Laporan Pengaduan</h4>
        @endif
        <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{asset('adminn/assets/img/theme/team-4-800x800.jpg')}}">
                        </span>
                        <div class="media-body ml-2 d-none d-lg-block">
                            
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <a href="{{asset('adminn/examples/profile.html')}}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>My profile</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="/logout" class="dropdown-item">
                        <i class="ni ni-user-run"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
