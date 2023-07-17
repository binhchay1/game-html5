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

    public function getListGameWithVote()
    {
        $query = $this->model->with('votes');

        return $query->get();
    }

    public function listGameByCategory($category, $sort = null)
    {
        $query = $this->model->with('votes');
        if (!empty($sort)) {
            if ($sort == 'popularity') {
                $query = $query->orderBy('count_play', 'desc');
            }

            if ($sort == 'rating') {
                $query = $query->selectRaw('(votes.like / (votes.un_like + votes.like)) * 100 AS rating')->orderByRaw('rating', 'desc');
            }

            if ($sort == 'date') {
                $query = $query->orderBy('created_at', 'desc');
            }
        }
        return $query->where('category', $category)->get();
    }

    public function listGameByTag($tag)
    {
        return $this->model->with('votes')->where('tag', 'like', '%' . $tag . '%')->get();
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
        $query = $this->model->with('votes');

        if (isset($filter['q'])) {
            $query = $query->where('name', 'like', '%' . $filter['q'] . '%');
        }

        if (isset($filter['category'])) {
            $query = $query->where('category', $filter['category']);
        }

        if (isset($filter['tag'])) {
            $query = $query->where('tag', 'like', '%' . $filter['tag'] . '%');
        }

        return $query->get();
    }

    public function getTags()
    {
        return $this->model->select('tag')->get();
    }

    public function getBestGame()
    {
        return $this->model->with('votes')->orderBy('count_play', 'desc')->limit(100)->get();
    }

    public function getNewestGame()
    {
        return $this->model->with('votes')->orderBy('created_at', 'desc')->limit(100)->get();
    }

    public function countGameByTag($tag)
    {
        return $this->model->where('tag', 'like', '%' . $tag . '%')->count();
    }

    public function updateGameNameByThumbs($fileName, $url)
    {
        return $this->model->where('thumbs', 'like', '%' . $fileName . '%')->update(['thumbs' => $url]);
    }

    public function updateGameWithLinkS3($gameName, $data)
    {
        return $this->model->where('name', $gameName)->update($data);
    }
}
