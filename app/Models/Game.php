<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $table = 'games';

    protected $fillable = [
        'name',
        'link',
        'category',
        'thumbs',
        'status'
    ];

    public $timestamps = true;

    public function categories()
    {
        return $this-> belongsTo(
            'App\Models\Category',
            'category',
            'id');
    }
}
