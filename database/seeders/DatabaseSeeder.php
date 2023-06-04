<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Blog\Category;
use App\Models\Blog\Comment;
use App\Models\Blog\CommentReply;
use App\Models\Blog\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create();
        Category::factory()->times(5)->create();
        Post::factory()->times(6)->create();
        Comment::factory()->times(5)->create();
        CommentReply::factory()->times(10)->create();
        Admin::factory()->create();
    }
}
