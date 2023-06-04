<?php

namespace App\Binkap\Alert;

class OverlayData
{
    private string $message;

    private Mode $mode;

    private function get($key)
    {
        return \session($key);
    }

    public function addMessage(string $message)
    {
        $this->message = $message;
    }

    public function getMessage()
    {
        return $this->get(Type::OVERLAY->value . '.message');
    }

    public function addMode(Mode $mode)
    {
        $this->mode = $mode;
    }

    public function getMode()
    {
        return $this->get(Type::OVERLAY->value . '.mode');
    }

    public function build()
    {
        \session([
            Type::OVERLAY->value . '.message' => $this->message,
            Type::OVERLAY->value . '.mode' => $this->mode
        ]);
    }
}
