<?php

namespace App\Binkap\Chart;

use Illuminate\Support\Collection;

class DataSet
{
    private string $title;

    private string $type;

    private Collection $data;

    public function __construct(string $title, string $type, Collection $data)
    {
        $this->title = $title;
        $this->type = $type;
        $this->data = $data;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getData()
    {
        return $this->data;
    }
}
