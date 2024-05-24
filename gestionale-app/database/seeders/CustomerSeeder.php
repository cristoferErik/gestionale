<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Server;
use App\Models\Service;
use App\Models\Web;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::factory()
        ->count(20)
        ->has(
            Service::factory()
            ->count(1)
            ->has(
                Web::factory()
                ->count(2)
                ->has(
                    Server::factory()
                    ->count(1)
                )
            )
        )
        ->create();
    }
}
