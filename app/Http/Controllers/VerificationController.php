<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function index()
    {
        return view('verification.index', [
            'title' => 'Verifikasi Akun'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nik-ktp' => 'required|min:16|unique:users',
            'date-birth' => 'required',
            'gender' => 'required'
        ]);  

        User::create($validatedData);

        return redirect('/login')->with('success', 'Pendaftaran berhasil, silahkan masuk!');
    }
}
