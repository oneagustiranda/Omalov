<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        // not applied, page result forbidden
        // $user = User::where('id', auth()->user()->id)->first();
        // if($user->is_active == false){
        //     return redirect('/verification');
        // }

        return view('dashboard.index');
    }
}
