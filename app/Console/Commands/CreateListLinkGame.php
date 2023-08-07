<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\GameRepository;

class CreateListLinkGame extends Command
{
    protected $signature = 'app:create-list-link-game';
    protected $description = 'Create a list of games to file';

    public function __construct(GameRepository $gameRepository)
    {
        $this->gameRepository = $gameRepository;
        parent::__construct();
    }

    public function handle()
    {
        $this->getAndPrintGame();
    }

    public function getAndPrintGame()
    {
        $games = $this->gameRepository->get();

        foreach ($games as $game) {
            $pathProcess = public_path() . '/process/list.txt';
            $fp = fopen($pathProcess, 'a');
            fwrite($fp, $game['link'] . ' - ' . $game['name'] . PHP_EOL);
            fclose($fp);
        }

        dump('----------------done----------------');
    }
}
