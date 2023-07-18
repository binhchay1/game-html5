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
        if(isset($input['image'])) {
            $img = $this->postFile($input);
            if ($img) {
                $fileName = 'img/' . $img;
                $input['image'] = $fileName;
            }
        }
        return $this->model->where('id', $id)->update($input);
    }
}
