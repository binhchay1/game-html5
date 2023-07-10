<?php

namespace App\Repositories;

use App\Models\User;

/**
 * Class UserRepository.
 */
class UserRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return User::class;
    }

    public function listUser() {
        return $this->model->orderBy('created_at', 'desc')->get();
    }
}
