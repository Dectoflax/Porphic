<?php

namespace App\Http\Livewire\Admin;

use App\Binkap\Alert\Mode;
use App\Models\Blog\Category;
use Livewire\Component;

class CategoryData extends Component
{
    public string $categoryId;

    public bool $select;

    public array $categoryData;

    public array $keywords;

    public bool $show = true;

    protected $listeners = [
        'category.all.selected' => 'select',
        'category.selected.delete' => 'handle',
        'category.delete' => 'delete',
        'alert.confirmation.cancel' => 'cancel'
    ];

    public function mount(Category $category)
    {
        $this->select = false;
        $this->categoryId = $category->getAttribute('id');
        $this->keywords = \explode(',', $category->getAttribute('keywords'));
        $this->categoryData = $category->toArray();
    }

    public function cancel()
    {
        $this->select = \false;
    }

    public function handle()
    {
        if ($this->select) {
            if (!is_null($category = Category::find($this->categoryData['name']))) {
                $this->handlePreDelete($category);
                $category->delete();
            }
            $this->show = false;
        }
    }

    public function delete(string $categoryId)
    {
        if ($categoryId == $this->categoryId) {
            if (!is_null($category = Category::find($this->categoryData['name']))) {
                $this->handlePreDelete($category);
                $category->delete();
            }
            $this->show = false;
            \alert(\flash()->simple('Category deleted successfully', Mode::SUCCESS)->livewire($this));
        }
    }

    private function handlePreDelete(Category $category)
    {
        // todo
        // Ensure to take case of posts under the category here first
    }

    public function select(bool $checked)
    {
        $this->select = $checked;
    }

    public function render()
    {
        return view('livewire.admin.category-data');
    }
}
