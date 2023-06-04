<?php

namespace App\View\Components\Blog;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Editor extends Component
{
    public string $attribute;

    public string $placeholder;

    public string $height;

    public string $width;
    /**
     * Create a new component instance.
     */
    public function __construct(array|string $data)
    {
        if (is_array($data)) {
            $this->attribute = $data['attribute'];
            $this->placeholder = $data['placeholder'] ?? \ucfirst($this->attribute);
            $this->height = $data['height'] ?? 'h-36';
            $this->width = $data['width'] ?? 'w-full';
        } else {
            $this->attribute = $data;
            $this->setDefaults();
        }
    }

    private function setDefaults()
    {
        $this->placeholder = \ucfirst($this->attribute);
        $this->height = 'h-36';
        $this->width = 'w-full';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.blog.editor');
    }
}
