<?php

namespace App\Http\Controllers;

use App\Models\FriendRequest;
use App\Models\User;
use App\Models\UserIdentity;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // show user has active and gender not equal
    public function index()
    {
        // function to get user id and select data from user identities
        $currentUserId = auth()->user()->id;
        $currentUserGender = UserIdentity::where('user_id', $currentUserId)->first()->gender;
        $friendRequestsSent = FriendRequest::where('user_id', $currentUserId)->pluck('friend_id')->toArray();
        $friendRequestsReceived = FriendRequest::where('friend_id', $currentUserId)->pluck('user_id')->toArray();

        $activeUsersWithAge = User::join('user_identities', 'users.id', '=', 'user_identities.user_id')
                ->where('users.is_active', true)
                ->where('user_identities.gender', '!=', $currentUserGender)
                ->whereNotIn('users.id', function ($query) use ($currentUserId, $friendRequestsSent) {
                    $query->select('friend_id')
                        ->from('friend_requests')
                        ->where('user_id', '=', $currentUserId)
                        ->whereIn('friend_id', $friendRequestsSent)
                        ->where('accepted', true);
                })
                ->whereNotIn('users.id', function ($query) use ($currentUserId, $friendRequestsReceived) {
                    $query->select('user_id')
                        ->from('friend_requests')
                        ->where('friend_id', '=', $currentUserId)
                        ->whereIn('user_id', $friendRequestsReceived)
                        ->where('accepted', true);
                })
                ->whereNotIn('users.id', function ($query) use ($currentUserId) {
                    $query->select('friend_id')
                        ->from('friend_requests')
                        ->where('user_id', '=', $currentUserId)
                        ->where('accepted', '=', false);
                })
                ->whereNotIn('users.id', function ($query) use ($currentUserId) {
                    $query->select('user_id')
                        ->from('friend_requests')
                        ->where('friend_id', '=', $currentUserId)
                        ->where('accepted', '=', false);
                })
                
                ->where('users.id', '!=', $currentUserId)
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
