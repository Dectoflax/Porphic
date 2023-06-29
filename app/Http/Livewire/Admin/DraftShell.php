<?php

namespace App\Http\Livewire\Admin;

use App\Models\Blog\Draft;
use Livewire\Component;

class DraftShell extends Component
{
    public int $count;

    public function mount()
    {
        $this->count = Draft::count();
    }

    public function render()
    {
        return view('livewire.admin.draft-shell', ['drafts' => Draft::with('author')->paginate(5)]);
    }
}
