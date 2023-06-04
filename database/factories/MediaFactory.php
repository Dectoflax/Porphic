<?php

namespace Database\Factories;

use App\Binkap\KeyLength;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => Str::random(KeyLength::MEDIA),
            'name' => \fake()->word(),
            'file' => \fake()->imageUrl(),
            'user_id' => Admin::all()->random(),
            'description' => \fake()->sentence(),
            'keywords' => implode(',', \fake()->sentences()),
            'type' => 'thumb'
        ];
    }
}
