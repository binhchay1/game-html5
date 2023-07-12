<?php

namespace App\Repositories;

use App\Models\Game;

class GameRepository extends BaseRepository
{
    public function model()
    {
        return Game::class;
    }

    public function listGame()
    {
        return $this->model->with('categories')->orderBy('created_at', 'desc')->get();
    }

    public function listGameByCategory($category)
    {
        return $this->model->where('category', $category)->get();
    }

    public function listGameByTag($tag)
    {
        return $this->model->where('tag', '%' . $tag . '%')->get();
    }

    public function getFeatureGames()
    {
        return $this->model->orderBy('created_at')->take(10)->get();
    }

    public function getGameByCategory($category)
    {
        return $this->model->where('category', $category)->get();
    }

    public function getListBySearch($filter)
    {
        $query = $this->model;

        if (isset($filter['q'])) {
            $query = $query->where('name', 'like', '%' . $filter['q'] . '%');
        }

        if (isset($filter['category'])) {
            $query = $query->where('category', $filter['category']);
        }

        if (isset($filter['tags'])) {
            $query = $query->where('tags', 'like', '%' . $filter['tags'] . '%');
        }

        return $query->get();
    }

    public function getTags()
    {
        return $this->model->select('tag')->get();
    }
}
