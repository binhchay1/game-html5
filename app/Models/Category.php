<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $fillable = [
        'name',
        'title',
    ];

    public $timestamps = true;

    public function games()
    {
        return $this->hasMany('App\Models\Game', 'category', 'name');
    }
}
