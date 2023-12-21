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
        return $this->model->where('locale', $locale)->where('status', 1)->orderBy('count', 'desc')->limit(20)->get();
    }

    public function update($data)
    {
        return $this->model->update($data);
    }

    public function getSearchByKeyWordAndLocale($keyword, $locale)
    {
        return $this->model->where('keyword', $keyword)->where('locale', $locale)->first();
    }

    public function getKeywordWithLocale($keyword, $locale)
    {
        return $this->model->where('keyword', $keyword)->where('locale', $locale)->first();
    }

    public function updateStatus($id, $data)
    {
        return $this->model->where('id', $id)->update($data);
    }
}
