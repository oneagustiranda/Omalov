<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserIdentity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // show user has active and gender not equal
    public function index()
    {
        // function to get user id and select data from user identities
        $currentUserId = auth()->id();
        $currentUserGender = UserIdentity::where('user_id', $currentUserId)->first()->gender;

        $activeUsersWithAge = User::join('user_identities', 'users.id', '=', 'user_identities.user_id')
        ->where('users.is_active', true)
        ->where('user_identities.gender', '!=', $currentUserGender)
        ->whereNotIn('users.id', function($query) use ($currentUserId) {
            $query->select('friend_id')
                ->from('friend_requests')
                ->where('user_id', $currentUserId)
                ->where('accepted', true);
        })
        ->whereNotIn('users.id', function($query) use ($currentUserId) {
            $query->select('friend_id')
                ->from('friend_requests')
                ->where('user_id', $currentUserId)
                ->where('accepted', false);
        })
        ->whereNotIn('users.id', function($query) use ($currentUserId) {
            $query->select('user_id')
                ->from('friend_requests')
                ->where('friend_id', $currentUserId)
                ->where('accepted', false);
        })
        ->select(
            'users.id',
            'users.name',
            'user_identities.city',
            'user_identities.gender',
            DB::raw("YEAR(CURRENT_DATE) - user_identities.year_birth as age")
        )
        ->get();

        // function add friends
        $friendController = new \App\Http\Controllers\FriendController();

        return view('dashboard.index', compact('activeUsersWithAge', 'friendController'));
    }
}
