<?php

namespace App\Http\Livewire\Admin;

use App\Binkap\Alert\Alert;
use App\Binkap\Alert\Mode;
use App\Jobs\Admin\Invitation;
use App\Models\Admin\Invitation as AdminInvitation;
use App\Models\Blog\Role;
use Illuminate\Support\Str;
use Livewire\Component;

class Invite extends Component
{
    public bool $open = false;

    public string $email;

    public string $role;

    public array $roles = [
        null => 'Select role'
    ];

    protected $listeners = [
        'admin.invite.toggle' => 'toggle'
    ];

    public function mount()
    {
        // Role::all()->each(function(){

        // });
    }

    public function toggle()
    {
        $this->open = !$this->open;
    }

    public function invite()
    {
        $this->validate();
        $invite = AdminInvitation::create([
            'email' => $this->getPropertyValue('email'),
            'role' => $this->getPropertyValue('role'),
            'user_id' => \auth()->id(),
            'id' => Str::uuid()
        ]);
        \dispatch(new Invitation($invite));
        $this->toggle();
        \alert(\flash()->simple('Admin invited successfully', Mode::SUCCESS)->livewire($this));
    }

    protected function rules()
    {
        return [
            'email' => ['required', 'email', 'unique:admins,email'],
            'role' => 'required'
        ];
    }

    public function render()
    {
        return view('livewire.admin.invite');
    }
}
