<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceGrantRequest\StoreServiceGrantRequest;
use App\Http\Requests\ServiceGrantRequest\UpdateServiceGrantRequest;
use App\Http\Resources\GrantServiceResources\ServiceGrantCollection;
use App\Http\Resources\GrantServiceResources\ServiceGrantResource;
use App\Models\ServiceGrant;
use App\Services\ServiceGrantServices\ServiceGrantService;

class ServiceGrantController extends Controller
{
    protected $serviceGrantService;
    public function __construct(ServiceGrantService $serviceGrantService)
    {
        $this->serviceGrantService=$serviceGrantService;   
    }
    public function index()
    {
        return new ServiceGrantCollection($this->serviceGrantService->getServicePaginated(5));
    }
    public function show(int $id)
    {   
        $listServices=$this->serviceGrantService->getService($id);
        if($listServices){
            //Filter
            $serviceGrantResource = new ServiceGrantResource($listServices);
            return $serviceGrantResource;
        }
        return response()->json(['message'=>'value was not founded!'],404);
    }
    public function update(UpdateServiceGrantRequest $request,int $id)
    {
        $serviceGrantUpdate = new ServiceGrant();
        $serviceGrantUpdate->fill($request->all());
        $flag = $this->serviceGrantService->updateService($serviceGrantUpdate,$id);
        if($flag){
            return response()->json(['message'=>'value was updated successful!'],200); ;
        }
        return response()->json(['message'=>'not found!'],404);
    }
    public function store(StoreServiceGrantRequest $serviceGrantRequest)
    {
        $serviceGrant= new ServiceGrant();
        $serviceGrant->fill($serviceGrantRequest->all());
        $newServiceGrant=$this->serviceGrantService->createService($serviceGrant);
        return $newServiceGrant;
    }
    public function destroy(int $id)
    {
        $flag=$this->serviceGrantService->deleteService($id);
        if($flag==false){
            return response()->json(['message'=>"value couldn't be deleted!"],404);
        }
        return response()->json(['message'=>'value was deleted successful!'],200); ;
    }
}
