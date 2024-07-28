<?php

namespace Database\Seeders;

use App\Models\Backup;
use App\Models\Customer;
use App\Models\Maintenance;
use App\Models\RecordUpdate;
use App\Models\Server;
use App\Models\ServiceGrant;
use App\Models\ServiceUpdate;
use App\Models\ServiceWeb;
use App\Models\WebSite;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = Customer::factory()
            ->count(2)
            ->create();

        $customers->each(function ($customer) {
            $servers = Server::factory()
                ->for($customer)
                ->create();

            $webSites = WebSite::factory()
                ->for($servers)
                ->count(2)
                ->create();
            
            $webSites->each(function ($webSite) {
                RecordUpdate::factory()
                    ->for($webSite)
                    ->count(2)
                    ->create();
            });
        });
    }
}
