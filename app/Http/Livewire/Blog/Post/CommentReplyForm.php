<?php

namespace App\Http\Livewire\Blog\Post;

use App\Models\Blog\CommentReply;
use Livewire\Component;

class CommentReplyForm extends Component
{
    public string $commentId;

    public string $body;

    public function mount(string $comment)
    {
        $this->commentId = $comment;
    }

    public function create()
    {
        $this->validate();
        $reply = CommentReply::create([
            'user_id' => 'binkapS',
            'comment_id' => $this->commentId,
            'body' => $this->getPropertyValue('body')
        ]);
        $this->emitUp('comment.replied', $reply->getAttribute('id'));
    }

    protected function rules()
    {
        return [
            'body' => ['required', 'string']
        ];
    }
    public function render()
    {
        return view('livewire.blog.post.comment-reply-form');
    }
}
