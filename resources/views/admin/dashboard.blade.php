@extends('layouts.master')
@section('title')
    Dashboard | Pengaduan Masyarakat
@endsection
@section('content1')

<div class="header-body">
    <!-- Card stats -->
    <div class="row">
        <div class="col-xl-3 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Pengaduan</h5>
                            <span class="h2 font-weight-bold mb-0">{{$jml_pg}}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                            <i class="ni ni-notification-70"></i>
                            </div>
                        </div>
                    </div>
                    <!-- <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                    </p> -->
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Belum di Proses</h5>
                            <span class="h2 font-weight-bold mb-0">{{$jml_b}}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                            <i class="fas fa-exclamation-triangle"></i>
                            </div>
                        </div>
                    </div>
                    <!-- <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                    <span class="text-nowrap">Since last week</span>
                    </p> -->
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Sedang di Proses</h5>
                            <span class="h2 font-weight-bold mb-0">{{$jml_p}}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                            <i class="fas fa-exchange-alt"></i>
                            </div>
                        </div>
                    </div>
                    <!-- <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                    <span class="text-nowrap">Since yesterday</span>
                    </p> -->
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Pengaduan Selesai</h5>
                            <span class="h2 font-weight-bold mb-0">{{$jml_s}}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                            <i class="far fa-check-circle"></i>
                            </div>
                        </div>
                    </div>
                    <!-- <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                    <span class="text-nowrap">Since last month</span>
                    </p> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content2')
<div class="col mb-5 mb-xl-0">
    <div class="card">
        <div class="row align-items-center">
            <div class="col">
                <div class="card shadow padd">
                    <div class="table-responsive">
                        <div class="">
                            <div class="row align-items-center">
                                <div class="col">
                                <h3>Data Pengaduan Hari Ini</h3><br>
                                </div>
                            </div>
                        </div>
                        <table class="table align-items-center table-hover table-flush data-table" id="tablePengaduan">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">Judul Pengaduan</th>
                                    <th scope="col">Tanggal Pengaduan</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    $("#tablePengaduan").on("click", ".clickable-row", function(){
        console.log($(this).data("href"));
        window.location = $(this).data("href");
    });

    $(function () {
    
        var table = $('.data-table').DataTable({
            processing: false,
            serverSide: true,
            ajax: "{{ route('admin.index') }}",
            language: {
                paginate: {
                    next: '<i class="fas fa-chevron-right"></i>',
                    previous: '<i class="fas fa-chevron-left"></i>'  
                }
            },
            createdRow: function(row, data, dataIndex) {
                $(row).addClass('clickable-row');
                $(row).addClass('pointer');
                $(row).attr('data-href', `/admin/pengaduan/user/${data.id_pengaduan}`);
            },
            columns: [
                {data: null, defaultValue:'', name: 'index'},
                {data: 'nik', name: 'nik'},
                {data: 'judul_laporan', name: 'judul_laporan'},
                {data: 'tgl_pengaduan', name: 'tgl_pengaduan'},
                {data: 'status', name: 'status'},
                // {data: 'action', name: 'aksi', orderable: false, searchable: false},
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

        let petugas = <?= Auth::guard('petugas')->check() ?>;
        let intervalId = window.setInterval(function () {
            if (petugas == 1) {
                table.rows().invalidate().draw();
            }
        }, 2000);
    });
    
</script>

@endsection
