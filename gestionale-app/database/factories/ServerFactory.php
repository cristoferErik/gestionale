<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\ServiceWeb;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Server>
 */
class ServerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'server_url'=>$this->faker->url(),
            'panello_url'=>$this->faker->url(),
            'utente'=>$this->faker->userName(),
            'password'=>$this->faker->password(),
            'customer_id'=>Customer::factory()
        ];
    }
}
