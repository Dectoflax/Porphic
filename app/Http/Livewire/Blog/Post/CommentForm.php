<?php

namespace App\Http\Livewire\Blog\Post;

use App\Models\Blog\Comment;
use Livewire\Component;

class CommentForm extends Component
{
    public string $postId;

    public string $body;

    public function mount(string $post)
    {
        $this->postId = $post;
    }

    public function create()
    {
        $this->validate();
        Comment::create([
            'user_id' => 'binkapS',
            'post_id' => $this->postId,
            'body' => $this->getPropertyValue('body')
        ]);
        $this->emitUp('comment.created');
    }

    protected function rules()
    {
        return [
            'body' => ['required', 'string']
        ];
    }

    public function render()
    {
        return view('livewire.blog.post.comment-form');
    }
}
