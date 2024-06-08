<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Customer::class;

    public function definition(): array
    {
        
        return [
            'name' => $this->faker->name(),
            'descrizione' => $this->faker->paragraph(),
            'citta' => $this->faker->city(),
            'email'=>$this->faker->email(),
            'address'=>$this->faker->address(),
            'cellphone'=>$this->faker->phoneNumber()
        ];
    }
}
