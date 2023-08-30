<?php

namespace App\Console\Commands;

use App\Repositories\GameRepository;
use Illuminate\Console\Command;

class DeleteImageUnused extends Command
{
    protected $signature = 'app:delete-image-unused';
    protected $description = 'Delete image unused with status 0';
    protected $gameRepository;

    public function __construct(GameRepository $gameRepository)
    {
        $this->gameRepository = $gameRepository;
        parent::__construct();
    }

    public function handle()
    {
        $games = $this->gameRepository->get();

        foreach($games as $game) {
            if($game['status'] == 1) {
                continue;
            }

        }
    }
}
