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
        $users = User::all();
        $userIdentities = UserIdentity::all();
        return view('admin.users.index', compact('users', 'userIdentities'));
    }
}
