<?php

namespace App\Services;

use App\Enums\Ultity;
use App\Repositories\GameRepository;
use App\Repositories\IpUserRepository;
use stdClass;

class Chart
{
    private $gameRepository;
    private $ipUserRepository;
    private $ultity;

    public function __construct(GameRepository $gameRepository, IpUserRepository $ipUserRepository, Ultity $ultity)
    {
        $this->gameRepository = $gameRepository;
        $this->ipUserRepository = $ipUserRepository;
        $this->ultity = $ultity;
    }

    public function renderChartCountPlayers($type)
    {
        $queryGameTop5 = $this->ipUserRepository->getTop5GameForAnalytics($type);

        $result = [];
        $dataSet = new stdClass;

        foreach ($queryGameTop5 as $record) {
            $record['game_name'] = ucwords(str_replace('-', ' ', $record['game_name']));
            $result['labels'][] = $record['game_name'];

            $dataSet->label = 'Count by ' . $type;
            $dataSet->data[] = $record['total'];
            $dataSet->backgroundColor[] = $this->ultity->rndRGBColorCode();
            $dataSet->hoverOffset = 4;

            $result['datasets'] = [$dataSet];
        }

        return $result;
    }
}
