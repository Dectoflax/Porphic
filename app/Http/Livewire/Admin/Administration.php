<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Administration extends Component
{
    public bool $active;

    public function mount(bool $active)
    {
        $this->active = $active;
    }

    public function render()
    {
        return view('livewire.admin.administration');
    }
}
