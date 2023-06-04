<?php

namespace Database\Factories\Blog;

use App\Binkap\KeyLength;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'id' => Str::random(KeyLength::CATEGORY),
            'name' => \fake()->unique()->word(),
            'user_id' => Admin::all()[0]->id,
            'description' => \fake()->sentence(),
            'keywords' => \implode(',', \fake()->words(6))
        ];
    }
}
