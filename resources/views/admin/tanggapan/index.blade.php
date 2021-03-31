@extends('layouts.master')
@section('title')
Admin Tanggapan | Pengaduan Masyarakat
@endsection

@section('content2')
<!-- <button class="btn btn-icon btn-primary" type="button">
	<span class="btn-inner--icon"><i class="ni ni-atom"></i></span>
</button> -->
<div class="col">
    <!-- table -->
    <div class="card shadow">
        <div class="table-responsive">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                    <h3 class="mb-0">Data Tanggapan</h3>
                    </div>
                    <div class="col text-right">
                    <a href="#!" class="btn btn-sm btn-primary">See all</a>
                    </div>
                </div>
            </div>
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Petugas</th>
                        <th scope="col">Tanggal Tanggapan</th>
                        <th scope="col">Judul Pengaduan</th>
                        <th scope="col">Isi Tanggapan</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tanggapan as $t)
                    <tr>
                        <th scope="row">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <span class="mb-0 text-sm">{{$no++}}</span>
                                </div>
                            </div>
                        </th>
                        <td>{{$t->nama_petugas}}</td>
                        <td>{{$t->tgl_tanggapan}}</td>
                        <td>{{(str_word_count($t->judul_laporan) > 10) ? substr($t->judul_laporan,0,30)."..." : $t->judul_laporan}}</td>
                        <td>{{(str_word_count($t->tanggapan) > 10) ? substr($t->tanggapan,0,30)."..." : $t->tanggapan}}</td>
                        <td class="text-right">
                            <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="#">Sedang di Proses</a>
                                    <a class="dropdown-item" href="#" onclick="return confirm('Apakah adan yakin pengaduan sudah selesai?')">Selesai</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer py-4">
        <nav aria-label="...">
            <ul class="pagination justify-content-end mb-0">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                        <i class="fas fa-angle-left"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">
                        <i class="fas fa-angle-right"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

@endsection
