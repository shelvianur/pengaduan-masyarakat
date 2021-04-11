<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use PDF;

class LaporanController extends Controller
{
    public function tanggal()
    {
        return view('admin.laporan.tanggal');
    }

    public function hari(Request $request)
    {
        $no = 1;

        $tgl = date('d-m-Y', strtotime($request->hari));

        $pengaduan = Pengaduan::join('masyarakat_shelvia', 'masyarakat_shelvia.id_masyarakat', 'pengaduan_shelvia.masyarakat_id')
                                ->select('pengaduan_shelvia.*', 'masyarakat_shelvia.*')
                                ->whereDate('pengaduan_shelvia.tgl_pengaduan', $request->hari)
                                ->orderBy('pengaduan_shelvia.tgl_pengaduan', 'DESC')
                                ->get();

        $pdf = PDF::loadview('admin.laporan.report-harian', compact('no','pengaduan', 'tgl'))->setPaper('a4');
        return $pdf->stream();
    }

    public function minggu(Request $request)
    {
        $no = 1;
        
        $tgl1 = date('d-m-Y', strtotime($request->from_date));
        $tgl2 = date('d-m-Y', strtotime($request->to_date));

        $pengaduan = Pengaduan::join('masyarakat_shelvia', 'masyarakat_shelvia.id_masyarakat', 'pengaduan_shelvia.masyarakat_id')
                                ->select('pengaduan_shelvia.*', 'masyarakat_shelvia.*')
                                ->whereBetween('pengaduan_shelvia.tgl_pengaduan', [$request->from_date, $request->to_date])
                                ->orderBy('pengaduan_shelvia.tgl_pengaduan', 'DESC')
                                ->get();
        $pdf = PDF::loadview('admin.laporan.report-mingguan', compact('no','pengaduan', 'tgl1', 'tgl2'))->setPaper('a4');
        return $pdf->stream();
    }

    public function bulan(Request $request)
    {
        $no = 1;
        $m = date('m', strtotime($request->bulan));
        $y = date('Y', strtotime($request->bulan));
        $tgl = date('m-Y', strtotime($request->bulan));

        $pengaduan = Pengaduan::join('masyarakat_shelvia', 'masyarakat_shelvia.id_masyarakat', 'pengaduan_shelvia.masyarakat_id')
                                ->select('pengaduan_shelvia.*', 'masyarakat_shelvia.*')
                                ->whereMonth('pengaduan_shelvia.tgl_pengaduan', $m)
                                ->whereYear('pengaduan_shelvia.tgl_pengaduan', $y)
                                ->orderBy('pengaduan_shelvia.tgl_pengaduan', 'DESC')
                                ->get();
        $pdf = PDF::loadview('admin.laporan.report-bulanan', compact('no','pengaduan', 'tgl'))->setPaper('a4');
        return $pdf->stream();
    }

    public function status()
    {
        return view('admin.laporan.status');
    }

    public function statuslaporan(Request $request)
    {
        $no = 1;
        $pengaduan = Pengaduan::join('masyarakat_shelvia', 'masyarakat_shelvia.id_masyarakat', 'pengaduan_shelvia.masyarakat_id')
                                ->select('pengaduan_shelvia.*', 'masyarakat_shelvia.*')
                                ->where('pengaduan_shelvia.status', $request->status)
                                ->orderBy('pengaduan_shelvia.tgl_pengaduan', 'DESC')
                                ->get();
        $pdf = PDF::loadview('admin.laporan.report-status', compact('no','pengaduan'))->setPaper('a4');
        return $pdf->stream();
    }
}
