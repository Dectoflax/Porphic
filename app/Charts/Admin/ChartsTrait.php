<?php

namespace App\Charts\Admin;

use App\Binkap\Chart\DataSet;
use Illuminate\Support\Collection;

trait ChartsTrait
{
    public function init(Collection $labels, DataSet $dataset, int $h = null, string $type = null)
    {
        $this->loader(\config('charts.loader'));
        $this->loaderColor(\config('charts.loader_color'));
        if (!\is_null($h)) {
            $this->height($h);
        }
        if (!\is_null($type)) {
            $this->type($type);
        }
        $this->labels($labels);
        $this->dataset($dataset->getTitle(), $dataset->getType(), $dataset->getData());
    }
}
