<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoteByUser extends Model
{
    use HasFactory;

    protected $table = 'vote_by_user';

    protected $fillable = [
        'games_id',
        'users_id',
        'status',
    ];

    public $timestamps = true;
}
