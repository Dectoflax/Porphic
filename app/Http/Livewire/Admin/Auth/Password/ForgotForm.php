<?php

namespace App\Http\Livewire\Admin\Auth\Password;

use App\Models\Admin;
use Illuminate\Support\Facades\Password;
use Livewire\Component;

use function Binkap\Laraflash\alert;
use function Binkap\Laraflash\flash;

class ForgotForm extends Component
{
    public string $email;

    public function send()
    {
        $this->validate();
        match (Password::broker('admins')
            ->sendResetLink($this->only(['email']))) {
            Password::RESET_LINK_SENT => alert(message: 'Password reset link sent')->livewire($this)->overlay()->success(),
            Password::RESET_THROTTLED => alert(message: 'Link already sent')->livewire($this)->warn()->overlay(),
            default => flash('Something went wrong')->error()->overlay()->livewire($this)
        };
    }

    protected function rules()
    {
        return [
            'email' => ['required', 'email', 'exists:admins,email']
        ];
    }

    public function render()
    {
        return view('livewire.admin.auth.password.forgot-form');
    }
}
