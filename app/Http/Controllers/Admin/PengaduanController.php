<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\Foto;
use Auth;
use DataTables;
use PDF;

class PengaduanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Pengaduan::join('masyarakat_shelvia', 'masyarakat_shelvia.id_masyarakat', 'pengaduan_shelvia.masyarakat_id')
                            ->select('pengaduan_shelvia.*', 'masyarakat_shelvia.nama', 'masyarakat_shelvia.nik')
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

        return view('admin.pengaduan.index');
    }

    public function user($id)
    {
        $pengaduan = Pengaduan::join('masyarakat_shelvia', 'masyarakat_shelvia.id_masyarakat', 'pengaduan_shelvia.masyarakat_id')
                                ->select('pengaduan_shelvia.*', 'masyarakat_shelvia.*')
                                ->find($id);
        $tanggapan = Tanggapan::orderBy('tgl_tanggapan', 'ASC')->where('pengaduan_id', $id)->get();
        $image = Foto::where('pengaduan_id', $id)->get();
        return view('admin.pengaduan.pengaduan', ['p' => $pengaduan, 'image' => $image, 'tanggapan' => $tanggapan, 'id'=> $id]);
    }

    public function kirim($id, Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");
        $tgl = date("Y-m-d h:i:s");

        Tanggapan::create([
            'pengaduan_id' => $id,
            'petugas_id' => Auth::user()->id_petugas,
            'tgl_tanggapan' => $tgl,
            'tanggapan' => $request->tanggapan
        ]);

        return redirect("/admin/pengaduan/user/$id");
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

        return response()->json([
            "status"  => 200,
        ]);
    }

    public function selesai($id)
    {
        Pengaduan::find($id)->update([
            'status' => 'selesai'
        ]);
        
        return response()->json([
            "status"  => 200,
        ]);
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

        return response()->json([
            "status"  => 200,
        ]);
    }

    public function getTanggapan(Request $request, $id)
    {
        $pengaduan = Pengaduan::join('masyarakat_shelvia', 'masyarakat_shelvia.id_masyarakat', 'pengaduan_shelvia.masyarakat_id')
                                ->select('pengaduan_shelvia.*', 'masyarakat_shelvia.*')
                                ->find($id);
        $tanggapan = Tanggapan::orderBy('tgl_tanggapan', 'ASC')->where('pengaduan_id', $id)->get();

        return response()->json([
            "tanggapan"  => $tanggapan,
            "pengaduan" => $pengaduan,
            "status"  => 200,
        ]);
    }

    public function cetak_pdf($id)
    {
        $pengaduan = Pengaduan::join('masyarakat_shelvia', 'masyarakat_shelvia.id_masyarakat', 'pengaduan_shelvia.masyarakat_id')
                                ->select('pengaduan_shelvia.*', 'masyarakat_shelvia.*')
                                ->find($id);
        $image = Foto::where('pengaduan_id', $id)->get();
        $pdf = PDF::loadview('admin.pengaduan.cetak', compact('pengaduan', 'image'))->setPaper('a4');
        return $pdf->stream();
    }
}
