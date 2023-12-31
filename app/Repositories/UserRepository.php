<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository
{
    public function model()
    {
        return User::class;
    }

    public function listUser()
    {
        return $this->model->orderBy('created_at', 'desc')->get();
    }

    public function showUser($id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function update($input, $id)
    {
        return $this->model->where(\DB::raw('md5(id)'), $id)->update($input);
    }

    public function userInfo($userId)
    {
        return $this->model->where('id', $userId)->first();
    }

    public function store($input)
    {
        return $this->model->create($input);
    }

    public function getUserByEmail($email)
    {
        return $this->model->where('email', $email)->first();
    }

    public function updateSocialID($email, $data)
    {
        return $this->model->where('email', $email)->update($data);
    }

    public function getUserByGoogle($googleID)
    {
        return $this->model->where('google_id', $googleID)->first();
    }

    public function getUserByFacebook($facebookID)
    {
        return $this->model->where('facebook_id', $facebookID)->first();
    }

    public function getChartUser($type = 'month')
    {
        $query = $this->model;

        if ($type == 'month') {
            $query = $query->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                ->whereYear('created_at', date('Y'))
                ->groupBy('month')
                ->orderBy('month')
                ->get();
        }

        if ($type == 'quarter') {
            $query = $query->selectRaw('QUARTER(created_at) as quarter, COUNT(*) as count')
                ->whereYear('created_at', date('Y'))
                ->groupBy('quarter')
                ->orderBy('quarter')
                ->get();
        }

        if ($type == 'year') {
            $query = $query->selectRaw('Year(created_at) as year, COUNT(*) as count')
                ->whereYear('created_at', date('Y'))
                ->groupBy('year')
                ->orderBy('year')
                ->get();
        }

        return $query;
    }

    public function showUserByNickName($nick_name)
    {
        return $this->model->where('nick_name', $nick_name)->first();
    }

    public function getListUserWithPointById($arrayId)
    {
        return $this->model->whereIn('id', $arrayId)->get();
    }
}
