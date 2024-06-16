<?php

namespace Database\Factories;

use App\Models\ServiceGrant;
use App\Models\ServiceWeb;
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
            'update_period'=>360,
            'date_ini'=>$this->faker->dateTimeThisDecade(),
            'date_end'=>$this->faker->dateTimeThisDecade(),
            'status'=>$status,
            'costo'=>$this->faker->numberBetween(300,1200),
            'service_grant_id'=>ServiceGrant::factory()
        ];
    }
}
