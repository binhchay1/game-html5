<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IpUser extends Model
{
    use HasFactory;

    protected $table = 'ip_user';

    protected $fillable = [
        'ip_address',
        'game_name',
        'user_id'
    ];

    public $timestamps = true;
}
