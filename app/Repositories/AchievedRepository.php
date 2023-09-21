<?php

namespace App\Repositories;

use App\Models\Achieved;

class AchievedRepository extends BaseRepository
{
    public function model()
    {
        return Achieved::class;
    }

    public function getAchievedByUser($user_id)
    {
        return $this->model->with('achievements')->where('user_id', $user_id)->get();
    }
}
