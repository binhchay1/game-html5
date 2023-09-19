<?php

namespace App\Repositories;

use App\Models\Achieved;

class AchievedRepository extends BaseRepository
{
    public function model()
    {
        return Achieved::class;
    }
}
