<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ServiceUpdateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'periodo_aggiornamento'=>30,
            'data_iniziale'=>'2024-07-10',
            'data_finale'=>$this->faker->dateTimeBetween("2024-09-15","2025-07-28")
            //'state';
        ];
    }
}
