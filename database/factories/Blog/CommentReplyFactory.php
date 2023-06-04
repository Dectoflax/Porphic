<?php

namespace Database\Factories\Blog;

use App\Models\Blog\Comment;
use App\Models\Blog\CommentReply;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog\CommentReply>
 */
class CommentReplyFactory extends Factory
{

    protected int $myCount = 0;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all(['id'])->random()->id,
            'comment_id' => Comment::all(['id'])->random()->id,
            'body' => \fake()->sentence()
        ];
    }
}
