<?php

namespace App\Repositories\BasicRepositories;


use Illuminate\Support\Facades\DB;

class ServiceGrantRepository
{

    public function getServiceGrantByCustomerId($customerId, $pag)
    {
        $service = DB::table('service_grants')
        ->join('service_webs','service_webs.id','service_grants.id')
            ->select(
                'service_grants.id as serviceId',
                'service_grants.descrizione as descrizione',
                'service_grants.data_service as dataService'
                
            )
            ->where('service_grants.customer_id', $customerId)
            ->paginate($pag);
        return $service;
    }
}
