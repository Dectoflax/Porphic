<?php

namespace App\Http\Livewire\Blog\Post;

use Livewire\Component;

class CommentReply extends Component
{
    public string $replyId;

    public string $name;

    public string $date;

    public string $body;

    public function mount(array $reply)
    {
        $this->replyId = $reply['id'];
        $this->name = $reply['user']['name'];
        $this->date = $reply['date'];
        $this->body = $reply['body'];
    }
    public function render()
    {
        return view('livewire.blog.post.comment-reply');
    }
}
