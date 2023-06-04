<?php

namespace Database\Factories\Blog;

use App\Models\Blog\Comment;
use App\Models\Blog\CommentReply;
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
        $comments = Comment::all(['id']);
        return [
            'user_id' => 'binkapS',
            'comment_id' => $comments[\random_int(0, ($comments->count() - 1))],
            'body' => \fake()->sentence()
        ];
    }
}
