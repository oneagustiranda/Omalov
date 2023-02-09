<?php

namespace App\Http\Controllers;

use App\Models\MaritalStatus;
use App\Models\UserIdentity;
use App\Models\User;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    // Show index view from user registered
    public function index()
    {
        return view('admin.users.index');
    }

    public function list()
    {
        // show user without role admin
        $users = User::select('id', 'name', 'is_active')
            ->where('is_admin', false)
            ->where(function ($query) {
                $query->whereDoesntHave('user_identities')
                    ->orWhereHas('user_identities', function ($query) {
                        $query->where('marital_status_id', '!=', 2);
                    });
            })
            ->orderBy('is_active', 'desc')
            ->orderByRaw('(select count(*) from user_identities where user_identities.user_id = users.id) desc')
            ->get();
        $userIdentities = UserIdentity::select('user_id', 'year_birth')->get();

        // query to show in datatable
        $dataTable = Datatables::of($users)
            ->addIndexColumn()
            ->addColumn('year_birth', function($user) use($userIdentities) {
                $userIdentity = $userIdentities->where('user_id', $user->id)->first();
                return $userIdentity ? $userIdentity->year_birth : '-';
            })
            ->editColumn('is_active', function($user) {
                if($user->is_active) {
                    return '<span class="badge badge-pill bg-success">AKTIF</span>';
                } else {
                    return '<span class="badge badge-pill bg-warning">BELUM AKTIF</span>';
                }
            })
            ->addColumn('action', function($user) use($userIdentities) {
                if($userIdentities->where('user_id', $user->id)->first()) {
                    return '<a href="/admin/users/'.$user->id.'/edit">Data Lengkap &#8599;</a>';
                } else {
                    return 'Belum mengisi data';
                }
            })
            ->rawColumns(['is_active', 'action'])
            ->make(true);

        return $dataTable;
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
        // $data = $request->all();
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

        return redirect('/admin/users')->with('success', 'Data pengguna berhasil diperbarui!');
    }


}
