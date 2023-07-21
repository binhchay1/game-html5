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
        $chart = $this->chart->renderChartCountPlayers();
        dd($chart);
        return view('admin.homepage');
    }
}
