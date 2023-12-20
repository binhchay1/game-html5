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
        $attrA = '.item-thumbnail';
        $page = 1;
        while (!$break) {
            $url = $this->linkGame::APKAFE;
            if ($page > 1) {
                $url = $url . "page/" . $page . '/';
            }

            $html = $this->crawls->getDom($url, null);
            $arrA = $html->find($attrA);
            foreach ($arrA as $a) {
                dump($a->childNodes(0)->attr['href']);
            }

            $page++;

            if ($page == 28) {
                $break = true;
            }
        }
    }
}

