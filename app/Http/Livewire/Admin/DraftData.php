<?php

namespace App\Http\Livewire\Admin;

use App\Models\Blog\Draft;
use Livewire\Component;

class DraftData extends Component
{
    public string $draftId;

    public bool $select;

    public array $keywords;

    public array $draftData;

    public bool $show = true;

    protected $listeners = [
        'draft.all.selected' => 'select',
        'draft.selected.delete' => 'handle',
        'draft.delete' => 'delete',
        'alert.confirmation.cancel' => 'cancel'
    ];


    public function mount(Draft $draft)
    {
        $this->select = false;
        $this->draftId = $draft->getAttribute('id');
        $this->keywords = \explode(',', $draft->getAttribute('keywords'));
        $this->draftData = $draft->toArray();
    }

    public function select(bool $checked)
    {
        $this->select = $checked;
    }

    public function handle()
    {
    }

    public function delete()
    {
    }

    public function cancel()
    {
        $this->select = false;
    }

    public function render()
    {
        return view('livewire.admin.draft-data');
    }
}
