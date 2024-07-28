<?php

namespace Database\Factories;

use App\Models\WebSite;
use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RecordUpdateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $flag=$this->faker->randomElement(["B","M"]);
        
        return [
            'date_record_update'=> $this->faker->date(),
            'type_record_update'=>$flag,
            'description'=>$this->faker->paragraph(),
            'next_update'=>$this->faker->date(),
            'web_site_id'=> WebSite::factory()
        ];
    }
}
