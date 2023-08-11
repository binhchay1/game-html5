<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Enums\LinkGame;
use App\Enums\Ultity;
use App\Repositories\GameRepository;
use App\Services\Crawls;

class CrawlsAndStoreInformationOfGameY8 extends Command
{
    protected $signature = 'app:crawls-and-store-information-of-game-y8';
    protected $description = 'Get information of game with link y8.com';
    private $linkGame;
    private $crawls;
    private $gameRepository;

    public function __construct(
        LinkGame $linkGame,
        Crawls $crawls,
        Ultity $ultity,
        GameRepository $gameRepository,
    ) {
        $this->linkGame = $linkGame;
        $this->crawls = $crawls;
        $this->ultity = $ultity;
        $this->gameRepository = $gameRepository;
        parent::__construct();
    }

    public function handle()
    {
        $this->getLinkGameY8();
    }

    public function getLinkGameY8()
    {
        $break = false;
        $attrA = '.thumb_link';
        $page = env('PAGE_GET_GAME', 1);
        $count = 0;
        $breakCount = env('BREAK_COUNT', -1); //change this for break by count game ( default -1 = non break )
        $breakPage = env('BREAK_PAGE', -1); //change this for break by count page ( default -1 = non break )
        $listResultSrcFrame = [];
        $listResultGameDone = [];

        while (!$break) {
            if (isset($breakCount)) {
                if ($count == $breakCount and $breakCount > 0) {
                    $break = true;
                    continue;
                }
            }

            if (isset($breakPage)) {
                if ($page == $breakPage and $breakPage > 0) {
                    $break = true;
                    continue;
                }
            }

            dump('------------------ Start Page ' . $page . ' ------------------');
            $url = $this->linkGame::GAME_Y8;
            $url = $url . "?page=" . $page;
            $html = $this->crawls->getDom($url, null);
            $decode = json_decode($html->innertext);
            // $content = $html->content;

            dd($decode);


            dump('------------------ Total Game : ' . $count . ' ------------------');
            dump('------------------ End Page ' . $page . ' ------------------');

            $page++;
        }
    }
}
