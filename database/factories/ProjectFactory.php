<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id'=>fake()->numberBetween(1,10),
            'client_name'=>fake()->name(),
            'date'=>fake()->date(),
            'title'=>fake()->title(),
            'description'=>fake()->sentence(),
            'link'=>fake()->title(),
            'price'=>fake()->numberBetween(10000,50000),
            'status'=>fake()->randomElement(['pending','success','cancel']),
            'starts_at'=>fake()->date(),
            'ends_at'=>fake()->date(),
        ];
    }
}
