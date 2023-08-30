<?php

namespace App\Services;

use App\Enums\Ultity;
use App\Repositories\IpUserRepository;
use App\Repositories\UserRepository;
use stdClass;

class Chart
{
    protected $userRepository;
    private $ipUserRepository;
    private $ultity;

    public function __construct(IpUserRepository $ipUserRepository, Ultity $ultity, UserRepository $userRepository)
    {
        $this->ipUserRepository = $ipUserRepository;
        $this->ultity = $ultity;
        $this->userRepository = $userRepository;
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

    public function renderChartCountUser($type)
    {
        $queryUser = $this->userRepository->getChartUser($type);
        if ($type === "month") {
            $result = [];
            $data = [];
            $dataSet = new stdClass;

            for ($i = 1; $i <= 12; $i++) {
                $month = date('F', mktime(0, 0, 0, $i, 1));
                $count = 0;

                foreach ($queryUser as $user) {
                    if ($user->month == $i) {
                        $count = $user->count;
                        break;
                    }
                }

                array_push($data, $count);
                $result['labels'][] = $month;
            }

            $dataSet->label = 'User by ' . $type;
            $dataSet->data = $data;
            $result['datasets'] = [$dataSet];
            $dataSet->backgroundColor[] = $this->ultity->rndRGBColorCode();
        }

        if ($type === "quarter") {
            $result = [];
            $data = [];
            $dataSet = new stdClass;

            for ($i = 1; $i <= 4; $i++) {
                $quarter =  date('n', mktime(0, 0, 0, $i, 1));
                $count = 0;

                foreach ($queryUser as $user) {
                    if ($user->quarter == $i) {
                        $count = $user->count;
                        break;
                    }
                }

                array_push($data, $count);
                $result['labels'][] = $quarter;
            }

            $dataSet->label = 'User by ' . $type;
            $dataSet->data = $data;
            $result['datasets'] = [$dataSet];
            $dataSet->backgroundColor[] = $this->ultity->rndRGBColorCode();
        }

        if ($type === 'year') {
            $result = [];
            $data = [];
            $dataSet = new stdClass;
            $year = date('Y');

            foreach ($queryUser as $user) {
                if ($user->year == $year) {
                    $count = $user->count;
                    break;
                }
            }

            array_push($data, $count);
            $result['labels'][] = $year;

            $dataSet->label = 'User by ' . $type;
            $dataSet->data = $data;
            $result['datasets'] = [$dataSet];
            $dataSet->backgroundColor[] = $this->ultity->rndRGBColorCode();
        }
        return $result;
    }
}
