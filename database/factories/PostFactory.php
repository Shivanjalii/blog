<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
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
        $title = $this->faker->sentence();
        return [
            'title' => $title,
            'content' => $this->faker->paragraphs(3, true),
            'slug' => Str::slug($title) . '-' . Str::random(5),
            'user_id' => $this->faker->numberBetween(1, 10), // assume you have users with id 1–10
        ];
    }
}
