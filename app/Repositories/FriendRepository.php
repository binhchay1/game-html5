<?php

namespace App\Repositories;

use App\Models\Friend;

class FriendRepository extends BaseRepository
{
    public function model()
    {
        return Friend::class;
    }

    public function getFriendListByUser($user_id)
    {
        return $this->model->where('user_id', $user_id)->orWhere('pair_id', $user_id)->get();
    }
}
