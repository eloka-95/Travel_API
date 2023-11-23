<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Travel;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Travel>
 */
class TravelFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Travel::class;
    public function definition(): array
    {
        return [
            'name' => fake()->text(10),
            'is_public' => fake()->boolean(),
            'description' => fake()->text(100),
            'number_of_days' => rand(1, 10)
        ];
    }
}
