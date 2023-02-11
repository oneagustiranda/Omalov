<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserIdentity;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // show user has active and gender not equal
    public function index()
    {
        // function to get user id and select data from user identities
        $currentUserId = auth()->id();
        $currentUserGender = UserIdentity::where('user_id', $currentUserId)->first()->gender;

        $activeUsers = User::join('user_identities', 'users.id', '=', 'user_identities.user_id')
            ->where('users.is_active', true)
            ->where('user_identities.gender', '!=', $currentUserGender)
            ->select('users.name', 'user_identities.city', 'user_identities.gender', 'user_identities.year_birth')
            ->get();

        // function to calculate age and include to show in user data
        $currentYear = date('Y');

        $activeUsersWithAge = [];
        foreach ($activeUsers as $activeUser) {
            $age = $currentYear - $activeUser->year_birth;
            $activeUsersWithAge[] = [
                'name' => $activeUser->name,
                'city' => $activeUser->city,
                'gender' => $activeUser->gender,
                'age' => $age,
            ];
        }

        return view('dashboard.index', compact('activeUsersWithAge'));
    }
}
