<?php

namespace App\Http\Livewire\Admin;

use App\Models\Blog\Post;
use Livewire\Component;

class PostShell extends Component
{
    public int $count;

    public function mount()
    {
        $this->count = Post::count();
    }

    public function render()
    {
        return view('livewire.admin.post-shell', ['posts' => Post::with('author')->paginate(5)]);
    }
}
