<?php

namespace App\Repositories;

use App\Models\VoteByUser;

class VoteByUserRepository extends BaseRepository
{
    public function model()
    {
        return VoteByUser::class;
    }

    public function getVoteByUserAndGame($gameID, $userID)
    {
        return $this->model->where('users_id', $userID)->where('games_id', $gameID)->first();
    }

    public function updateByUser($userID, $gameID, $data)
    {
        return $this->model->where('users_id', $userID)->where('games_id', $gameID)->update($data);
    }
}
