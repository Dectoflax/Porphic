<?php

namespace App\Http\Livewire\Admin;

use App\Binkap\Alert\Mode;
use App\Binkap\Storage;
use App\Models\User;
use Livewire\Component;

class UserData extends Component
{
    public string $userId;

    public bool $select;

    public array $userData;

    public string $avatar;

    public bool $show = true;

    public bool $verified;

    protected $listeners = [
        'user.all.selected' => 'select',
        'user.selected.delete' => 'handle',
        'user.delete' => 'delete',
        'alert.confirmation.cancel' => 'cancel'
    ];

    public function mount(User $user)
    {
        $this->select = false;
        $this->avatar = $user->avatar();
        $this->userId = $user->getAttribute('id');
        $this->userData = $user->toArray();
        $this->verified = $user->hasVerifiedEmail();
    }

    public function handle()
    {
        if ($this->select) {
            if (!is_null($user = User::find($this->userId))) {
                Storage::delete($user->getAttribute('avatar'));
                $user->delete();
            }
            $this->show = false;
        }
    }

    public function cancel()
    {
        $this->select = \false;
    }

    public function delete(string $flash)
    {
        if ($flash == $this->userId) {
            if (!is_null($user = User::find($this->userId))) {
                Storage::delete($user->getAttribute('avatar'));
                $user->delete();
            }
            $this->show = false;
            \alert(\flash()->simple('Account deleted successfully', Mode::SUCCESS)->livewire($this));
        }
    }

    public function select(bool $checked)
    {
        $this->select = $checked;
    }

    public function render()
    {
        return view('livewire.admin.user-data');
    }
}
