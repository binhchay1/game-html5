<?php

namespace App\Repositories;

use App\Models\ReportBug;

class ReportBugRepository extends BaseRepository
{
    public function model()
    {
        return ReportBug::class;
    }

    public function getReportBugByEmailAndGame($userEmail, $gameName)
    {
        return $this->model->where('user_email', $userEmail)->where('game_name', $gameName)->first();
    }
}
