<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\UserIdentity;
use Illuminate\Http\Request;
use App\Models\MaritalStatus;

class VerificationController extends Controller
{
    public function index()
    {
        // function to check if user has been filled identity data
        if (UserIdentity::where('user_id', auth()->user()->id)->exists())
        {
            return redirect('/verification/status');
        }
        else
        {
            return view('verification.index', [
                'title' => 'Verifikasi Akun',
                'marital_statuses' => MaritalStatus::all()
            ]);
        }        
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

        $validatedData['id'] = (string) Str::uuid();
        $validatedData['user_id'] = auth()->user()->id;

        UserIdentity::create($validatedData);

        return redirect('/verification/status');
    }

    public function status()
    {
        // function to check if user has been filled identity data
        if (UserIdentity::where('user_id', auth()->user()->id)->exists())
        {
            // check user active and redirect 
            // from verification status page to dashboard
            $user = User::where('id', auth()->user()->id)->first();
            if($user->is_active == true){
                return redirect('/dashboard');
            }

            // redirect to verification status page
            return view('verification.status', [
                'title' => 'Verification status'
            ]);            
        }
        else
        {
            return redirect('/verification');
        }
        
    }
}
