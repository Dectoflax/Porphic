<?php

namespace App\Http\Livewire\Admin\Secret;

use Livewire\Component;

class Login extends Component
{
    public function admin()
    {
        $this->redirectRoute('admin.login');
    }

    public function render()
    {
        return view('livewire.admin.secret.login');
    }
}
