<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Services\Blog\PostService;

class PostController extends Controller
{
    public function index(string $post, PostService $postService)
    {
        return \view('blog.post', $postService->fetch($post));
    }
}
