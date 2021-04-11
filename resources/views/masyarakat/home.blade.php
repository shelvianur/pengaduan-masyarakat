@extends('user-layouts.master') 

@section('header')
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1">
                <h1>Layanan Aspirasi dan Pengaduan Online Rakyat</h1>
                <h2>Sampaikan laporan Anda langsung kepada instansi pemerintah berwenang</h2>
                <a href="{{route('user.pengaduan.create')}}" class="btn-get-started scrollto">Tulis Pengaduan</a>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img">
                <img src="{{asset('userr/assets/img/hero-img.svg')}}" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>
</section><!-- End Hero -->
@endsection

@section('content1')
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row justify-content-between">
          <div class="col-lg-5 d-flex align-items-center justify-content-center about-img">
            <img src="{{asset('userr/assets/img/about-img.svg')}}" class="img-fluid" alt="" data-aos="zoom-in">
          </div>
          <div class="col-lg-6 pt-5 pt-lg-0">
            <h3 data-aos="fade-up">Apa itu Pengaduan Masyarakat?</h3>
            <p data-aos="fade-up" data-aos-delay="100">
                Layanan penyampaian semua aspirasi dan pengaduan masyarakat Cimahi. Dibentuk untuk merealisasikan kebijakan “no wrong door policy” yang menjamin hak masyarakat agar pengaduan dari manapun dan jenis apapun akan disalurkan kepada penyelenggara pelayanan publik yang berwenang menanganinya.
            </p>
            <div class="row">
              <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                <i class="bx bx-receipt"></i>
                <h4>Tujuan</h4>
                <p>Penyelenggara dapat mengelola pengaduan dari masyarakat secara sederhana, cepat, tepat, tuntas, dan terkoordinasi dengan baik</p>
              </div>
              <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                <i class="bx bx-cube-alt"></i>
                <h4>Fitur</h4>
                <p>Rahasia: Seluruh isi laporan tidak dapat dilihat oleh publik.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="step" class="services section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Tahapan Pengaduan</h2>
          <p>Sederhana, cepat, tepat, tuntas, dan terkoordinasi dengan baik</p>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-highlight"></i></div>
              <h4 class="title"><a href="">Tulis Laporan</a></h4>
              <p class="description">Laporkan keluhan atau aspirasi anda dengan jelas dan lengkap</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-recycle"></i></div>
              <h4 class="title"><a href="">Proses Verifikasi</a></h4>
              <p class="description">Laporan Anda akan diverifikasi dan diteruskan kepada instansi berwenang untuk ditindaklanjuti</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-message-rounded"></i></div>
              <h4 class="title"><a href="">Beri Tanggapan</a></h4>
              <p class="description">Anda dapat menanggapi kembali balasan yang diberikan oleh instansi</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-check-circle"></i></div>
              <h4 class="title"><a href="">Selesai</a></h4>
              <p class="description">Laporan Anda akan terus ditindaklanjuti hingga terselesaikan</p>
            </div>
          </div>

        </div>

      </div>
    </section>
@endsection