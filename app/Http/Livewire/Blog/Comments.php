<?php

namespace App\Http\Livewire\Blog;

use App\Models\Blog\Comment;
use Livewire\Component;

class Comments extends Component
{
    public string $postId;

    public array $toPass = [];

    public int $count;

    protected $listeners = ['comment.created' => 'comments'];

    public function mount(string $post)
    {
        $this->postId = $post;
    }

    public function comments()
    {
        $comments = Comment::with(['user', 'replies'])->where('post_id', $this->postId)->get();
        $this->toPass = [];
        $comments->each(function (Comment $comment) {
            $this->toPass[] = [
                'id' => $comment->getAttribute('id'),
                'name' => $comment->user->getAttribute('name'),
                'date' => $comment->created_at->toDateString(),
                'body' => $comment->getAttribute('body'),
                'replies' => $comment->replies
            ];
        });
        $this->count = $comments->count();
    }

    public function render()
    {
        return view('livewire.blog.comments');
    }
}
