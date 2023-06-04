<?php

namespace Database\Factories\Blog;

use App\Binkap\KeyLength;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => Str::random(KeyLength::ROLE),
            'name' => \fake()->unique()->word(),
            'permissions' => null
        ];
    }
}
