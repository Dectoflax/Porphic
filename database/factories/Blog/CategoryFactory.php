<?php

namespace Database\Factories\Blog;

use App\Binkap\Blog\Constants;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => \fake()->unique()->word(),
            'user_id' => Admin::all()->first()->id,
            'description' => \fake()->sentence(),
            'keywords' => \implode(Constants::KEYWORD_SEPARATOR->value, \fake()->words(6))
        ];
    }
}
