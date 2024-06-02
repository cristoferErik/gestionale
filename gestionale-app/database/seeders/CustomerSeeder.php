<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Server;
use App\Models\ServiceGrant;
use App\Models\ServiceWeb;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::factory()
            ->count(2)
            ->create();
    }
}
