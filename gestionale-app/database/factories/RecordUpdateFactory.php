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
        return [
            'record_date'=> Carbon::createFromFormat('Y-m-d','2024-05-22'),
            'web_site_id'=> WebSite::factory()
        ];
    }
}
