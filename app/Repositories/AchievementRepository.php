<?php

namespace App\Repositories;

use App\Models\Achievement;

class AchievementRepository extends BaseRepository
{
    public function model()
    {
        return Achievement::class;
    }

    public function listAchievement() {
        return $this->model->get();
    }
}
