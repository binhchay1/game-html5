<?php

namespace App\Repositories;

use App\Models\Achievement;

class AchievementRepository extends BaseRepository
{
    public function model()
    {
        return Achievement::class;
    }

    public function listAchievement()
    {
        return $this->model->get();
    }

    public function showAchievement($id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function getBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }
}
