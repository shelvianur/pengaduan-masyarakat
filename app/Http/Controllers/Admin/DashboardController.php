<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Masyarakat;
use App\Models\Petugas;


class DashboardController extends Controller
{
    public function index()
    {
        $jml_pengaduan = Pengaduan::count();
        $jml_belum = Pengaduan::where('status', '0')->count();
        $jml_proses = Pengaduan::where('status', 'proses')->count();
        $jml_selesai = Pengaduan::where('status', 'selesai')->count();

        return view('admin.dashboard', ['jml_pg' => $jml_pengaduan, 'jml_b' => $jml_belum, 'jml_p' => $jml_proses, 'jml_s' => $jml_selesai]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
