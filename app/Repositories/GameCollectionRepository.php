<?php

namespace App\Repositories;

use App\Models\GameCollection;


class GameCollectionRepository extends BaseRepository
{
    public function model()
    {
        return GameCollection::class;
    }

    public function getByGameNameAndUserId($gameName, $userId)
    {
        return $this->model->where('game_name', $gameName)->where('users_id', $userId)->first();
    }

    public function getCollectionByUser($userId)
    {
        return $this->model->select('game_name')->where('users_id', $userId)->get();
    }

    public function countGameInCollection($userId)
    {
        return $this->model->select('game_name')->where('users_id', $userId)->count();
    }
}
