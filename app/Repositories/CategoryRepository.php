<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends BaseRepository
{
    public function model()
    {
        return Category::class;
    }

    public function listCategory()
    {
        return $this->model->orderBy('created_at', 'desc')->get();
    }

    public function getAllGameByCategory()
    {
        return $this->model->with('games')->get();
    }

    public function listCategoryWithCount()
    {
        return $this->model->withCount('games')->get();
    }

    public function showCategory($id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function store($input)
    {
        return $this->model->create($input);
    }

    public function update($input, $id)
    {
        return $this->model->where('id', $id)->update($input);
    }
}
