<?php

namespace App\View\Components\Blog;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CommentBody extends Component
{
    public string $comment;
    /**
     * Create a new component instance.
     */
    public function __construct(string $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.blog.comment-body');
    }
}
