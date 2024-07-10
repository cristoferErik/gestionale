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

            $serviceWebs = ServiceWeb::factory()
                ->for($serviceGrants)
                ->create();

            $servers = Server::factory()
                ->for($serviceWebs)
                ->create();

            $webSites = WebSite::factory()
                ->for($servers)
                ->count(2)
                ->create();

            $webSites->each(function ($webSite) {
                $serviceUpdate = ServiceUpdate::factory()->create();
                $webSite->service_update_id = $serviceUpdate->id;
                $webSite->save();
                $recordUpdates = RecordUpdate::factory()
                    ->for($webSite)
                    ->count(2)
                    ->create();
                $recordUpdates->each(function ($recordUpdate, $index) {
                    if ($index < 1) {
                        Backup::factory()
                            ->for($recordUpdate)
                            ->create();
                    } else {
                        Maintenance::factory()
                            ->for($recordUpdate)
                            ->create();
                    }
                });
            });
        });
    }
}
