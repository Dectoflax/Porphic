<?php

namespace App\Binkap\Admin;

use Livewire\Wireable;

class SearchModel implements Wireable
{
    private array $items;

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function toLivewire()
    {
        return $this->items;
    }

    public static function fromLivewire($value)
    {
        return new static($value);
    }

    public function getUri()
    {
        return $this->items['uri'];
    }

    public function getName()
    {
        return $this->items['name'];
    }
}
