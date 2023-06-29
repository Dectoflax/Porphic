<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Binkap\KeyLength;
use App\Models\Admin;
use App\Models\Blog\Category;
use App\Models\Blog\Comment;
use App\Models\Blog\CommentReply;
use App\Models\Blog\Draft;
use App\Models\Blog\Information;
use App\Models\Blog\Post;
use App\Models\Blog\Role;
use App\Models\Media;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::factory()->times(6)->create();
        Admin::factory()->times(5)->create();
        User::factory()->times(20)->create();
        Category::factory()->times(5)->create();
        Information::factory()->create();
        Post::factory()->times(10)->create();
        Draft::factory()->times(10)->create();
        Comment::factory()->times(5)->create();
        CommentReply::factory()->times(10)->create();
        Post::all()->each(function (Post $post) {
            Media::create([
                'id' => $id = Str::random(KeyLength::MEDIA),
                'name' => \fake()->word(),
                'file' => \fake()->imageUrl(),
                'user_id' => Admin::all()->random()->id,
                'description' => \fake()->sentence(),
                'keywords' => implode(',', \fake()->sentences()),
                'type' => 'thumb'
            ]);
            $post->update(['media' => $id]);
        });
        Draft::all()->each(function (Draft $post) {
            Media::create([
                'id' => $id = Str::random(KeyLength::MEDIA),
                'name' => \fake()->word(),
                'file' => \fake()->imageUrl(),
                'user_id' => Admin::all()->random()->id,
                'description' => \fake()->sentence(),
                'keywords' => implode(',', \fake()->sentences()),
                'type' => 'thumb'
            ]);
            $post->update(['media' => $id]);
        });
    }
}
