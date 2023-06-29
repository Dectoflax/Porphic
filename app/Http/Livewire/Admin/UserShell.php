<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class UserShell extends Component
{
    public int $count;

    public function mount()
    {
        $this->count = User::count();
    }

    public function render()
    {
        return view('livewire.admin.user-shell', ['users' => User::paginate(5, pageName: 'users')]);
    }
}
