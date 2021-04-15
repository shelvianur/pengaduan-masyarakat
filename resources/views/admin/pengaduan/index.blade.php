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
    <div class="card shadow padd">
        <div class="table-responsive">
            <div class="">
                <div class="row align-items-center">
                    <div class="col">
                    <!-- <h3>Data Pengaduan</h3> -->
                    </div>
                    <!-- <div class="col text-right">
                    <a href="#!" class="btn btn-sm btn-primary">See all</a>
                    </div> -->
                </div>
            </div>
            <!-- <div class="form-group">
                <label for="filter">Filter</label>
                <select class="form-control" id="filter">
                    <option value="">All</option>
                    <option value="0">Belum di Proses</option>
                    <option value="proses">Sedang di Proses</option>
                    <option value="selesai">Selesai</option>
                </select>
            </div> -->
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

<script>

    $("#tablePengaduan").on("click", ".clickable-row", function(){
        console.log($(this).data("href"));
        window.location = $(this).data("href");
    });

    $(function () {
    
        var table = $('.data-table').DataTable({
            processing: false,
            serverSide: true,
            ajax: "{{ route('admin.pengaduan.index') }}",
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
