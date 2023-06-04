<?php

namespace App\Http\Livewire\Admin;

use App\Binkap\Admin\SearchModel;
use App\Models\Admin;
use App\Models\Blog\Category;
use App\Models\Blog\Post;
use App\Models\User;
use Illuminate\Support\Collection;
use Livewire\Component;

class Search extends Component
{
    public string $search = '';

    public bool $searchVisible = false;

    private Collection|array $posts = [];

    private Collection|array $admins = [];

    private Collection|array $users = [];

    private Collection|array $categories = [];

    public function mount()
    {
        $this->users = \collect();
        $this->posts = \collect();
        $this->admins = \collect();
        $this->categories = \collect();
    }

    public function search()
    {
        $this->mount();
        if ($this->getPropertyValue('search') !== '') {
            $this->loadPosts();
            $this->loadAdmins();
            $this->loadUsers();
            $this->loadCategories();
            $this->searchVisible = true;
            return;
        }
        $this->searchVisible = false;
    }

    private function loadPosts()
    {
        foreach (Post::all(['topic']) as $post) {
            if (\str_contains($topic = $post->getAttribute('topic'), $this->getPropertyValue('search'))) {
                $this->posts->push(new SearchModel(['name' => \substr($topic, 0, 10) . '...', 'uri' => 'post']));
            }
        }
    }

    private function loadAdmins()
    {
        foreach (Admin::all(['name', 'username']) as $admin) {
            if (\str_contains($name = $admin->getAttribute('name'), $this->getPropertyValue('search'))) {
                $this->users->push(new SearchModel(['name' => "@{$admin->getAttribute('username')}", 'uri' => 'users']));
            }
        }
    }

    private function loadUsers()
    {
        foreach (User::all(['name', 'username']) as $user) {
            if (\str_contains($name = $user->getAttribute('name'), $this->getPropertyValue('search'))) {
                $this->users->push(new SearchModel(['name' => "@{$user->getAttribute('username')}", 'uri' => 'users']));
            }
        }
    }

    private function loadCategories()
    {
        foreach (Category::all(['name']) as $post) {
            if (\str_contains($name = $post->getAttribute('name'), $this->getPropertyValue('search'))) {
                $this->categories->push(new SearchModel(['name' => \substr($name, 0, 10) . '...', 'uri' => 'post']));
            }
        }
    }


    public function render()
    {
        return view('livewire.admin.search', [
            'admins' => $this->admins,
            'posts' => $this->posts,
            'users' => $this->users,
            'categories' => $this->categories
        ]);
    }
}
