<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Travel;
use App\Models\Tour;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tour>
 */
class TourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Tour::class;
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid,
            'travel_id' => Travel::inRandomOrder()->first()->id, 
            'name' => $this->faker->word,
            'starting_date' => $this->faker->date,
            'ending_date' => $this->faker->date,
            'price' => $this->faker->numberBetween(100, 1000),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
