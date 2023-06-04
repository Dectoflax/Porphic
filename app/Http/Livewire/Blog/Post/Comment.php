<?php

namespace App\Http\Livewire\Blog\Post;

use App\Models\Blog\CommentReply;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Comment extends Component
{
    public string $commentId;

    public string $name;

    public string $date;

    public string $body;

    public array $replies = [];

    protected $listeners = ['comment.replied' => 'handle'];

    public $updated;

    public function mount(array $comment)
    {
        $this->commentId = $comment['id'];
        $this->name = $comment['name'];
        $this->date = $comment['date'];
        $this->body = $comment['body'];
        $comment['replies']->each(function (CommentReply $reply) {
            $this->replies[] = [
                'user' => $reply->user,
                'id' => $reply->getAttribute('id'),
                'body' => $reply->getAttribute('body'),
                'date' => $reply->created_at->toDateString()

            ];
        });
    }

    public function handle(string $replyId)
    {
        $reply = CommentReply::find($replyId);
        $this->replies[] = [
            'user' => $reply->user,
            'id' => $reply->getAttribute('id'),
            'body' => $reply->getAttribute('body'),
            'date' => $reply->created_at->toDateString()
        ];
        $this->updated = !$this->updated;
    }

    public function render()
    {
        return view('livewire.blog.post.comment');
    }
}
