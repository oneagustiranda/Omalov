<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\FriendRequest;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    //
    public function sendRequest(Request $request, User $user)
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
