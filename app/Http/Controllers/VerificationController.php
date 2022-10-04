<?php

namespace App\Http\Controllers;

use App\Models\MaritalStatus;
use App\Models\UserIdentity;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function index()
    {
        return view('verification.index', [
            'title' => 'Verifikasi Akun',
            'marital_statuses' => MaritalStatus::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'year_birth' => 'required',
            'gender' => 'required',
            'province' => 'required',
            'city' => 'required',
            'marital_status_id' => 'required'
        ]);  

        $validatedData['user_id'] = auth()->user()->id;

        UserIdentity::create($validatedData);

        return redirect('/login')->with('success', 'Pendaftaran berhasil, silahkan masuk!');
    }
}
