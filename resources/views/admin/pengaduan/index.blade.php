@extends('layouts.master')
@section('title')
Pengaduan | Pengaduan Masyarakat
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
                    <h3 class="mb-0">Data Pengaduan</h3>
                    </div>
                    <!-- <div class="col text-right">
                    <a href="#!" class="btn btn-sm btn-primary">See all</a>
                    </div> -->
                </div>
            </div>
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul Pengaduan</th>
                        <th scope="col">Tanggal Pengaduan</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengaduan as $p)
                    <tr style="cursor: pointer" class="clickable-row" data-href="{{route('admin.pengaduan.user', [$p->id_pengaduan])}}">
                        <th scope="row">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <span class="mb-0 text-sm">{{$no++}}</span>
                                </div>
                            </div>
                        </th>   
                        <td>{{$p->judul_laporan}}</td>
                        <td>{{$p->tgl_pengaduan}}</td>
                        <td>
                            @if ($p->status == '0')
                                <span class="badge badge-pill badge-danger">Menunggu Konfirmasi</span>
                            @elseif ($p->status == 'proses')
                                <span class="badge badge-pill badge-warning">Sedang Di Proses</span>
                            @else
                                <span class="badge badge-pill badge-success">Selesai</span>
                            @endif
                        </td>
                        <td class="text-right">
                            @if ($p->status == '0')
                            <a href="{{route('admin.pengaduan.proses', [$p->id_pengaduan])}}" class="btn btn-sm btn-warning">Sedang di Proses</a>
                            <a class="btn btn-sm btn-danger" href="{{route('admin.pengaduan.tidakvalid', [$p->id_pengaduan])}}" onclick="return confirm('Apakah adan yakin pengaduan sudah selesai?')">Tidak Valid</a>
                            @elseif ($p->status == 'proses')
                            <a class="btn btn-sm btn-success" href="{{route('admin.pengaduan.selesai', [$p->id_pengaduan])}}" onclick="return confirm('Apakah adan yakin pengaduan sudah selesai?')">Selesai</a>
                            @else
                            @endif

                            <!-- <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="{{route('admin.pengaduan.proses', [$p->id_pengaduan])}}">Sedang di Proses</a>
                                    <a class="dropdown-item" href="{{route('admin.pengaduan.selesai', [$p->id_pengaduan])}}" onclick="return confirm('Apakah adan yakin pengaduan sudah selesai?')">Selesai</a>
                                </div>
                            </div> -->
                        </td>
                    </a>
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

<script>
    $(document).ready(function($) {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    });
</script>

@endsection
