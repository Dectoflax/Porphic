<?php

namespace App\Http\Livewire\Blog;

use App\Models\Blog\Post;
use Livewire\Component;

class LatestPreview extends Component
{
    public string $postId;

    public string $thumb;

    public string $thumbAlt;

    public string $topic;

    public string $body;

    public string $date;

    public function mount(Post $post)
    {
        $this->postId = $post->getAttribute('id');
        $this->thumb = $post->thumbnail->url();
        $this->thumbAlt = $post->thumbnail->description();
        $this->topic = $post->getAttribute('topic');
        $this->date = $post->created_at->diffForHumans();
        $this->body = \strip_tags(\substr($post->getAttribute('body'), 0, 200) . " ...");
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
        return view('livewire.blog.latest-preview');
    }
}
