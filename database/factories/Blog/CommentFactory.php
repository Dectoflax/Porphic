<?php

namespace Database\Factories\Blog;

use App\Models\Blog\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all(['id'])->random()->id,
            'post_id' => Post::all(['id'])->random()->id,
            'body' => \fake()->sentence(10)
        ];
    }
}
