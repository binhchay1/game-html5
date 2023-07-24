<?php

namespace App\Console\Commands;

use App\Repositories\GameRepository;
use App\Repositories\VoteRepository;
use Illuminate\Console\Command;

class CreateVoteForGame extends Command
{
    protected $signature = 'app:create-vote-for-game';
    protected $description = 'Create vote for game';
    private $gameRepository;
    private $voteRepository;

    public function __construct(GameRepository $gameRepository, VoteRepository $voteRepository)
    {
        $this->gameRepository = $gameRepository;
        $this->voteRepository = $voteRepository;
        parent::__construct();
    }

    public function handle()
    {
        $games = $this->gameRepository->get();

        foreach ($games as $game) {
            $query = $this->voteRepository->getByColumn($game['name'], 'game_name');
            if (empty($query)) {
                $data = [
                    'game_name' => $game['name'],
                    'like' => 0,
                    'un_like' => 0
                ];
                $this->voteRepository->create($data);
            }
        }

        dump('---------Created vote games---------');
    }
}
