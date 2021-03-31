<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
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
        $pengaduan = Pengaduan::all();
        $no = 1;
        return view('masyarakat.index', ['pengaduan' => $pengaduan, 'no' => $no]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function create()
    { 
        return view('masyarakat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pengaduan = Pengaduan::create([
                        'masyarakat_id' => Auth::user()->id_masyarakat,
                        'tgl_pengaduan' => $request->tgl,
                        'judul_laporan' => $request->judul,
                        'isi_laporan' => $request->isi_laporan,
                        'status' => '0'
                    ]);

        $this->validate($request, [
            'imagename' => 'required',
            'imagename.*' => 'mimes:jpg,png,jpeg,gif'
        ]);

        if($request->hasfile('imagename'))
        {
            foreach($request->file('imagename') as $file)
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

        return redirect('user');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
