<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentPost extends Model
{
    use HasFactory;

    protected $table = 'comment_posts';

    protected $fillable = [
        'user_id',
        'post_slug',
        'message'
    ];

    public $timestamps = true;

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
