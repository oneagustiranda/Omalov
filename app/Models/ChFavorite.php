<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Chatify\Traits\UUID;

class ChFavorite extends Model
{
    protected $connection = 'mysql3';

    use UUID;    
}
