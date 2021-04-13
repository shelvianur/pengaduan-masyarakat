<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Login | Pengaduan Masyarakat</title>
    <!-- Favicon -->
    <link href="{{asset('adminn/assets/img/brand/favicon.png')}}" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{asset('adminn/assets/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
    <link href="{{asset('adminn/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('adminn/assets/vendor/fontawesome/css/all.min.css')}}" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{asset('adminn/assets/css/argon.css?v=1.0.0')}}" rel="stylesheet">
</head>

<body class="bg-default">
  <div class="main-content">
      <!-- Navbar -->
      <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
        <div class="container px-4">
          <a class="navbar-brand pt-0" href="#">
              <img src="{{asset('adminn/assets/img/brand/LogoTulisanPu.png')}}" class="navbar-brand-img" alt="...">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbar-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
              <div class="row">
                <div class="col-6 collapse-brand">
                    <img src="{{asset('adminn/assets/img/brand/LogoTulisanBi.png')}}">
                </div>
                <div class="col-6 collapse-close">
                  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                    <span></span>
                    <span></span>
                  </button>
                </div>
              </div>
            </div>
            <!-- Navbar items -->
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link nav-link-icon" href="{{route('registrasi')}}">
                  <i class="ni ni-circle-08"></i>
                  <span class="nav-link-inner--text">Daftar</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-link-icon" href="{{route('login')}}">
                  <i class="ni ni-key-25"></i>
                  <span class="nav-link-inner--text">Login</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- Header -->
      <div class="header bg-gradient-primary py-7 py-lg-8">
        <div class="container">
          <div class="header-body text-center mb-7">
            <div class="row justify-content-center">
              <div class="col-lg-5 col-md-6">
                <h1 class="text-white">Selamat Datang!</h1>
              </div>
            </div>
          </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
          <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
          </svg>
        </div>
      </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <small>DAFTAR</small>
                        </div>
                        <form action="{{route('regis')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-collection"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Nik" type="number" name="nik" required>
                                </div>
                                @error('nik')
                                  <div class="text-muted font-italic">
                                    <small><span class="text-danger font-weight-700">{{ $message }}</span></small>
                                  </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Username" type="text" name="username" required>
                                </div>
                                @error('username')
                                  <div class="text-muted font-italic">
                                    <small><span class="text-danger font-weight-700">{{ $message }}</span></small>
                                  </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Nama" type="text" name="nama" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Email" type="email" name="email" required>
                                </div>
                                @error('email')
                                  <div class="text-muted font-italic">
                                    <small><span class="text-danger font-weight-700">{{ $message }}</span></small>
                                  </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Password" type="password" name="password" required>
                                  </div>
                                  @error('password')
                                    <div class="text-muted font-italic">
                                      <small><span class="text-danger font-weight-700">{{ $message }}</span></small>
                                    </div>
                                  @enderror
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Confirm Password" type="password" name="confirm_password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Nomor Telepon" type="number" name="telp">
                                </div>
                                @error('telp')
                                  <div class="text-muted font-italic">
                                    <small><span class="text-danger font-weight-700">{{ $message }}</span></small>
                                  </div>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-4">Create account</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mt-3">
                  <div class="col-6">
                        <!-- <a href="#" class="text-light"><small>Forgot password?</small></a> -->
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{route('registrasi')}}" class="text-light"><small>Create new account</small></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- Footer -->
  <footer class="py-5">
      <div class="container">
          <div class="row align-items-center justify-content-xl-between">
              <div class="col-xl-6">
                  <div class="copyright text-center text-xl-left text-muted">
                      &copy; 2021 <a href="https://smkn2cmi.sch.id/" class="font-weight-bold ml-1" target="_blank">Pengaduan Masyarakat</a>
                  </div>
              </div>
          </div>
      </div>
  </footer>
    <script src="{{asset('adminn/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('adminn/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Optional JS -->
    <script src="{{asset('adminn/assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{asset('adminn/assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
    <!-- Argon JS -->
    <script src="{{asset('adminn/assets/js/argon.js?v=1.0.0')}}"></script>
</body>

</html>