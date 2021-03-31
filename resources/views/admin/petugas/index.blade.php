@extends('layouts.master')
@section('title')
Petugas Admin | Pengaduan petugas
@endsection

@section('content2')
<!-- <button class="btn btn-icon btn-primary" type="button">
	<span class="btn-inner--icon"><i class="ni ni-atom"></i></span>
</button> -->


<div class="col">
    <div class="card shadow">
        <div class="table-responsive">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col"><h3 class="mb-0">Data Masyarakat</h3></div>
                    <!-- modal -->
                    <div class="col text-right"><a href="#!" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-form">Tambah</a></div>
                </div>
                <!-- modal -->
                <div class="col-md-4">
                    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                        <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <div class="card bg-secondary border-0 mb-0">
                                        <div class="card-body px-lg-5 py-lg-5">
                                            <div class="text-center text-muted mb-4">
                                                <strong>Tambah Data petugas</strong>
                                            </div>
                                            <form method="post" action="{{route('admin.petugas.create')}}">
                                                @csrf
                                                <div class="form-group mb-3">
                                                    <div class="input-group input-group-merge input-group-alternative">
                                                        <input class="form-control" name="nama_petugas" placeholder="Masukkan Nama" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <div class="input-group input-group-merge input-group-alternative">
                                                        <input class="form-control" name="telp" placeholder="Masukkan Nomor Telepon" type="number">
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <div class="input-group input-group-merge input-group-alternative">
                                                        <input class="form-control" name="username" placeholder="Masukkan Nama Pengguna" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <div class="input-group input-group-merge input-group-alternative">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                                        </div>
                                                        <input class="form-control" name="email" placeholder="Masukkan Email" type="email">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group input-group-merge input-group-alternative">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                                        </div>
                                                        <input class="form-control" name="password" placeholder="Masukkan Password" type="password">
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-primary my-4" name="simpan">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- table -->
        
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Petugas</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telepon</th>
                        <th scope="col">Level</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($petugas as $p)
                    <tr>
                        <th scope="row">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <span class="mb-0 text-sm">{{$no++}}</span>
                                </div>
                            </div>
                        </th>
                        <td>{{$p->nama_petugas}}</td>
                        <td>{{$p->username}}</td>
                        <td>{{$p->email}}</td>
                        <td>{{$p->telp}}</td>
                        <td>{{$p->level}}</td>
                        <td class="text-right">
                            <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="/admin/petugas/edit/{{$p->id_petugas}}">Edit</a>
                                    <a class="dropdown-item" href="/admin/petugas/delete/{{$p->id_petugas}}" onclick="return confirm('Apakah adan yakin akan menghapus {{$p->username}} dari data petugas ?')">Hapus</a>
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
