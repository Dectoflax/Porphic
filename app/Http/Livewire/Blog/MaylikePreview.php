<?php

namespace App\Http\Livewire\Blog;

use App\Models\Blog\Post;
use Livewire\Component;

class MaylikePreview extends Component
{
    public string $postId;

    public string $topic;

    public string $preview;

    public function mount(Post $post)
    {
        $this->postId = $post->getAttribute('id');
        $this->topic = $post->getAttribute('topic');
        $this->preview = \strip_tags(\substr($post->getAttribute('body'), 0, 100)) . " ...";
    }

    public function read()
    {
        $post = Post::find($this->postId);
        $post->update([
            'views' => ++$post->views
        ]);
        $this->redirectRoute('blog.post', ['post' => $post]);
    }

    public function render()
    {
        return view('livewire.blog.maylike-preview');
    }
}
