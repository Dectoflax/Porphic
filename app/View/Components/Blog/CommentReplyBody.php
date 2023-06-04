<?php

namespace App\View\Components\Blog;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CommentReplyBody extends Component
{

    public string $reply;
    /**
     * Create a new component instance.
     */
    public function __construct(string $reply)
    {
        $this->reply = $reply;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.blog.comment-reply-body');
    }
}
