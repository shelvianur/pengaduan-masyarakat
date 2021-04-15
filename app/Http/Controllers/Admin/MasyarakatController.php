<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Masyarakat;
use DataTables;

class MasyarakatController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Masyarakat::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row) {
                        $btn = '<div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="/admin/masyarakat/edit/'.$row->id_masyarakat.'">Edit</a>
                                    <a class="dropdown-item" href="/admin/masyarakat/delete/'.$row->id_masyarakat.'" id="btnDelete">Hapus</a>
                                </div>
                            </div>';
                        
                        return $btn;

                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('admin.masyarakat.index');
    }

    public function createadmin(Request $request)
    {
        Masyarakat::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'telp' => $request->telp,
            'email' => $request->email
        ]);

        return redirect('/admin/masyarakat');
    }

    public function create(Request $request)
    {
        return view('login.registrasi');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required|min:16|max:16',
            'nama' => 'required|min:5|max:50',
            'username' => 'required|unique:masyarakat_shelvia,username',
            'password' => 'required|min:5|max:16|confirmed',
            'telp' => 'required|min:11|max:13',
            'email' => 'required|unique:masyarakat_shelvia,email',
        ]);

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
