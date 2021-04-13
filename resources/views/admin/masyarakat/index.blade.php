@extends('layouts.master')
@section('title')
Masyarakat Admin | Pengaduan Masyarakat
@endsection

@section('content2')
<!-- <button class="btn btn-icon btn-primary" type="button">
	<span class="btn-inner--icon"><i class="ni ni-atom"></i></span>
</button> -->


<div class="col">
    <div class="card shadow padd">
        <div class="table-responsive">
            <!-- <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col"><h3 class="mb-0">Data Masyarakat</h3></div>
                    <div class="col text-right"><a href="#!" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-form">Tambah</a></div>
                </div>
                <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-body p-0">
                                <div class="card bg-secondary border-0 mb-0">
                                    <div class="card-body px-lg-5 py-lg-5">
                                        <div class="text-center text-muted mb-4">
                                            <strong>Tambah Data Masyarakat</strong>
                                        </div>
                                        <form method="post" action="{{route('admin.masyarakat.createadmin')}}">
                                            @csrf
                                            <div class="form-group mb-3">
                                                <div class="input-group input-group-merge input-group-alternative">
                                                    <input class="form-control" name="nik" placeholder="Masukkan NIK" type="number" required>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <div class="input-group input-group-merge input-group-alternative">
                                                    <input class="form-control" name="nama" placeholder="Masukkan Nama" type="text" required>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <div class="input-group input-group-merge input-group-alternative">
                                                    <input class="form-control" name="telp" placeholder="Masukkan Nomor Telepon" type="number" required>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <div class="input-group input-group-merge input-group-alternative">
                                                    <input class="form-control" name="username" placeholder="Masukkan Username" type="text" required>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <div class="input-group input-group-merge input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                                    </div>
                                                    <input class="form-control" name="email" placeholder="Masukkan Email" type="email" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group input-group-merge input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                                    </div>
                                                    <input class="form-control" name="password" placeholder="Masukkan Password" type="password" required>
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
            </div> -->
            <!-- table -->
            <table class="table align-items-center table-flush data-table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nik</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telepon</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- <div class="card-footer py-4">
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
    </div> -->
</div>

<script>
    $(function () {
        var table = $('.data-table').DataTable({
            processing: false,
            serverSide: true,
            ajax: "{{ route('admin.masyarakat.index') }}",
            language: {
                paginate: {
                    next: '<i class="fas fa-chevron-right"></i>',
                    previous: '<i class="fas fa-chevron-left"></i>'  
                }
            },
            columns: [
                {data: null, defaultValue:'', name: 'index'},
                {data: 'nik', name: 'nik'},
                {data: 'username', name: 'username'},
                {data: 'email', name: 'email'},
                {data: 'telp', name: 'telp'},
                {data: 'action', name: 'aksi', orderable: false, searchable: false},
            ],
            "columnDefs": [ {
                "searchable": false,
                "orderable": false,
                "targets": 0
            } ],
            "order": []
        });

        table.on( 'order.dt search.dt', function () {
            table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();

        let intervalId = window.setInterval(function () {
                table.rows().invalidate().draw();
            }, 2000);
    });
    
</script>
@endsection
