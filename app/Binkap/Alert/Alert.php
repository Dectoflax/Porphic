<?php

namespace App\Binkap\Alert;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Alert
{
    private bool $livewire;

    private Component $component;

    private Type $type;

    public function simple(string $message = null, Mode $mode = Mode::INFO)
    {
        $this->type = Type::SIMPLE;
        $data = new SimpleData;
        $data->addMessage($message);
        $data->addMode($mode);
        $data->build();
        return $this;
    }

    public function overlay(string $message = null, Mode $mode = Mode::INFO)
    {
        $this->type = Type::OVERLAY;
        $data = new OverlayData;
        $data->addMessage($message);
        $data->addMode($mode);
        $data->build();
        return $this;
    }

    public function livewire(Component $component)
    {
        $this->component = $component;
        $this->livewire = true;
        return $this;
    }

    public function alert()
    {
        ($this->livewire) ?
            $this->component->emit($this->type->value)
            : Session::flash($this->type->value);
    }
}
