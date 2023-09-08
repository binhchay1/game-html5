<?php

namespace App\Repositories;

use App\Models\Subscrible;

class SubscribleRepository extends BaseRepository
{
    public function model()
    {
        return Subscrible::class;
    }

    public function getSubscribleWithStatus()
    {
        return $this->model->select('email')->where('status', 1)->get();
    }

    public function getSubscribleByEmailAndToken($email, $token)
    {
        return $this->model->where('email', $email)->where('token', $token)->first();
    }
}
