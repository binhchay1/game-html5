<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\ReportBugRepository;
use App\Http\Controllers\Controller;

class ReportBugController extends Controller
{
    protected $reportBugRepository;

    public function __construct(ReportBugRepository $reportBugRepository)
    {
        $this->reportBugRepository = $reportBugRepository;
    }

    public function index()
    {
        $dataReport = $this->reportBugRepository->listReport();

        return view('admin.report.list-report', compact('dataReport'));
    }

    public function showReport($id)
    {
        $dataReport = $this->reportBugRepository->showReport($id);

        return view('admin.report.show-report', compact('dataReport'));
    }
}
