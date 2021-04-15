<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Foto;
use App\Models\Tanggapan;
use Auth;
use Session;

class PengaduanController extends Controller
{
    public function pengaduan()
    {
        $pengaduan = Pengaduan::with('foto')
                                ->where('masyarakat_id', Auth::user()->id_masyarakat)
                                ->orderBy('tgl_pengaduan', 'DESC')
                                ->paginate(4);
        
        return view('masyarakat.pengaduan-saya', compact('pengaduan'));
    }
    
    public function pengaduanid($id)
    {
        $pengaduan = Pengaduan::join('masyarakat_shelvia', 'masyarakat_shelvia.id_masyarakat', 'pengaduan_shelvia.masyarakat_id')
                                ->select('pengaduan_shelvia.*', 'masyarakat_shelvia.*')
                                ->find($id);
        $tanggapan = Tanggapan::orderBy('tgl_tanggapan', 'ASC')->where('pengaduan_id', $id)->get();
        $image = Foto::where('pengaduan_id', $id)->get();
        return view('masyarakat.pengaduan-id', ['p' => $pengaduan, 'image' => $image, 'tanggapan' => $tanggapan, 'id'=> $id]);
    }

    public function kirim($id, Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");
        $tgl = date("Y-m-d h:i:s");

        Tanggapan::create([
            'pengaduan_id' => $id,
            'tgl_tanggapan' => $tgl,
            'tanggapan' => $request->tanggapan
        ]);

        return redirect("/user/pengaduan-saya/$id");
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

    public function index()
    {
        $pengaduan = Pengaduan::all();
        $no = 1;
        return view('masyarakat.index', ['pengaduan' => $pengaduan, 'no' => $no]);
    }

    public function create()
    { 
        return view('masyarakat.create');
    }

    public function store(Request $request)
    {   
        $this->validate($request, [
            'images' => 'required',
            'images.*' => 'mimes:jpg,png,jpeg,gif'
        ]);
        $tgl = date('Y-m-d H:i:s', strtotime($request->tgl));
        $pengaduan = Pengaduan::create([
                        'masyarakat_id' => Auth::user()->id_masyarakat,
                        'tgl_pengaduan' => $tgl,
                        'judul_laporan' => $request->judul,
                        'isi_laporan' => $request->isi_laporan,
                        'status' => '0'
                    ]);

        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $file)
            {
                $name = $file->getClientOriginalName();
                $file->move(public_path().'/images/', $name);  
                $data[] = $name; 
                Foto::create([
                    'pengaduan_id' => $pengaduan->id_pengaduan,
                    'foto' => $name
                ]);
            }
        }

        // return redirect('/user/pengaduan');

        if ($pengaduan) {
            return redirect('/user/pengaduan');
        } else {
            Session::flash('gagal', 'Tidak boleh ada input yang kosong');
            return redirect('/user/create');
        }


    }

    public function edit($id)
    {
        $pengaduan = Pengaduan::find($id);
        return view('masyarakat.edit', ['pengaduan' => $pengaduan]);
    }

    public function update(Request $request, $id)
    {
        Pengaduan::find($id)->update([
            'masyarakat_id' => Auth::user()->id_masyarakat,
            'tgl_pengaduan' => $request->tgl,
            'judul_laporan' => $request->judul,
            'isi_laporan' => $request->isi_laporan
        ]);

        return redirect('user');
    }

    public function hapus($id)
    {
        $pengaduan = Pengaduan::find($id);
        $pengaduan->delete();
        return redirect('user/pengaduan');
    }
}
