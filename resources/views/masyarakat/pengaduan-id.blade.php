@extends('user-layouts.master')

@section('content1')
<!-- ======= Contact Us Section ======= -->
<section id="contact" class="contact">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <p>Detail Laporan Pengaduan</p>
        </div>

        <div class="row">
          <div class="col-lg-8 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="info">
                @if ($p->status == '0')
                    <a href="{{route('user.pengaduan.hapus', [$p->id_pengaduan])}}" class="btn btn-sm btn-danger" style="float: right;" onclick="return confirm('Apakah anda yakin akan menghapus laporan anda?')">Hapus</a>
                @else
                @endif
                <table>
                    <tr>
                        <td><h6>Nama</h6></td>
                        <td><h6 style="padding: 5px"> : </h6></td>
                        <td><h6>{{$p->nama}}</h6></td>
                    </tr>
                    <tr>
                        <td><h6>NIK</h6></td>
                        <td><h6 style="padding: 5px"> : </h6></td>
                        <td><h6>{{$p->nik}}</h6></td>
                    </tr>
                    <tr>
                        <td><h6>Nomor Telepon</h6></td>
                        <td><h6 style="padding: 5px"> : </h6></td>
                        <td><h6>{{$p->telp}}</h6></td>
                    </tr>
                    <tr>
                        <td><h6>Tanggal</h6></td>
                        <td><h6 style="padding: 5px"> : </h6></td>
                        <td><h6>{{$p->tgl_pengaduan->format('l, d F Y - H:i:s')}}</h6></td>
                    </tr>
                    <tr>
                        <td><h6>Status</h6></td>
                        <td><h6 style="padding: 5px"> : </h6></td>
                        <td id="status">

                        </td>
                    </tr>
                </table>
                <div>
                    <h5>Foto</h5>
                    <div class="owl-carousel owl-theme" style="margin-top:20px">
                    @foreach ($image as $img)
                    <div class="item">
                        <img src="{{asset('/images/' . $img->foto)}}" class="card-img-top" alt="No Image">
                    </div>
                    @endforeach
                </div>
                </div>
                <div class="my-4">
                    <h5>Laporan</h5>
                    <h6>{{$p->judul_laporan}}</h6>
                    <p style="padding: 0;">{{$p->isi_laporan}}</p>
                </div>
                <div>
                    <h5>Tanggapan</h5>
                    <div id="tanggapan">

                    </div>
                </div>
            </div>

          </div>

        @if ($p->status != 'selesai')
          <div class="col-lg-4 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200" id="form-1">
            <form action="{{route('user.pengaduan.kirim', [$p->id_pengaduan])}}" method="post" role="form" class="php-form">
            @csrf
              <div class="form-group">
                <label for="name">Beri Tanggapan</label>
                <textarea class="form-control" name="tanggapan" rows="10" data-rule="required"></textarea>
              </div>
              <div class="text-center"><button type="submit">Kirim</button></div>
            </form>
            <div id="prosesLaporan">

            </div>
          </div>
        @else
        @endif
        </div>
      </div>
    </section>

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
          items: 1
        },
        1000: {
          items: 1
        }
      }
    })
  });

  getTanggapan()
    function getTanggapan(){
        $.ajax({
            type : 'GET',
            url : '{{ route('user.pengaduan.tanggapan', $p->id_pengaduan) }}',
            dataType : 'json'
        })
        .done(function(res){
            let tanggapan = res.tanggapan;
            let pengaduan = res.pengaduan;

            $("#tanggapan").html('');
            $("#prosesLaporan").html('');

            $.each(tanggapan, function(index, value){
                let content;
                if(!$.trim(value.petugas_id)){
                    content = `<h6>
                                ${pengaduan.nama} (masyarakat), 
                                <span class="font-weight-light">${value.tanggapan}</span>
                            </h6>`;
                } else {
                    content = `<h6>
                                Petugas, 
                                <span class="font-weight-light">${value.tanggapan}</span>
                            </h6>`;
                }

                $("#tanggapan").append(content);
            })

            let status;
            if(pengaduan.status == '0'){
                status =  `<span class="badge badge-danger">Menunggu Konfirmasi</span>`;
            } else if (pengaduan.status == 'proses'){
                status = `<span class="badge badge-warning">Sedang Di Proses</span>`;
            } else {
                status = `<span class="badge badge-success">Selesai</span>`;
            } 

            $("#status").html(status);

            if(pengaduan.status == 'selesai'){
                $("#form-1").addClass('d-none');
            } else {
                $("#form-1").removeClass('d-none');
            }

        })
    }
</script>
@endsection