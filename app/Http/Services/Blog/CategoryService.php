<?php

namespace App\Http\Services\Blog;

use App\Models\Blog\Post;

class CategoryService
{
    public function fetch(string $id)
    {
        return [
            'suggestions' => $this->suggestions(),
            'posts' => $this->posts($id)
        ];
    }

    private function posts(string $id)
    {
        return Post::where('category', $id)->simplePaginate(4);
    }

    private function suggestions()
    {
        return (new MainService)->suggestions();
    }
}
