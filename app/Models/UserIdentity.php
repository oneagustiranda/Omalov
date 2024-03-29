<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserIdentity extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $guarded = [];

    public function marital_status()
    {
        return $this->belongsTo(MaritalStatus::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
