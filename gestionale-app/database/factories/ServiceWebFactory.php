<?php

namespace Database\Factories;

use App\Models\ServiceGrant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceWeb>
 */
class ServiceWebFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'costo_totale'=>$this->faker->numberBetween(100,1000),
            'id'=>ServiceGrant::factory()
        ];
    }
}
