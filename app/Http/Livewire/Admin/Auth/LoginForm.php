<?php

namespace App\Http\Livewire\Admin\Auth;

use App\Binkap\Alert\Mode;
use Livewire\Component;

use function Binkap\Laraflash\alert;

class LoginForm extends Component
{
    public string $email;

    public string $password;

    public bool $remember = \false;

    public function login()
    {
        $this->validate();
        if (\auth('admin')->attempt($this->only(['email', 'password']), $this->remember)) {
            return $this->redirectRoute('admin.stat');
        }
        alert()->message('Invalid email or password')->warn()->livewire($this);
    }

    protected function rules()
    {
        return [
            'email' => ['required', 'email', 'exists:admins,email'],
            'password' => ['required']
        ];
    }

    public function render()
    {
        return view('livewire.admin.auth.login-form');
    }
}
