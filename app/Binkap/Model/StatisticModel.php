<?php

namespace App\Binkap\Model;

class StatisticModel
{
    private string $name;

    private string $icon;

    private string|int $count;

    public function __construct(string $name, string|int $count, string $icon = 'ri-chat-line')
    {
        $this->name = $name;
        $this->count = $count;
        $this->icon = $icon;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getIcon()
    {
        return $this->icon;
    }

    public function getCount()
    {
        return $this->count;
    }
}
