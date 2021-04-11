<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pengaduan Masyarakat</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('userr/assets/img/OriPutih.png')}}" rel="icon">
  <link href="{{asset('userr/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('userr/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('userr/assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{asset('userr/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('userr/assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{asset('userr/assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('userr/assets/vendor/aos/aos.css')}}" rel="stylesheet">

  <!-- baru -->
  <script src="{{asset('userr/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
  <link rel="stylesheet" href="{{asset('userr/assets/vendor/dist/image-uploader.min.css')}}"> 
  <link rel="stylesheet" href="{{asset('userr/assets/vendor/dist/baru.css')}}">
  <script src="{{asset('userr/assets/vendor/dist/image-uploader.min.js')}}"></script>

  <!-- Template Main CSS File -->
  <link href="{{asset('userr/assets/css/style.css')}}" rel="stylesheet">

  <link href="{{asset('userr/assets/vendor/owl.carousel/assets/owl.theme.default.min.css')}}" rel="stylesheet">


</head>

<body>
    
  @include('user-layouts.include._topnavbar')

    @yield('header')
    
  <main id="main">

      @yield('content1')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact" data-aos="fade-up" data-aos-delay="100">
            <h3>Pengaduan Masyarakat</h3>
            <p>
              Jl. Rd. Demang Hardjakusumah Blok Jati <br>
              Cihanjuang, Cibabat, Kec. Cimahi Utara<br>
              Kota Cimahi, Jawa Barat 40513 <br><br>
              <strong>Phone:</strong><br> (022) 6654274<br>
              <strong>Email:</strong><br> diskominfoarpus@cimahikota.go.id<br>
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>Pengaduan Masyarakat</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

</body>
    
  <!-- Vendor JS Files -->
  <script src="{{asset('userr/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- <script src="{{asset('userr/assets/vendor/php-email-form/validate.js')}}"></script> -->
  <script src="{{asset('userr/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('userr/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('userr/assets/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('userr/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('userr/assets/vendor/aos/aos.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('userr/assets/js/main.js')}}"></script>

</body>

</html>