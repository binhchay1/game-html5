<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GameReuqest;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\GameRepository;
use App\Repositories\VoteByUserRepository;
use App\Repositories\VoteRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GameController extends Controller
{
    protected $gameRepository;
    protected $voteRepository;
    protected $voteByUserRepository;
    protected $categoryRepository;

    public function __construct(GameRepository $gameRepository, VoteRepository $voteRepository, VoteByUserRepository $voteByUserRepository, CategoryRepository $categoryRepository)
    {
        $this->gameRepository = $gameRepository;
        $this->voteRepository = $voteRepository;
        $this->voteByUserRepository = $voteByUserRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $dataGame = $this->gameRepository->listGame();

        return view('admin.game.list-game', ['dataGame' => $dataGame]);
    }

    public function voteByUser(Request $request)
    {
        $vote = $request->get('vote');
        $gameName = $request->get('gameName');
        $getVote = $this->voteRepository->getVoteByGame($gameName);
        $getGame = $this->gameRepository->getGameByName($gameName);
        $checkVoteByUser = $this->voteByUserRepository->getVoteByUserAndGame($getGame->id, Auth::user()->id);
        if (empty($checkVoteByUser)) {
            $dataVoteByUser = [
                'users_id' => Auth::user()->id,
                'games_id' => $getGame->id,
                'status' => 0
            ];

            if ($vote == 'like') {
                $dataVote = [
                    'like' => ($getVote['like'] + 1),
                ];

                $dataVoteByUser['status'] = 1;
            }

            if ($vote == 'unlike') {
                $dataVote = [
                    'un_like' => ($getVote['un_like'] + 1),
                ];

                $dataVoteByUser['status'] = 0;
            }

            $this->voteRepository->updateByGame($gameName, $dataVote);
            $this->voteByUserRepository->create($dataVoteByUser);
        } else {

            if ($vote == 'like') {
                $dataVote = [
                    'like' => ($getVote['like'] + 1),
                    'un_like' => ($getVote['un_like'] - 1)
                ];

                $dataVoteByUser['status'] = 1;
            }

            if ($vote == 'unlike') {
                $dataVote = [
                    'like' => ($getVote['like'] - 1),
                    'un_like' => ($getVote['un_like'] + 1)
                ];

                $dataVoteByUser['status'] = 0;
            }

            $this->voteByUserRepository->updateByUser(Auth::user()->id, $getGame->id, $dataVoteByUser);
        }

        return $vote;
    }

    public function showGame($id)
    {
        $dataGame = $this->gameRepository->showGame($id);
        return view('admin.game.show-game', ['dataGame' => $dataGame]);
    }

    public function create()
    {
        $status = config('game.status');
        $dataCategory = $this->categoryRepository->listCategory();
        return view('admin.game.create-game', ['dataCategory'=> $dataCategory, 'status'=> $status]);
    }

    public function store(GameReuqest $request)
    {
        $input = $request->all();
        if (array_key_exists('thumbs', $input)) {
            $idFolder = Hash::make('acwbe' . Auth::user()->id);
            $path = 'images/user/' . $idFolder . '/' . $input['thumbs']->getClientOriginalName();
            $url = $this->ultity->saveImage($path, file_get_contents($input['thumbs']));
            $input['thumbs'] = $url;
        }

        if (array_key_exists('icon', $input)) {
            $idFolder = Hash::make('acwbe' . Auth::user()->id);
            $path = 'images/user/' . $idFolder . '/' . $input['icon']->getClientOriginalName();
            $url = $this->ultity->saveImage($path, file_get_contents($input['icon']));
            $input['icon'] = $url;
        }

        if (array_key_exists('background', $input)) {
            $idFolder = Hash::make('acwbe' . Auth::user()->id);
            $path = 'images/user/' . $idFolder . '/' . $input['background']->getClientOriginalName();
            $url = $this->ultity->saveImage($path, file_get_contents($input['background']));
            $input['background'] = $url;
        }
        $dataUser = $this->gameRepository->store($input);
        return redirect('list-game');
    }

    public function edit($id)
    {
        $status = config('game.status');
        $dataGame = $this->gameRepository->showGame($id);
        $dataCategory = $this->categoryRepository->listCategory();
        return view('admin.game.edit-game', [
            'dataGame' => $dataGame,
            'dataCategory' => $dataCategory,
            'status'=> $status
        ]);
    }

    public function update(GameRequest $request,$id)
    {
        $input = $request->except(['_token']);

        if (array_key_exists('thumbs', $input)) {
            $idFolder = Hash::make('acwbe' . Auth::user()->id);
            $path = 'images/user/' . $idFolder . '/' . $input['thumbs']->getClientOriginalName();
            $url = $this->ultity->saveImage($path, file_get_contents($input['thumbs']));
            $input['thumbs'] = $url;
        }

        if (array_key_exists('icon', $input)) {
            $idFolder = Hash::make('acwbe' . Auth::user()->id);
            $path = 'images/user/' . $idFolder . '/' . $input['icon']->getClientOriginalName();
            $url = $this->ultity->saveImage($path, file_get_contents($input['icon']));
            $input['icon'] = $url;
        }

        if (array_key_exists('background', $input)) {
            $idFolder = Hash::make('acwbe' . Auth::user()->id);
            $path = 'images/user/' . $idFolder . '/' . $input['background']->getClientOriginalName();
            $url = $this->ultity->saveImage($path, file_get_contents($input['background']));
            $input['background'] = $url;
        }

        $dataGame = $this->gameRepository->update($input, $id);
        return redirect('list-game');
    }
}
