<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest\StoreCustomerRequest;
use App\Http\Requests\CustomerRequest\UpdateCustomerRequest;
use App\Http\Resources\CustomerResources\CustomerCollection;
use App\Http\Resources\CustomerResources\CustomerResource;
use App\Models\Customer;
use App\Services\CustomerServices\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customerService;

    public function __construct(CustomerService $customerService){
        $this->customerService = $customerService;
    }
    public function index(){
        return new CustomerCollection($this->customerService->getCustomerPaginated(5));
    }
    public function show(int $id){
        $customer=$this->customerService->getCustomer($id);
        if($customer!=null){
            return new CustomerResource($customer);
        }
        return response()->json(['message'=>'value was not founded!'],404);
    }
    public function store(StoreCustomerRequest $request){
        $customer= new Customer();
        $customer->fill($request->all());
        return new CustomerResource($this->customerService->createCustomer($customer));
    }
    public function update(UpdateCustomerRequest $request, int $id){
        //La variable $request, ottiene tutti i dati senza il id, e verifica che siano corretti
        //$customer, prende tutti i dati compresso il Id
        $customerUpdate = new Customer();
        $customerUpdate->fill($request->all());
        $flag=$this->customerService->updateCustomer($customerUpdate,$id);
        if($flag){
            return response()->json(['message'=>'value was updated!'],200);
        }
        return response()->json(['message'=>'value was not updated!'],400);
    }
    public function destroy(int $id){
        $this->customerService->deleteCustomer($id);   
    }
}
