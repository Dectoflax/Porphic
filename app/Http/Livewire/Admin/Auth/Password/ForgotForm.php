<?php

namespace App\Http\Livewire\Admin\Auth\Password;

use App\Binkap\Alert\Mode;
use App\Models\Admin;
use Illuminate\Support\Facades\Password;
use Livewire\Component;

class ForgotForm extends Component
{
    public string $email;

    public function send()
    {
        $this->validate();
        match (Password::broker('admins')
            ->sendResetLink($this->only(['email']))) {
            Password::RESET_LINK_SENT => \alert(\flash()->overlay('Password reset link sent')->livewire($this)),
            Password::RESET_THROTTLED => \alert(\flash()->overlay('Link already sent', Mode::WARNING)->livewire($this)),
            default => \alert(\flash()->simple('Something went wrong', Mode::ERROR)->livewire($this))
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
