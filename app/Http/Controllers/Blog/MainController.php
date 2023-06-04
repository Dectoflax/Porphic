<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Services\Blog\MainService;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(MainService $mainService)
    {
        return \view('blog.main', $mainService->fetch());
    }
}
