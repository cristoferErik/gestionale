<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceGrantRequest\StoreServiceGrantRequest;
use App\Http\Requests\ServiceGrantRequest\UpdateServiceGrantRequest;
use App\Models\Customer;
use App\Models\ServiceGrant;
use App\Services\ServiceGrantService;
use Illuminate\Http\Request;

class ServiceGrantController extends Controller
{
    protected $serviceGrantService;
    public function __construct(ServiceGrantService $serviceGrantService)
    {
        $this->serviceGrantService=$serviceGrantService;   
    }
    public function index()
    {
        return $this->serviceGrantService->getServicePaginated(5);
    }
    public function show(ServiceGrant $serviceGrant){
        return $this->serviceGrantService->getService($serviceGrant->id);
    }
    public function update(UpdateServiceGrantRequest $request,ServiceGrant $serviceGrant){
        $serviceGrantUpdate = new ServiceGrant();
        $serviceGrantUpdate->fill($request->all());
        return $this->serviceGrantService->updateService($serviceGrantUpdate,$serviceGrant->id);
    }
    public function store(StoreServiceGrantRequest $serviceGrantRequest){
        $serviceGrant= new ServiceGrant();
        $serviceGrant->fill($serviceGrantRequest->all());
        return $this->serviceGrantService->createService($serviceGrant);
    }
}
