<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'title'=>fake()->title(),
            'description'=>fake()->sentence(),
            'category_id'=>fake()->numberBetween(1,10),
            'user_id'=>fake()->numberBetween(1,10),
            'date'=>fake()->date(),
            'image'=>fake()->imageUrl,
        ];
    }
}
