<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\GameRepository;
use App\Repositories\VoteByUserRepository;
use App\Repositories\VoteRepository;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    protected $gameRepository;
    protected $voteRepository;
    protected $voteByUserRepository;

    public function __construct(GameRepository $gameRepository, VoteRepository $voteRepository, VoteByUserRepository $voteByUserRepository)
    {
        $this->gameRepository = $gameRepository;
        $this->voteRepository = $voteRepository;
        $this->voteByUserRepository = $voteByUserRepository;
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
}
