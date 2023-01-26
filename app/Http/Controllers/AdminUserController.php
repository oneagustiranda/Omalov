<?php

namespace App\Http\Controllers;

use App\Models\MaritalStatus;
use App\Models\UserIdentity;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    // Show index view from user registered
    public function index()
    {
        // show user without role admin
        $users = User::where('is_admin', false)->get();
        $userIdentities = UserIdentity::all();
        return view('admin.users.index', compact('users', 'userIdentities'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $userIdentities = UserIdentity::select('gender', 'year_birth', 'city', 'province')
                                    ->where('user_id', $id)->get();
        $maritalStatuses = MaritalStatus::join('user_identities', 'user_identities.marital_status_id', '=', 'marital_statuses.id')
                                    ->where('user_identities.user_id', $id)
                                    ->first();
        return view('admin.users.edit', compact('user', 'userIdentities', 'maritalStatuses'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $isActive = $request->input('is_active');

        $user = User::find($id);
        $user->update([
            'is_active' => $isActive ? 1 : 0
            // other data from user
        ]);

        // update data for table user_identities
        // $userIdentities = UserIdentity::where('user_id', $id)->first();
        // $userIdentities->update([
        //     'year_birth' => $data['year_birth']
        // ]);

        return redirect('/admin/users')->with('success', 'User updated successfully');
    }


}
