<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FriendRequest extends Model
{
    use HasFactory;

    protected $table = 'friends_request';

    protected $fillable = [
        'user_id',
        'pair_id',
        'status'
    ];

    public $timestamps = true;
}
