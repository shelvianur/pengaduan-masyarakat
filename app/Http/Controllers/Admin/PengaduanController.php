<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\Foto;
use Auth;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengaduan = Pengaduan::join('masyarakat_shelvia', 'masyarakat_shelvia.id_masyarakat', 'pengaduan_shelvia.masyarakat_id')
                                ->select('pengaduan_shelvia.*', 'masyarakat_shelvia.nama')
                                ->get();
        $no = 1;
        return view('admin.pengaduan.index', ['pengaduan' => $pengaduan, 'no' => $no]);
    }

    public function proses($id)
    {
        date_default_timezone_set("Asia/Jakarta");
        $tgl = date("Y-m-d h:i:s");

        Pengaduan::find($id)->update([
            'status' => 'proses'
        ]);
       
        Tanggapan::create([
            'pengaduan_id' => $id,
            'petugas_id' => Auth::user()->id_petugas,
            'tgl_tanggapan' => $tgl,
            'tanggapan' => 'Laporan Anda sedang diverifikasi dan diteruskan kepada instansi berwenang'
        ]);

        return redirect('admin/pengaduan');
    }

    public function selesai($id)
    {
        Pengaduan::find($id)->update([
            'status' => 'selesai'
        ]);
        return redirect('admin/pengaduan');
    }

    public function tidakvalid($id)
    {
        Pengaduan::find($id)->update([
            'status' => 'selesai'
        ]);

        Tanggapan::create([
            'pengaduan_id' => $id,
            'petugas_id' => Auth::user()->id_petugas,
            'tgl_tanggapan' => $tgl,
            'tanggapan' => 'Mohon maaf laporan Anda tidak valid'
        ]);

        return redirect('admin/pengaduan');
    }

    public function user($id)
    {
        $pengaduan = Pengaduan::find($id);
        $image = Foto::where('pengaduan_id', $id)->get();
        return view('admin.pengaduan.pengaduan', ['p' => $pengaduan, 'image' => $image]);
    }
}
