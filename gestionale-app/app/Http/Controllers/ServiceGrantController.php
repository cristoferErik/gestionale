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
    public function show(ServiceGrant $serviceGrant)
    {
        return $this->serviceGrantService->getService($serviceGrant->id);
    }
    public function update(UpdateServiceGrantRequest $request,int $id)
    {
        $serviceGrantUpdate = new ServiceGrant();
        $serviceGrantUpdate->fill($request->all());
        $flag = $this->serviceGrantService->updateService($serviceGrantUpdate,$id);
        if($flag){
            return response()->json(['status'=>'ok','message'=>'value was updated successful!']); ;
        }
        return response()->json(['status'=>'ok','message'=>'value cannot be updated because it doesnt exist!']);
    }
    public function store(StoreServiceGrantRequest $serviceGrantRequest)
    {
        $serviceGrant= new ServiceGrant();
        $serviceGrant->fill($serviceGrantRequest->all());
        return $this->serviceGrantService->createService($serviceGrant);
    }
    public function destroy(int $id)
    {
        $flag=$this->serviceGrantService->deleteService($id);
        if($flag==false){
            return response()->json(['status'=>'ok','message'=>'value can be deleted because it doesnt exist!']);
        }
        return response()->json(['status'=>'ok','message'=>'value was deleted successful!']); ;
    }
}
