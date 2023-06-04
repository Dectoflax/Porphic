<?php

namespace Database\Factories\Blog;

use App\Binkap\Blog\Helper\PostHelper;
use App\Models\Admin;
use App\Models\Blog\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $topic = \fake()->sentence();
        return [
            'id' => PostHelper::topicToId($topic),
            'topic' => $topic,
            'body' => \fake()->sentences(25, true),
            'views' => \random_int(1, 25),
            'category' => Category::all(['name'])->random()->name,
            'user_id' => Admin::all()->random()->id,
            'media' => null,
            'keywords' => \implode(',', fake()->words())
        ];
    }
}
