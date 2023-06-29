<?php

namespace App\Http\Livewire\Admin;

use App\Models\Blog\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostShell extends Component
{
    // use WithPagination;

    public int $count;

    public function mount()
    {
        $this->count = Post::count();
    }

    public function render()
    {
        return view('livewire.admin.post-shell');
    }
}
