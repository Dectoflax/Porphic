<?php

namespace App\Binkap\Alert;

class SimpleData
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
        return $this->get(Type::SIMPLE->value . '.message');
    }

    public function addMode(Mode $mode)
    {
        $this->mode = $mode;
    }

    public function getMode()
    {
        return $this->get(Type::SIMPLE->value . '.mode');
    }

    public function build()
    {
        \session([
            Type::SIMPLE->value . '.message' => $this->message,
            Type::SIMPLE->value . '.mode' => $this->mode
        ]);
    }
}
