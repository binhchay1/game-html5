<?php

namespace App\Repositories;

use App\Models\Point;

class PointRepository extends BaseRepository
{
    public function model()
    {
        return Point::class;
    }

    public function getPointsByUser($user_id)
    {
        return $this->model->where('user_id', $user_id)->first();
    }
}
