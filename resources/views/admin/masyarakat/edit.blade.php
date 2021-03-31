@extends('layouts.master')
@section('title')
Masyarakat Admin | Pengaduan Masyarakat
@endsection

@section('content2')
<div class="col-xl-8 order-xl-1">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0">Edit Masyarakat</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="/admin/masyarakat/update/{{$masyarakat->id_masyarakat}}" method="post">
            @csrf
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label class="form-control-label" for="input-nik">Nik</label>
                                <input type="text" id="input-Nik" class="form-control form-control-alternative" name="nik" value="{{$masyarakat->nik}}">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label class="form-control-label" for="input-nama">Nama</label>
                                <input type="text" id="input-nama" class="form-control form-control-alternative" name="nama" value="{{$masyarakat->nama}}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-username">Username</label>
                                <input type="text" id="input-username" class="form-control form-control-alternative" name="username" value="{{$masyarakat->username}}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-password">Password</label>
                                <input type="password" id="input-password" name="password" class="form-control form-control-alternative">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="input-email">Email</label>
                                <input type="email" id="input-email" class="form-control form-control-alternative" name="email" value="{{$masyarakat->email}}">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label class="form-control-label" for="input-telp">Nomor Telepon</label>
                                <input type="text" id="input-telp" class="form-control form-control-alternative" name="telp" value="{{$masyarakat->telp}}">
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary my-4" name="edit">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
