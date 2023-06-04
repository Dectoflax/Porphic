<?php

namespace App\Http\Livewire\Alert;

use App\Binkap\Alert\OverlayData;
use Livewire\Component;

class Overlay extends Component
{
    public bool $visible = false;

    protected $listeners = [
        'alert.overlay.alert' => 'alert'
    ];

    public string|null $message;

    public string|null $header;

    public string|null $color;

    public string $icon;

    public array $data;

    public function alert(OverlayData $data)
    {
        $this->message = $data->getMessage();
        $this->header = $data->getMode()->name;
        $this->{$data->getMode()->value}();
        $this->visible = true;
    }

    private function info()
    {
        $this->color = 'blue';
        $this->icon = 'ri-information-fill';
    }

    private function success()
    {
        $this->color = 'emerald';
        $this->icon = 'ri-checkbox-circle-fill';
    }

    private function warning()
    {
        $this->color = 'yellow';
        $this->icon = 'ri-alarm-warning-fill';
    }

    private function error()
    {
        $this->color = 'red';
        $this->icon = 'ri-close-circle-fill';
    }

    public function render()
    {
        return view('livewire.alert.overlay');
    }
}
