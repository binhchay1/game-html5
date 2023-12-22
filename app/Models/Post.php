<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'content',
        'author_id',
        'thumb',
        'slug',
        'category',
    ];

    public $timestamps = true;

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'author_id', 'id');
    }
}
