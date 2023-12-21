<?php

namespace App\Repositories;

use App\Models\Tag;

class TagRepository extends BaseRepository
{
    public function model()
    {
        return Tag::class;
    }

    public function updateStatus($id, $data)
    {
        return $this->model->where('id', $id)->update($data);
    }

    public function getTagByStatus()
    {
        return $this->model->where('status', 1)->get();
    }
}
