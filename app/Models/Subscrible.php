<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscrible extends Model
{
    use HasFactory;

    protected $table = 'subscrible';

    protected $fillable = [
        'email',
        'status',
        'user_id'
    ];

    public $timestamps = true;
}
