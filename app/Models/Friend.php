<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;

    protected $table = 'friends';

    protected $fillable = [
        'user_id',
        'pair_id'
    ];

    public $timestamps = true;
}
