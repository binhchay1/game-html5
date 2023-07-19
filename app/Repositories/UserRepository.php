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

    public function showUser($userId)
    {
        return $this->model->where('id', $userId)->get();
    }

    public function update($input, $id)
    {
        return $this->model->where('id', $id)->update($input);
    }

    public function userInfo($userId)
    {
        return $this->model->where('id', $userId)->first();
    }

    public function store($input)
    {
        return $this->model->create($input);
    }
}
