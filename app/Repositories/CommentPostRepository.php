<?php

namespace App\Repositories;

use App\Models\CommentPost;

class CommentPostRepository extends BaseRepository
{
    public function model()
    {
        return CommentPost::class;
    }

    public function getCommentByUserAndPost($user_id, $post_slug)
    {
        return $this->model->with('users')->where('user_id', $user_id)->where('post_slug', $post_slug)->first();
    }

    public function getCommentByPost($slug)
    {
        return $this->model->with('users')->where('post_slug', $slug)->get();
    }
}
