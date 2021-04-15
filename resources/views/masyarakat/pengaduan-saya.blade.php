@extends('user-layouts.master')

@section('content1')
    <section id="step" class="services section-bg">
      <div class="container">
        <div class="row">
        @if(!empty($pengaduan))
            @foreach ($pengaduan as $p)
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box">
                    @if ($p->status == '0')
                        <span class="badge badge-danger">Menunggu Konfirmasi</span>
                    @elseif ($p->status == 'proses')
                        <span class="badge badge-warning">Sedang Di Proses</span>
                    @else
                        <span class="badge badge-success">Selesai</span>
                    @endif
                    <div class="owl-carousel owl-theme" style="margin-top:20px">
                        @foreach ($p->foto as $f)
                        <div class="item">
                            <img src="{{asset('/images/' . $f->foto)}}" class="card-img-top" alt="No Image">
                        </div>
                        @endforeach
                    </div>
                <p class="description">{{$p->tgl_pengaduan->format('l, d F Y - H:i:s')}}</p>
                <h4 class="title"><a href="{{route('user.pengaduan.id', [$p->id_pengaduan])}}">{{$p->judul_laporan}}</a></h4>
                <p class="description">{{$p->isi_laporan}}</p>
                </div>
            </div>
            @endforeach
        @elseif(empty($pengaduan))
        <div class="section-title" data-aos="fade-up">
            <p>Belum ada Laporan Pengaduan</p>
        </div>
        @endif
        </div>
      </div>
    </section>
    <div class="d-flex justify-content-center">
        {!! $pengaduan->links() !!}
    </div>

<script>
  $(document).ready(function() {
    var owl = $('.owl-carousel');
    owl.owlCarousel({
      margin: 10,
      nav: false,
      dotsData: false,
      loop: true,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 2
        },
        1000: {
          items: 1
        }
      }
    })
  })
</script>
@endsection