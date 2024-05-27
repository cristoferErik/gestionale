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
        $customer = Customer::factory()
            ->count(2)
            ->create();
        $customer->each(function ($customer) {
            #Creamo dei servizi
            $service = ServiceGrant::factory()
                ->count(3)
                ->create(['customer_id' => $customer->id]);
            #iteriamo su ogni servizi e i relazionamo con ogni servizeWeb
            $service->each(function ($service) {
                if ($service->service_type === 'WEB') {
                    $serviceWeb = ServiceWeb::factory()->create(['service_grants_id' => $service->id]);
                    
                    #iteramo su ogni servizi web e i relazionamo con ogni server
                    $serviceWeb->each(function ($serviceWeb) {
                        Server::factory()->count(2)->create(['service_web_id' => $serviceWeb->id]);
                    });
                }
            });
        });
    }
}
