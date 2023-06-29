<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;

class DraftShell extends Component
{
    // use WithPagination;

    public int $count;

    public function mount()
    {
        $this->count = 20;
    }

    public function render()
    {
        return view('livewire.admin.draft-shell');
    }
}
