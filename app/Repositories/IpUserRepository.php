<?php

namespace App\Repositories;

use App\Models\IpUser;


class IpUserRepository extends BaseRepository
{
    public function model()
    {
        return IpUser::class;
    }

    public function getIpByUser($ip, $gameName)
    {
        return $this->model->where('ip_address', $ip)->where('game_name', $gameName)->first();
    }
}
