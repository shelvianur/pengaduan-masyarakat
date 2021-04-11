@extends('layouts.master')
@section('title')
Pengaduan | Pengaduan Masyarakat
@endsection

@section('content2')
<div class="col">
    <div class="card card-profile shadow">
        <div class="card-body pt-0 pt-md-4">
            <div class="row align-items-center">
                <div class="col">
                    <a href="{{route('admin.pengaduan.cetak', [$p->id_pengaduan])}}" class="btn btn-sm btn-primary" style="float: right;" target="_blank">Export ke PDF</a>
                    <table>
                        <tr>
                            <td><h4>Nama</h4></td>
                            <td><h4 style="padding: 5px"> : </h4></td>
                            <td><h4>{{$p->nama}}</h4></td>
                        </tr>
                        <tr>
                            <td><h4>NIK</h4></td>
                            <td><h4 style="padding: 5px"> : </h4></td>
                            <td><h4>{{$p->nik}}</h4></td>
                        </tr>
                        <tr>
                            <td><h4>Nomor Telepon</h4></td>
                            <td><h4 style="padding: 5px"> : </h4></td>
                            <td><h4>{{$p->telp}}</h4></td>
                        </tr>
                        <tr>
                            <td><h4>Tanggal</h4></td>
                            <td><h4 style="padding: 5px"> : </h4></td>
                            <td><h4>{{$p->tgl_pengaduan->format('l, d F Y - H:i:s')}}</h4></td>
                        </tr>
                        <tr>
                            <td><h4>Status</h4></td>
                            <td><h4 style="padding: 5px"> : </h4></td>
                            <td id="status">
                                
                            </td>
                        </tr>
                    </table>
                    <hr class="my-4" />
                    <div>
                        <h3>Foto</h3>
                        <div>
                            @foreach ($image as $img)
                                <img src="{{asset('/images/' . $img->foto)}}" width="200" height="200" />
                            @endforeach
                        </div>
                    </div>
                    <div class="my-4">
                        <h3>Laporan</h3>
                        <h4>{{$p->judul_laporan}}</h4>
                        <p>{{$p->isi_laporan}}</p>
                    </div>
                    <hr class="my-4" />
                    <div>
                        <h3>Tanggapan</h3>
                        <div id="tanggapan">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-5 order-xl-2 mb-5 mb-xl-0" id="form-1">
    <div class="card card-profile shadow">
        <div class="card-body pt-0 pt-md-4">
            <div class="text-left">
                <h3>
                    Tanggapan Petugas
                </h3>
                <form action="{{route('admin.pengaduan.kirim', [$p->id_pengaduan])}}" method="post" >
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="tanggapan" placeholder="Tulis Tanggapan atau Pertanyaan">
                    </div>
                    <input type="submit" value="Kirim" class="btn btn-sm btn-primary">
                </form>
                <div id="prosesLaporan">

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    getTanggapan()
    function getTanggapan(){
        $.ajax({
            type : 'GET',
            url : '{{ route('admin.pengaduan.tanggapan', $p->id_pengaduan) }}',
            dataType : 'json'
        })
        .done(function(res){
            let tanggapan = res.tanggapan;
            let pengaduan = res.pengaduan;

            $("#tanggapan").html('');
            $("#prosesLaporan").html('');

            $.each(tanggapan, function(index, value){
                let content;
                console.log(value.nama);
                if(!$.trim(value.petugas_id)){
                    content = `<h4>
                                ${pengaduan.nama} (masyarakat), 
                                <span class="font-weight-light">${value.tanggapan}</span>
                            </h4>`;
                } else {
                    content = `<h4>
                                Petugas, 
                                <span class="font-weight-light">${value.tanggapan}</span>
                            </h4>`;
                }

                $("#tanggapan").append(content);
            })

            let content1='';
            if(pengaduan.status == '0'){
                content1 = `<button class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Pesan default : Laporan Anda sedang diverifikasi dan diteruskan kepada instansi berwenang" onclick="prosesPengaduan()">Sedang di Proses</button>
                <button class="btn btn-sm btn-danger" onclick="unvalidPengaduan()" data-toggle="tooltip" data-placement="bottom" title="Pesan default : Mohon maaf laporan Anda tidak valid">Tidak Valid</button>`;
            } else if(pengaduan.status == 'proses'){
                content1 = `<button class="btn btn-sm btn-success" onclick="selesaiPengaduan()">Selesai</button>`;
            }

            $("#prosesLaporan").append(content1);

            let status;
            if(pengaduan.status == '0'){
                status =  `<span class="badge badge-pill badge-danger">Menunggu Konfirmasi</span>`;
            } else if (pengaduan.status == 'proses'){
                status = `<span class="badge badge-pill badge-warning">Sedang Di Proses</span>`;
            } else {
                status = `<span class="badge badge-pill badge-success">Selesai</span>`;
            } 

            $("#status").html(status);

            if(pengaduan.status == 'selesai'){
                $("#form-1").addClass('d-none');
            } else {
                $("#form-1").removeClass('d-none');
            }

        })
    }

    function prosesPengaduan(){
        $.ajax({
            type: "GET",
            url: '{{route('admin.pengaduan.proses', $p->id_pengaduan)}}',
            dataType : 'json'
        })
        .done(function(res){
            getTanggapan();
        });
    }

    function unvalidPengaduan(){

        if(confirm('Apakah adan yakin pengaduan tidak valid?')){
            $.ajax({
                type: "GET",
                url: '{{route('admin.pengaduan.tidakvalid', $p->id_pengaduan)}}',
                dataType : 'json'
            })
            .done(function(res){
                getTanggapan();
            });
        }
    }

    function selesaiPengaduan(){

        if(confirm('Apakah adan yakin pengaduan sudah selesai?')){
            $.ajax({
                type: "GET",
                url: '{{route('admin.pengaduan.selesai', $p->id_pengaduan)}}',
                dataType : 'json'
            })
            .done(function(res){
                getTanggapan();
            });
        }
    }
</script>

@endsection
