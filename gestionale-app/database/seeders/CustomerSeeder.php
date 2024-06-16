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
            $serviceGrants = ServiceGrant::factory()
                ->for($customer)
                ->create();
            $serviceUpdates = ServiceUpdate::factory()
                ->for($serviceGrants)
                ->create();
            $serviceWebs = ServiceWeb::factory()
                ->for($serviceGrants)
                ->create();

            $servers = Server::factory()
                ->for($serviceWebs)
                ->create();

            $webSites = WebSite::factory()
                ->for($servers)
                ->for($serviceUpdates)
                ->count(5)
                ->create();

            $webSites->each(function ($webSite) {
                $recordUpdates = RecordUpdate::factory()
                    ->for($webSite)
                    ->count(10)
                    ->create();
                $recordUpdates->each(function ($recordUpdate) {
                    Backup::factory()
                        ->for($recordUpdate)
                        ->create();
                    Maintenance::factory()
                        ->for($recordUpdate)
                        ->create();
                });
            });
        });
    }
}
