<?php

namespace App\Http\Controllers\Admin\Blog\Draft;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function index()
    {
        return \view('admin.blog.draft.edit');
    }
}
