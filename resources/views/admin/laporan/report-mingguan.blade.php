<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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

        <h3 align="center" class="m-0">Rekapitulasi Pengaduan Masyarakat</h3>
        <br>
        <div class="detail">
            <p>Periode : {{$tgl1 . ' s/d ' . $tgl2}}</p>
        </div>
        <br>

        <table border="1" cellspacing="0" cellpadding="5px">
            <tr>
                <th align="center">No</th>
                <th align="center">Nama Pelapor</th>
                <th align="center">Tanggal Pengaduan</th>
                <th align="center">Judul Laporan</th>
                <th align="center">Isi Laporan</th>
                <th align="center">Status</th>
            </tr>
            @foreach($pengaduan as $value)
            <tr>
                <td align="center">{{$no++}}</td>
                <td>{{$value->nama}}</td>
                <td>{{$value->tgl_pengaduan->format('l, d F Y - H:i:s')}}</td>
                <td>{{$value->judul_laporan}}</td>
                <td>{{$value->isi_laporan}}</td>
                @if ($value->status == '0')
                <td>Menunggu Konfirmasi</td>
                @elseif ($value->status == 'proses')
                <td>Sedang di Proses</td>
                @elseif ($value->status == 'selesai')
                <td>Selesai</td>
                @endif
            </tr>
            @endforeach
        </table>
        <br>

        <div class="ttd" style="margin-left: 80%;">
            <p>Admin</p>
            <img src="{{ public_path('adminn/assets/img/dll/signature.png') }}" alt="" style="width: 50%;">
            <p>{{Auth::guard('petugas')->user()->nama_petugas}}</p>
        </div>
    </div>
</body>
</html>