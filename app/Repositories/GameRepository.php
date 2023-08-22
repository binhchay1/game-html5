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
        $query = $this->model->with('votes')->where('status', 1);

        return $query->get();
    }

    public function listGameByCategory($category, $sort = null)
    {
        $query = $this->model->join('vote', 'games.name', '=', 'vote.game_name');

        if (!empty($sort)) {
            if ($sort == 'popularity') {
                $query = $query->orderBy('games.count_play', 'desc');
            }

            if ($sort == 'rating') {
                $query = $query->selectRaw('(CASE WHEN (vote.un_like + vote.like) = 0
                THEN 0 ELSE ((vote.like / (vote.un_like + vote.like)) * 100) END) AS rating, games.name, games.tag, games.thumbs, games.count_play, vote.like, vote.un_like');
            }

            if ($sort == 'date') {
                $query = $query->orderBy('games.created_at', 'desc');
            }
        }

        $query = $query->where('games.category', $category)->where('games.status', 1)->get();

        return $query;
    }

    public function listGameByTag($tag)
    {
        return $this->model->with('votes')->where('status', 1)->where('tag', 'like', '%' . $tag . '%')->get();
    }

    public function getFeatureGames()
    {
        return $this->model->where('status', 1)->orderBy('created_at')->take(10)->get();
    }

    public function getGameByCategory($category)
    {
        return $this->model->where('status', 1)->where('category', $category)->get();
    }

    public function getListBySearch($filter)
    {
        $query = $this->model->with('votes')->where('status', 1);

        if (isset($filter['q'])) {
            $query = $query->where('status', 1)->where('name', 'like', '%' . $filter['q'] . '%');
        }

        if (isset($filter['category'])) {
            $query = $query->where('status', 1)->where('category', $filter['category']);
        }

        if (isset($filter['tag'])) {
            $query = $query->where('status', 1)->where('tag', 'like', '%' . $filter['tag'] . '%');
        }

        return $query->get();
    }

    public function getTags()
    {
        return $this->model->select('tag')->where('status', 1)->get();
    }

    public function getBestGame()
    {
        return $this->model->with('votes')->where('status', 1)->orderBy('count_play', 'desc')->limit(100)->get();
    }

    public function getNewestGame()
    {
        return $this->model->with('votes')->where('status', 1)->orderBy('created_at', 'desc')->limit(100)->get();
    }

    public function countGameByTag($tag)
    {
        return $this->model->select('tag')->where('tag', 'like', '%"' . $tag . '"%')->where('status', 1)->count();
    }

    public function updateGameNameByThumbs($fileName, $url)
    {
        return $this->model->where('thumbs', 'like', '%' . $fileName . '%')->update(['thumbs' => $url]);
    }

    public function updateGameWithLinkS3($gameName, $data)
    {
        return $this->model->where('name', 'like', '%' . $gameName . '%')->update($data);
    }

    public function getGameByName($gameName)
    {
        return $this->model->with('votes')->where('name', $gameName)->first();
    }

    public function showGame($id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function store($input)
    {
        return $this->model->with('categories')->create($input);
    }

    public function update($input, $id)
    {
        return $this->model->with('categories')->where('id', $id)->update($input);
    }

    public function updateCountPlay($gameName, $count)
    {
        return $this->model->where('name', $gameName)->update(['count_play' => $count]);
    }

    public function getCountByGame($gameName)
    {
        return $this->model->select('count_play')->where('status', 1)->where('name', $gameName)->first();
    }

    public function updateLinkImageById($id, $data)
    {
        return $this->model->where('id', $id)->update($data);
    }

    public function updateStatusToHide()
    {
        return $this->model->query()->update(['status' => 0]);
    }

    public function getTagsByListGame($listName)
    {
        return $this->model->select('tag')->whereIn('name', $listName)->get();
    }

    public function updateLinkGame($gameName, $gameDir)
    {
        return $this->model->where('name', $gameName)->update(['link' => $gameDir, 'status'=> 1] );
    }
}
