<?php

namespace App\View\Components\Blog;

use App\Models\Blog\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Header extends Component
{
    public Collection $categories;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->categories = Category::all(['id', 'name']);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.blog.header');
    }
}
