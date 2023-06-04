<?php

namespace App\Http\Controllers\Admin\Auth\Password;

use App\Http\Controllers\Controller;
use App\Http\Services\Admin\Auth\Password\ResetService;
use Illuminate\Http\Request;

class ResetController extends Controller
{
    public function index(Request $request, string $token, ResetService $resetService)
    {
        return $resetService->authenticate($request->query('email'), $token);
    }
}
