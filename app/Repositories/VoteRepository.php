<?php

namespace App\Repositories;

use App\Models\Vote;

class VoteRepository extends BaseRepository
{
    public function model()
    {
        return Vote::class;
    }

    public function getVoteByGame($gameName)
    {
        return $this->model->where('game_name', $gameName)->first();
    }

    public function updateByGame($gameName, $data)
    {
        return $this->model->where('game_name', $gameName)->update($data);
    }
}
