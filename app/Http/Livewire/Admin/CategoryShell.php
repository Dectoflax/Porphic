<?php

namespace App\Http\Livewire\Admin;

use App\Models\Blog\Category;
use Livewire\Component;

class CategoryShell extends Component
{
    public int $count;

    public function mount()
    {
        $this->count = Category::count();
    }

    public function render()
    {
        return view('livewire.admin.category-shell', ['categories' => Category::with('owner')->paginate(5)]);
    }
}
