<?php

namespace App\Http\Livewire\Admin\Auth;

use Livewire\Component;

class Logout extends Component
{
    public function logout()
    {
        auth('admin')->logout();
        $this->redirectRoute('admin.login');
    }

    public function render()
    {
        return view('livewire.admin.auth.logout');
    }
}
