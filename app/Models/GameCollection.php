<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameCollection extends Model
{
    use HasFactory;

    protected $table = 'game_collection';

    protected $fillable = [
        'users_id',
        'game_name',
    ];

    public $timestamps = true;
}
