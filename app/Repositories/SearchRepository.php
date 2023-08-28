<?php

namespace App\Repositories;

use App\Models\Search;


class SearchRepository extends BaseRepository
{
    public function model()
    {
        return Search::class;
    }

    public function listOrderWithLimitByLocale($locale)
    {
        return $this->model->where('locale', $locale)->orderBy('count', 'desc')->limit(20)->get();
    }

    public function update($data)
    {
        return $this->model->update($data);
    }

    public function getSearchByKeyWordAndLocale($keyword, $locale)
    {
        return $this->model->where('keyword', $keyword)->where('locale', $locale)->first();
    }
}
