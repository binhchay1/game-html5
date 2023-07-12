<?php

namespace App\Repositories;

use App\Models\Category;

/**
 * Class GameRepository.
 */
class CategoryRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
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
}
