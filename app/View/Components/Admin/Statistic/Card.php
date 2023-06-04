<?php

namespace App\View\Components\Admin\Statistic;

use App\Binkap\Model\StatisticModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public StatisticModel $model;
    /**
     * Create a new component instance.
     */
    public function __construct(StatisticModel $model)
    {
        $this->model = $model; //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.statistic.card');
    }
}
