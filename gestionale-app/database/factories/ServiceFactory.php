<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    protected $model = Service::class;

    public function definition(): array
    {
        $type = $this->faker->randomElement(['WEB','DESIGN']);
        return [
            'customer_id'=> Customer::factory(),
            'descrizione'=> $this->faker->paragraph,
            'type'=> $type,
            'data_service'=> $this->faker->dateTimeThisDecade(),
        ];
    }
}
