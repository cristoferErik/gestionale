<?php

namespace Database\Factories;

use App\Models\Maintenance;
use App\Models\RecordUpdate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Maintenance>
 */
class MaintenanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'descrizione'=>$this->faker->dateTimeThisYear(),
            'id'=>RecordUpdate::factory(),
        ];
    }
}
