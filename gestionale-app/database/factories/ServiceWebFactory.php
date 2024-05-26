<?php

namespace Database\Factories;

use App\Models\Server;
use App\Models\Service;
use App\Models\ServiceWeb;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ServiceWebFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = ServiceWeb::class;
    
    public function definition(): array
    {
        $status = $this->faker->randomElement(['A','B','C']);
        return [
            'costo_annuale'=> $this->faker->numberBetween(100,20000),
            'aggiornamento'=> $this->faker->dateTimeThisDecade(),
            'ultimo_bk'=> $this->faker->dateTimeThisDecade(),
            'scadenza'=> $this->faker->dateTimeThisDecade(),
            'gestito'=> $status,
        ];
    }
}
