<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceGrant>
 */
class ServiceGrantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'descrizione'=>$this->faker->paragraph(),
            'data_service'=>$this->faker->dateTimeThisYear(),
            'customer_id'=>Customer::factory()
        ];
    }
}
