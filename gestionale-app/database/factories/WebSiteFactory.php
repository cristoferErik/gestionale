<?php

namespace Database\Factories;

use App\Models\Server;
use App\Models\ServiceUpdate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class WebSiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome'=>$this->faker->name(),
            'url'=>$this->faker->url(),
            'costo'=>$this->faker->numberBetween(100,600),
            'date_creation'=>$this->faker->dateTimeThisYear(),
            'service_update'=>$this->faker->boolean(),
            'service_update_id'=>ServiceUpdate::factory(),
            'server_id'=>Server::factory()
        ];
    }
}
