<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Admin\AdministrationService;
use Illuminate\Http\Request;

class AdministrationController extends Controller
{
    public function index(AdministrationService $administrationService, Request $request)
    {
        return \view('admin.administration', $administrationService->fetch($request));
    }
}
