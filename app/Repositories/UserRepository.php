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

    public function updateForDeleteByEmail($email, array $data)
    {
        $query = $this->model->query();

        return $query->where('email', $email)->update($data);
    }

    public function deleteByEmail($email)
    {
        $query = $this->model->query();

        return $query->where('email', $email)->delete();
    }

    public function getByEmail($email)
    {
        $query = $this->model->query();

        return $query->where('email', $email)->first();
    }

    public function updateIsNewStatus($id, $status)
    {
        $query = $this->model->query();

        return $query->where('id', $id)->update(['is_new' => $status]);
    }

    public function updatePasswordById($id, $password)
    {
        $query = $this->model->query();

        return $query->where('id', $id)->update(['password' => $password]);
    }

    public function reportMoneyIncoming()
    {
    }
}
