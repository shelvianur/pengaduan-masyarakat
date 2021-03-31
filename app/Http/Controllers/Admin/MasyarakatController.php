<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Masyarakat;

class MasyarakatController extends Controller
{
    public function index()
    {
        $masyarakat = Masyarakat::all();
        $no = 1;
        return view('admin.masyarakat.index', ['masyarakat' => $masyarakat, 'no' => $no]);
    }

    public function create(Request $request)
    {
        return view('login.registrasi');
    }

    public function store(Request $request)
    {
        // $masyarakat = new Masyarakat;
        // $masyarakat->nik = $request->nik;
        // $masyarakat->nama = $request->nama;
        // $masyarakat->username = $request->username;
        // $masyarakat->password = $request->password;
        // $masyarakat->telp = $request->telp;
        // $masyarakat->email = $request->email;
        // $masyarakat->save();

        Masyarakat::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'telp' => $request->telp,
            'email' => $request->email
        ]);

        return redirect('/');
    }

    public function edit($id)
    {
        $masyarakat = Masyarakat::find($id);
        return view('admin.masyarakat.edit', ['masyarakat' => $masyarakat]);
    }

    public function update(Request $request, $id)
    {
        Masyarakat::find($id)->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt('thisyourpassword'),
            'telp' => $request->telp,
            'email' => $request->email
        ]);
        return redirect('admin/masyarakat');
    }

    public function destroy($id)
    {
        $masyarakat = Masyarakat::find($id);
        $masyarakat->delete();
        return redirect('admin/masyarakat');
    }
}
