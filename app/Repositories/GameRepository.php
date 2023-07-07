<?php

namespace App\Repositories;

use App\Models\Game;

/**
 * Class GameRepository.
 */
class GameRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Game::class;
    }

    public function listGame()
    {
        return $this->model->with('categories')->orderBy('created_at', 'desc')->get();
    }
}
