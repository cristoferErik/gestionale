<?php

namespace Database\Factories;

use App\Models\Server;
use App\Models\Web;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ServerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model=Server::class;
    public function definition(): array
    {
        return [
            'server_url'=> $this->faker->company(),
            'panello_url'=> 'c_panel',
            'utente'=>$this->faker->userName(),
            'password'=>$this->faker->password(),
            'web_id'=> Web::factory()
        ];
    }
}
