<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container-fluid d-flex" style="padding-left: 70px">
        <div class="logo mr-auto">
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <h1 class="text-light"><a href="index.html"><span>Ninestars</span></a></h1> -->
            <a href="index.html"><img src="{{asset('userr/assets/img/LogoOren.png')}}" alt="" class="img-fluid"></a>
        </div>
        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="drop-down {{ (request()->routeIs('user.pengaduan.home')) ? 'active' : '' }}"><a href="{{route('user.pengaduan.home')}}">Beranda</a>
                    <ul>
                        <li><a href="#about">Tentang Kami</a></li>
                        <li><a href="#step">Tahapan Pengaduan</a></li>
                    </ul>
                </li>

                <li class="{{ (request()->routeIs('user.pengaduan.create')) ? 'active' : '' }}"><a href="{{route('user.pengaduan.create')}}">Tulis Pengaduan</a></li>
                @if (Auth::guard('masyarakat')->user())
                <li class="{{ (request()->routeIs('user.pengaduan.saya')) ? 'active' : '' }}"><a href="{{route('user.pengaduan.saya') }}">Pengaduan Saya</a></li>
                <li class="get-started"><a href="{{route('logout')}}">Logout</a></li>
                @else
                <li class="get-started"><a href="{{route('login')}}">Masuk</a></li>
                @endif
            </ul>
        </nav>
    </div>
</header>