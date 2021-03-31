<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Petugas;
use App\Models\Masyarakat;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {
        return view('login.login');
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('petugas')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/admin');
        } else if (Auth::guard('masyarakat')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/user');
        }
    }

    public function logout()
    {
        if (Auth::guard('petugas')->check()) {
            Auth::guard('petugas')->logout();
        } elseif (Auth::guard('masyarakat')->check()) {
            Auth::guard('masyarakat')->logout();
        }

        return redirect('/');
    }
}
