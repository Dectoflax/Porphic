<?php

namespace App\Http\Services\Blog;

use App\Http\Services;
use App\Models\Blog\Post;

class MainService extends Services
{
    public function fetch(): array
    {
        return [
            'latests' => $this->latest(),
            'suggestions' => $this->suggestions()
        ];
    }

    public function suggestions()
    {
        return Post::orderBy('views', 'desc')->limit(6)->get();
    }

    private function latest()
    {
        return Post::latest()->simplePaginate(4);
    }
}
