<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Chart;

class AdminController extends Controller
{
    private $chart;

    public function __construct(Chart $chart)
    {
        $this->chart = $chart;
    }

    public function index()
    {
        return view('admin.homepage');
    }

    public function getChartCountPlay(Request $request)
    {
        if (!empty($request->get('type'))) {
            $type = $request->get('type');
        }

        $chartCountPlay = (object) $this->chart->renderChartCountPlayers($type);

        return $chartCountPlay;
    }

    public function getChartUserRegister(Request $request)
    {
        if (!empty($request->get('type'))) {
            $type = $request->get('type');
        }

        $chartCountUser = (object) $this->chart->renderChartCountUser($type);

        return $chartCountUser;
    }
}
