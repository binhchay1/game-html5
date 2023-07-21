<?php

namespace App\Services;

use App\Repositories\GameRepository;
use App\Repositories\IpUserRepository;

class Chart
{
    private $gameRepository;
    private $ipUserRepository;

    public function __construct(GameRepository $gameRepository, IpUserRepository $ipUserRepository)
    {
        $this->gameRepository = $gameRepository;
        $this->ipUserRepository = $ipUserRepository;
    }

    public function renderChartCountPlayers()
    {
        $queryGameTop5 = $this->ipUserRepository->getTop5GameInMonth();
        $arrGameByIP = [];

        foreach ($queryGameTop5 as $query) {
            if (array_key_exists($query['game_name'], $arrGameByIP)) {
                if (!in_array($query['ip_address'], $arrGameByIP[$query['game_name']])) {
                    $arrGameByIP[$query['game_name']][] = $query['ip_address'];
                }
            } else {
                $arrGameByIP[$query['game_name']] = [$query['ip_address']];
            }
        }
    }
}
