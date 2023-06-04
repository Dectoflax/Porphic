<?php

namespace App\Http\Livewire\Admin\Auth\Password;

use App\Models\Admin;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Livewire\Component;

class ResetForm extends Component
{
    public string $password;

    public string $password_confirmation;

    public string $token;

    public string $email;

    public function mount(array $data)
    {
        $this->token = $data['token'];
        $this->email = $data['email'];
    }

    public function password()
    {
        $this->validate();
        $status = Password::broker('admins')
            ->reset($this->only([
                'password',
                'password_confirmation',
                'email',
                'token'
            ]), function (Admin $user, string $password) {
                $user->forceFill(['password' => Hash::make($password)])
                    ->setRememberToken(Str::random(60));
                $user->save();
                \event(new PasswordReset($user));
            });
        if ($status == Password::PASSWORD_RESET) {
            \dd('Password reset successful, now find a better way of doing this');
        } else {
            \dd('Something went wrong');
        };
    }

    protected function rules()
    {
        return [
            'password' => ['required', 'string', 'min:10', 'confirmed'],
            'password_confirmation' => ['required']
        ];
    }

    public function render()
    {
        return view('livewire.admin.auth.password.reset-form');
    }
}
