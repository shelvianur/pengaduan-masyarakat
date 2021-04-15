<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Auth;


class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::guard('petugas')->user()->level == 'admin') {
            $jml_pengaduan = Pengaduan::count();
            $jml_belum = Pengaduan::where('status', '0')->count();
            $jml_proses = Pengaduan::where('status', 'proses')->count();
            $jml_selesai = Pengaduan::where('status', 'selesai')->count();
    
            return view('admin.dashboard', ['jml_pg' => $jml_pengaduan, 'jml_b' => $jml_belum, 'jml_p' => $jml_proses, 'jml_s' => $jml_selesai]);

        } elseif (Auth::guard('petugas')->user()->level == 'petugas') {

            $tg = 

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
