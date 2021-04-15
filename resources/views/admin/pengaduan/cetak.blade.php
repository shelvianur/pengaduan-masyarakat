<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pengaduan Masyarakat</title>
    <style>
        @font-face {
            font-family: Poppins-Regular;
            src: url('/assets/user-layouts/fonts/Poppins/Poppins-Regular.ttf'); 
        }

        .main{
            width: 100%;
            font-family: "Poppins-Regular";
            padding: 20px;
        }
        .m-0{
            margin: 0;
        }
        img{
            width:15%;
        }
        th{
            font-size: 15px;
        }
        td{
            font-size: 14px;
        }
        .company-image{
            width:5%;
        }
        .d-flex {
            display: flex;
        }
    </style>

  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
</head>
<body>
  <div class="main">
      <table>
          <tr>
              <td align="center">
                  <h1 style="margin:0;">Layanan Pengaduan Masyarakat Online</h1>
              </td>
          </tr>
          <tr>
              <td align="center"><h3 style="margin:0;">Pemerintah Kota Cimahi</h3></td>
          </tr>
          <tr>
              <td align="center">
                  <p style="margin:0;">Jl. Rd. Demang Hardjakusumah Blok Jati Cihanjuang, Cibabat, Kec. Cimahi Utara, Kota Cimahi, Jawa Barat 40513 - Indonesia Telp. (022) 6654274</p>
              </td>
          </tr>
      </table>

      <hr style="border: 1px solid black;"><br>

      <br>
      <div class="detail">
        <h4>Nama : {{ $pengaduan->nama }}</h4>
        <h4>NIK : {{ $pengaduan->nik }}</h4>      
        <h4>No. Telepon : {{ $pengaduan->telp }}</h4>
        @if ($pengaduan->status == '0')
        <h4>Status : Menunggu Konfirmasi</h4> 
        @elseif ($pengaduan->status == 'proses')
        <h4>Status : Sedang di Proses</h4> 
        @else 
        <h4>Status : Selesai</h4> 
        @endif
      </div>
      <br>
      <div class="judul_isi">
        <p>Judul dan Isi Laporan :</p>
        <h3 align="center">{{ $pengaduan->judul_laporan }}</h3>
        <h5 align="center">{{ $pengaduan->isi_laporan }}</h5>
      </div>
      <div class="bukti">
        <p>Bukti Laporan :</p><br>
        @foreach ($image as $img)
            <img src="{{public_path('/images/' . $img->foto)}}"/>
        @endforeach
      </div>
      <br>

      <div class="ttd" style="margin-left: 80%;">
          <p>Admin</p>
          <img src="{{ public_path('adminn/assets/img/dll/signature.png') }}" alt="" style="width: 50%;">
          <p>{{Auth::guard('petugas')->user()->nama_petugas}}</p>
      </div>
  </div>
</body>
</html>