<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'user_id',
        'game_name',
        'locale',
        'content',
        'status'
    ];

    public $timestamps = true;

    public function users()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function games()
    {
        return $this->hasOne('App\Models\Game', 'name', 'game_name');
    }
}
