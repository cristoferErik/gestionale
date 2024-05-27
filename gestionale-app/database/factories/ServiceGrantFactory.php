<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\GrantService;
use App\Models\ServiceGrant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceGrantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    protected $model = ServiceGrant::class;

    public function definition(): array
    {
        $type = $this->faker->randomElement(['WEB','DESIGN']);
        return [
            'customer_id'=> Customer::factory(),
            'descrizione'=> $this->faker->paragraph,
            'data_service'=> $this->faker->dateTimeThisDecade(),
            'service_type'=> $type
        ];
    }

}
