<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use DataTables;
use Auth;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");
        $tgl = date("Y-m-d h:i:s");
        
        if ($request->ajax()) {
            $data = Pengaduan::join('masyarakat_shelvia', 'masyarakat_shelvia.id_masyarakat', 'pengaduan_shelvia.masyarakat_id')
                            ->select('pengaduan_shelvia.*', 'masyarakat_shelvia.nama', 'masyarakat_shelvia.nik')
                            ->where('pengaduan_shelvia.tgl_pengaduan', $tgl)
                            ->orderBy('pengaduan_shelvia.tgl_pengaduan', 'DESC')
                            ->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->editColumn('status', function ($row) {

                        if ($row->status == '0') {
                           $status = '<span class="badge badge-pill badge-danger">Menunggu Konfirmasi</span>';
                        }elseif ($row->status == 'proses') {
                            $status = '<span class="badge badge-pill badge-warning">Sedang Di Proses</span>';
                        }else {
                            $status = '<span class="badge badge-pill badge-success">Selesai</span>';
                        }

                        return $status;
                    })
                    ->editColumn('tgl_pengaduan', function ($row)
                    {
                        return date_format($row->tgl_pengaduan, 'l, d F Y - H:i:s');
                    })
                    ->rawColumns(['status'])
                    ->make(true);
        }

        if (Auth::guard('petugas')->user()->level == 'admin') {
            $jml_pengaduan = Pengaduan::count();
            $jml_belum = Pengaduan::where('status', '0')->count();
            $jml_proses = Pengaduan::where('status', 'proses')->count();
            $jml_selesai = Pengaduan::where('status', 'selesai')->count();
    
            return view('admin.dashboard', ['jml_pg' => $jml_pengaduan, 'jml_b' => $jml_belum, 'jml_p' => $jml_proses, 'jml_s' => $jml_selesai]);

        } elseif (Auth::guard('petugas')->user()->level == 'petugas') {

            $jml_pengaduan = Pengaduan::count();
            $jml_belum = Pengaduan::where('status', '0')->count();

            $jml_proses = count(Pengaduan::join('tanggapan_shelvia', 'pengaduan_shelvia.id_pengaduan', 'tanggapan_shelvia.pengaduan_id')
                        ->select('tanggapan_shelvia.pengaduan_id')
                        ->where('tanggapan_shelvia.petugas_id', Auth::user()->id_petugas)
                        ->where('pengaduan_shelvia.status', 'proses')
                        ->groupBy('tanggapan_shelvia.pengaduan_id')
                        ->get());

            $jml_selesai = count(Pengaduan::join('tanggapan_shelvia', 'pengaduan_shelvia.id_pengaduan', 'tanggapan_shelvia.pengaduan_id')
                        ->select('tanggapan_shelvia.pengaduan_id')
                        ->where('tanggapan_shelvia.petugas_id', Auth::user()->id_petugas)
                        ->where('pengaduan_shelvia.status', 'selesai')
                        ->groupBy('tanggapan_shelvia.pengaduan_id')
                        ->get());
    
            return view('admin.dashboard', ['jml_pg' => $jml_pengaduan, 'jml_b' => $jml_belum, 'jml_p' => $jml_proses, 'jml_s' => $jml_selesai]);
        }
    }
}
