<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Confirmation extends Component
{
    public bool $visible = true;

    protected $listeners = [
        'admin.confirmation' => 'confirm'
    ];

    public function confirm(array $options)
    {
        \dd($options);
        $this->visible = false;
        $this->emit($options['event'], $options['params'] ?? null);
    }

    public function render()
    {
        return view('livewire.admin.confirmation');
    }
}
