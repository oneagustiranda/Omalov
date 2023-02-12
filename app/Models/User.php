<?php

namespace App\Models;

use App\Models\FriendRequest;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $connection = 'mysql';
    
    use HasApiTokens, HasFactory, Notifiable;

    // set primary key type from id to uuid
    protected $keyType = 'string';
    public $incrementing = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function user_identities()
    {
        return $this->hasMany(UserIdentity::class);
    }

    public function sentFriendRequests()
    {
        return $this->hasMany(FriendRequest::class, 'user_id');
    }

    public function receivedFriendRequests()
    {
        return $this->hasMany(FriendRequest::class, 'friend_id');
    }

    public function friends()
    {
        return $this->belongsToMany(User::class, 'friend_requests', 'user_id', 'friend_id')
            ->wherePivot('accepted', true)
            ->withTimestamps();
    }
}
