<?php

namespace App\Http\Livewire\Admin;

use App\Binkap\Storage;
use App\Models\Admin;
use Illuminate\Support\Str;
use Livewire\Component;

use function Binkap\Laraflash\alert;

class AdminData extends Component
{
    public string $adminId;

    public bool $select;

    public array $adminData;

    public string $avatar;

    public bool $show = true;

    public string $ownerships = '';

    protected $listeners = [
        'admin.all.selected' => 'select',
        'admin.selected.delete' => 'handle',
        'admin.delete' => 'delete',
        'alert.confirmation.cancel' => 'cancel'
    ];

    public function mount(Admin $admin)
    {
        $this->select = false;
        $this->avatar = $admin->avatar();
        $this->adminId = $admin->getAttribute('id');
        $this->adminData = $admin->toArray();
    }

    public function cancel()
    {
        $this->select = \false;
    }

    public function handle()
    {
        if ($this->select == true) {
            if ($this->execDelete()) {
                $this->show = false;
            };
        }
    }

    public function delete(string $flash)
    {
        if ($flash == $this->adminId) {
            if ($this->execDelete()) {
                $this->show = false;
                alert()->simple()->message('Account deleted successfully')->livewire($this);
            };
        }
    }

    public function select(bool $checked)
    {
        $this->select = $checked;
    }

    private function execDelete()
    {
        if (!is_null($admin = Admin::find($this->adminId))) {
            if ($admin->getAttribute('id') == \auth()->id()) {
                alert()->message('Attempt to delete your account failed')->error()->livewire($this);
                return;
            }
            if (!$this->authenticateDelete($admin)) {
                alert()->overlay()->message("({$admin->getAttribute('name')})'s account has ownership of {$this->ownerships}, transfer them delete to successfully delete account")->warn()->livewire($this);
                return;
            }
            Storage::delete($admin->getAttribute('avatar'));
            $admin->delete();
            return true;
        }
        return false;
    }

    public function authenticateDelete(Admin $admin)
    {
        $return = true;
        $this->ownerships = '';
        if (($count = $admin->categories()->count()) > 0) {
            $this->ownerships .= "{$count} " . Str::plural('category', $count);
            $return = false;
        }
        if (($count = $admin->posts()->count()) > 0) {
            $this->ownerships .= "{$count} " . Str::plural('post', $count);
            $return = false;
        }
        if (($count = $admin->drafts()->count()) > 0) {
            $this->ownerships .= "{$count} " . Str::plural('draft', $count);
            $return = false;
        }
        return $return;
    }

    public function render()
    {
        return view('livewire.admin.admin-data');
    }
}
