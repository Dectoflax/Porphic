<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Services\Blog\CategoryService;
use App\Models\Blog\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(CategoryService $categoryService, Category $category)
    {
        return \view('blog.category', ['category' => $category], $categoryService->fetch($category->getAttribute('name')));
    }
}
