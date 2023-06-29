<?php

namespace App\Http\Livewire\Admin;

use App\Models\Blog\Post;
use Livewire\Component;

class PostData extends Component
{
    public string $postId;

    public bool $select;

    public array $keywords;

    public array $postData;

    public bool $show = true;

    protected $listeners = [
        'post.all.selected' => 'select',
        'post.selected.delete' => 'handle',
        'post.delete' => 'delete',
        'alert.confirmation.cancel' => 'cancel'
    ];

    public function mount(Post $post)
    {
        $this->select = false;
        $this->postId = $post->getAttribute('id');
        $this->keywords = \explode(',', $post->getAttribute('keywords'));
        $this->postData = $post->toArray();
    }

    public function select(bool $checked)
    {
        $this->select = $checked;
    }

    public function handle()
    {
    }

    public function delete()
    {
    }

    public function cancel()
    {
        $this->select = false;
    }

    public function render()
    {
        return view('livewire.admin.post-data');
    }
}
