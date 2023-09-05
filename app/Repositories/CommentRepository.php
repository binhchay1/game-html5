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
        return $this->model->with('users')->where('game_name', $gameName)->where('locale', $locale)->where('status', 1)->get();
    }

    public function listComment()
    {
        return $this->model->orderBy('created_at', 'desc')->get();
    }

    public function showComment($id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function updateStatusComment($id, $data)
    {
        return $this->model->where('id', $id)->update($data);
    }

    public function getCommentByUserAndGame($game_name, $user_id)
    {
        return $this->model->where('user_id', $user_id)->where('game_name', $game_name)->first();
    }
}
