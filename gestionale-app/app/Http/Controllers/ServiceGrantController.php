<?php

namespace App\Http\Controllers;
use App\Services\ServiceGrantServices\ServiceGrantService;

class ServiceGrantController extends Controller
{
    protected $serviceGrantService;
    public function __construct(ServiceGrantService $serviceGrantService)
    {
        $this->serviceGrantService=$serviceGrantService;   
    }
    public function getServiceGrantByCustomer($pag,$CustomerId){
        return $this->serviceGrantService->getServiceGrantByCustomerId($CustomerId,$pag);
    }
}
