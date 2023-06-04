<?php

namespace App\Http\Livewire\Alert;

use Livewire\Component;

class Confirmation extends Component
{
    public bool $visible = false;

    protected $listeners = [
        'alert.confirmation' => 'confirm'
    ];

    public string $event = '';

    public mixed $params = null;

    public string $message = '';

    public function confirm(string $options)
    {
        $options = \parseEventParam($options, true);
        $this->message = $options->message;
        $this->event = $options->event;
        $this->params = $options->params ?? '';
        $this->visible = true;
    }

    public function cancel()
    {
        $this->emit('alert.confirmation.cancel');
        $this->reset();
    }

    public function confirmed()
    {
        $this->visible = false;
        $this->emit($this->event, $this->params);
    }

    public function render()
    {
        return view('livewire.alert.confirmation');
    }
}
