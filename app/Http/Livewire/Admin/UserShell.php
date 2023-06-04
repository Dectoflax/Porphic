<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserShell extends Component
{
    use WithPagination;

    public int $count;

    public function mount()
    {
        $this->count = User::count();
    }

    public function render()
    {
        return view('livewire.admin.user-shell', ['users' => User::paginate(5)]);
    }
}
