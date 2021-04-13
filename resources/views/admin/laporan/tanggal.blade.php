@extends('layouts.master')
@section('title')
Laporan Admin | Pengaduan Masyarakat
@endsection

@section('content2')
<div class="col">
    <div class="card shadow">
        <div class="card-header bg-transparent">
            <h3 class="mb-0">Cetak Laporan</h3>
        </div>
        <div class="card-body">
            <div class="nav-wrapper">
                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="fas fa-calendar-day mr-2"></i>Per Tanggal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="fas fa-calendar-week mr-2"></i>Per Minggu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="fas fa-calendar-alt mr-2"></i>Per Bulan</a>
                    </li>
                </ul>
            </div>
            <div class="card shadow">
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                            <form action="{{route('admin.laporan.hari')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="form-control-label" for="hari">Tanggal :</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" aria-describedby="basic-addon2" name="hari" id="hari" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2"></span>
                                        </div>
                                    </div>
                                    <input type="submit" value="Cetak PDF" formtarget="_blank" class="btn btn-sm btn-primary">
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                            <form action="{{route('admin.laporan.minggu')}}" method="post">
                                @csrf
                                <label for="complex-en-url">Periode Laporan :</label>
                                <div class="input-daterange d-flex p-0" id="datepicker">
                                    <div class="input-group input-group mb-3">
                                        <input type="text" name="from_date" id="from_date" readonly class="form-control" placeholder="Masukkan tanggal Awal" required />
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing"><b>s/d</b></span>
                                        </div>
                                        <input type="text" name="to_date" id="to_date" readonly class="form-control" placeholder="Masukkan tanggal Akhir" required />
                                    </div>
                                </div>
                                <input type="submit" value="Cetak PDF" formtarget="_blank" class="btn btn-sm btn-primary">
                            </form>
                        </div>
                        <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                            <form action="{{route('admin.laporan.bulan')}}" method="post">
                                @csrf
                                <label class="form-control-label" for="bulan">Bulan :</label>
                                <input type="month" name="bulan" id="bulan" class="form-control" >
                                <input type="submit" value="Cetak PDF" formtarget="_blank" class="btn btn-sm btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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