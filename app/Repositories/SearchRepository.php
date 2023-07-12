<?php

namespace App\Repositories;

use App\Models\Search;


class SearchRepository extends BaseRepository
{
    public function model()
    {
        return Search::class;
    }

    public function listOrderByCount()
    {
        return $this->model->orderBy('count', 'desc')->limit(10)->get();
    }
}
