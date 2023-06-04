<?php

namespace App\Http\Services\Blog;

use App\Binkap\Blog\Helper\Schema;
use App\Http\Services;
use App\Models\Blog\Post;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostService
{
    private Schema $schema;

    public function fetch(string $id): array
    {
        return [
            'post' => $this->post($id),
            'suggestions' => $this->suggestions(),
            'schema' => $this->schema
        ];
    }

    private function post(string &$id)
    {
        $post = Post::with(['author', 'categoryModel', 'thumbnail'])->find($id);
        if (is_null($post)) {
            throw new NotFoundHttpException();
        }
        $this->initSchema($post);
        return $post;
    }

    private function suggestions()
    {
        return (new MainService)->suggestions();
    }

    private function initSchema(Post $post)
    {
        $this->schema = new Schema(
            $post->getAttribute('topic'),
            "Article",
            $post->author->getAttribute('name'),
            $post->thumbnail->url(),
            $post->created_at->toDateTimeString()
        );
    }
}
