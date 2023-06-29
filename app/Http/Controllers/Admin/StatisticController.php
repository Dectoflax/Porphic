<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Admin\StatisticService;

class StatisticController extends Controller
{
    public function index(StatisticService $statisticService)
    {
        return \view('admin.statistics', $statisticService->fetch());
    }
}
