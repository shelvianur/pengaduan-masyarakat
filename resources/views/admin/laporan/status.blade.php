@extends('layouts.master')
@section('title')
Laporan Admin | Pengaduan Masyarakat
@endsection

@section('content2')
<div class="col">
    <div class="card shadow">
        <div class="card-header bg-transparent">
            <h3 class="mb-0">Cetak Laporan Per Status</h3>
        </div>
        <div class="card-body">
            <form action="{{route('admin.laporan.status_laporan')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Pilih Status Konfirmasi</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="status">
                        <option value="0">Menunggu Konfirmasi</option>
                        <option value="proses">Sedang di Proses</option>
                        <option value="selesai">Laporan Selesai</option>
                    </select>
                </div>
                <input type="submit" value="Cetak PDF" formtarget="_blank" class="btn btn-sm btn-primary">
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
 $(function(){
    $('.input-daterange').datepicker({
        todayBtn: 'linked',
        todayHighlight: true,
        format: 'yyyy-mm-dd',
        autoclose: true,
        orientation: 'bottom'
    });
 });
</script>

@endsection