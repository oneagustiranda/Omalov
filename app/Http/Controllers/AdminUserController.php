<?php

namespace App\Http\Controllers;

use App\Models\UserIdentity;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    // Show index view from user registered
    public function index()
    {
        return view('admin.users.index', [
            'title' => 'Verifikasi Akun',
            'user_identities' => UserIdentity::all()
        ]);
    }
}
