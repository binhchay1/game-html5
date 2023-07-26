<?php

namespace App\Repositories;

use App\Models\IpUser;
use DB;


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

    public function getTop5GameForAnalytics($type = 'month')
    {
        $month = date('m');
        $year = date('Y');

        $query = $this->model;

        if ($type == 'month') {
            $query = $query
                ->select('game_name', DB::raw('count(*) as total'))
                ->groupBy('game_name')
                ->orderBy('total', 'desc')
                ->whereYear('created_at', $year)->whereMonth('created_at', $month)->limit(5)->get();
        }

        if ($type == 'quarter') {
            $query = $query
                ->select('game_name', DB::raw('count(*) as total'))
                ->groupBy('game_name')
                ->orderBy('total', 'desc')
                ->whereYear('created_at', $year)->whereMonth('created_at', $month)->limit(5)->get();
        }

        if ($type == 'year') {
            $query = $query
                ->select('game_name', DB::raw('count(*) as total'))
                ->groupBy('game_name')
                ->orderBy('total', 'desc')
                ->whereYear('created_at', $year)->whereMonth('created_at', $month)->limit(5)->get();
        }


        return $query;
    }
}
