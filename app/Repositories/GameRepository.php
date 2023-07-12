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

    public function getFeatureGames()
    {
        return $this->model->orderBy('created_at')->take(10)->get();
    }

    public function getGameByCategory($category) {
        return $this->model->where('category', $category)->get();
    }
}
