<?php

namespace App\Http\Livewire\Admin;

use App\Models\Admin;
use Livewire\Component;
use Livewire\WithPagination;

class AdminShell extends Component
{
    use WithPagination;

    public int $count;

    public function mount()
    {
        $this->count = Admin::count();
    }

    public function render()
    {
        return view('livewire.admin.admin-shell', ['admins' => Admin::whereNot('id', \auth()->id())->paginate(5)]);
    }
}
