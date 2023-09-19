<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achieved extends Model
{
    use HasFactory;

    protected $table = 'achieved';

    protected $fillable = [
        'user_id',
        'achievement_id'
    ];

    public $timestamps = true;
}
