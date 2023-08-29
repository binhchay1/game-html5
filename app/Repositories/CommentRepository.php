<?php

namespace App\Repositories;

use App\Models\Comment;

class CommentRepository extends BaseRepository
{
    public function model()
    {
        return Comment::class;
    }

    public function getCommentByGameAndLocale($gameName, $locale)
    {
        return $this->model->with('users')->where('game_name', $gameName)->where('locale', $locale)->get();
    }
}
