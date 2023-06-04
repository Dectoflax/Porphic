<?php

namespace Database\Factories\Blog;

use App\Binkap\KeyLength;
use App\Models\Blog\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = Category::all(['id']);
        return [
            'id' => Str::random(KeyLength::POST),
            'topic' => \fake()->sentence(),
            'body' => \fake()->sentences(25, true),
            'thumb' => null,
            'views' => \random_int(1, 25),
            'category' => $categories[\random_int(0, ($categories->count() - 1))],
            'user_id' => 'binkapS'
        ];
    }
}
