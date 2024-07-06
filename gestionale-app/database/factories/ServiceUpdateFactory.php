<?php

namespace Database\Factories;

use App\Models\ServiceGrant;
use App\Models\ServiceWeb;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceUpdate>
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
        $status=$this->faker->randomElement([true,false]);
        return [
            'update_period'=>30,
            'date_ini'=> Carbon::createFromFormat('Y-m-d','2024-01-25'),
            'date_end'=>Carbon::createFromFormat('Y-m-d','2025-01-25'),
            'status'=>$status,
            'costo'=>$this->faker->numberBetween(300,1200),
        ];
    }
}
