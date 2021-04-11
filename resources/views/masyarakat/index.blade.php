@extends('layouts.master')
@section('title')
Pengaduan | Pengaduan Masyarakat
@endsection

@section('content2')
<div class="col">
    <div class="card shadow">
        <div class="table-responsive">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                    <h3 class="mb-0">Pengaduan Masyarakat</h3>
                    </div>
                    <div class="col text-right">
                    <a href="{{route('user.pengaduan.create')}}" class="btn btn-sm btn-primary">Tambah</a>
                    </div>
                </div>
            </div>

            <!-- table -->
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nama Masyarakat</th>
                        <th scope="col">Tanggal Pengaduan</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengaduan as $p)
                    <tr>
                        <th scope="row">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <span class="mb-0 text-sm">{{$no++}}</span>
                                </div>
                            </div>
                        </th>
                        <td>{{$p->foto}}</td>
                        <td>{{$p->masyarakat_id}}</td>
                        <td>{{$p->tgl_pengaduan}}</td>
                        <td>{{$p->status}}</td>
                        <td class="text-right">
                            @if ($p->status == '0')
                            <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="{{route('user.pengaduan.edit', [$p->id_pengaduan])}}">Edit</a>
                                    <a class="dropdown-item" href="{{route('user.pengaduan.delete', [$p->id_pengaduan])}}" onclick="return confirm('Apakah adan yakin akan menghapus dari data petugas ?')">Hapus</a>
                                </div>
                            </div>
                            @else
                            @endif
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
