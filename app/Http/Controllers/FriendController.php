<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserIdentity;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\FriendRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usersWithStatus = User::join('user_identities', 'users.id', '=', 'user_identities.user_id')
            ->where('users.id', '!=', auth()->id())
            ->with('user_identities', 'receivedFriendRequests')
            ->whereHas('receivedFriendRequests', function ($query) {
                $query->whereIn('accepted', [false, null])->where('user_id', auth()->id());
            })
            ->orWhereHas('sentFriendRequests', function ($query) {
                $query->whereIn('accepted', [false, null])->where('friend_id', auth()->id());
            })
            ->select(
                'users.id',
                'users.name',
                DB::raw("YEAR(CURRENT_DATE) - user_identities.year_birth as age"),
                'user_identities.city'
            )
            ->get(); 

        // function add friends
        $friendController = new \App\Http\Controllers\FriendController();

        return view('dashboard.friends.index', compact('usersWithStatus', 'friendController'));
    }

    public function list()
    {
        $currentUserId = auth()->id();
        $usersWithStatus = User::select('users.*')
        ->join('friend_requests', function ($join) use ($currentUserId) {
            $join->on('users.id', '=', 'friend_requests.friend_id')
                ->where('friend_requests.user_id', '=', $currentUserId)
                ->where('friend_requests.accepted', '=', true)
                ->orWhere(function ($query) use ($currentUserId) {
                    $query->on('users.id', '=', 'friend_requests.user_id')
                        ->where('friend_requests.friend_id', '=', $currentUserId)
                        ->where('friend_requests.accepted', '=', true);
                });
        })
        ->join('user_identities', 'users.id', '=', 'user_identities.user_id')
        ->select(
            'users.id',
            'users.name',
            'user_identities.year_birth',
            'user_identities.city'
        )
        ->distinct()
        ->get();
            
        // function add friends
        $friendController = new \App\Http\Controllers\FriendController();

        return view('dashboard.friends.list', compact('usersWithStatus', 'friendController'));
    }

    public function sendRequest(User $user)
    {
        // Check if a friend request already exists
        $existingRequest = FriendRequest::where('user_id', Auth::id())
            ->where('friend_id', $user->id)
            ->first();

        if ($existingRequest) {
            return back()->with('error', 'Friend request already sent.');
        }

        // Create a new friend request
        FriendRequest::create([
            'id' => (string) Str::uuid(),
            'user_id' => Auth::id(),
            'friend_id' => $user->id
        ]);

        return back()->with('success', 'Friend request sent.');
    }

    public function acceptRequest($friendRequestId)
    {
        // Find the friend request between the authenticated user and the given user
        $friendRequest = FriendRequest::where('user_id', $friendRequestId)
        ->where('friend_id', Auth::id())
        ->firstOrFail();

        // Update the friend request as accepted
        $friendRequest->update([
            'accepted' => true
        ]);

        return back()->with('success', 'Friend request accepted.');
    }

    public function showStatus($userId)
    {
        // Find user ID and performs a search in the FriendRequest
        $user = User::find($userId);
        $friendRequest = FriendRequest::where('user_id', Auth::user()->id)
            ->where('friend_id', $user->id)
            ->orWhere('friend_id', Auth::user()->id)
            ->where('user_id', $user->id)
            ->first();

        // Check if user ID is exist and value of the 'accepted' column
        if ($friendRequest) {
            if ($friendRequest->accepted) {
                return 'friends';
            } elseif ($friendRequest->user_id == Auth::user()->id) {
                return 'friend_request_sent';
            } else {
                return 'friend_request_received';
            }
        }

        return 'add_friends';
    }

}
