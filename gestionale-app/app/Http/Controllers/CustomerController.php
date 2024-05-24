<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest\StoreCustomerRequest;
use App\Http\Resources\CustomerResources\CustomerCollection;
use App\Http\Resources\CustomerResources\CustomerResource;
use App\Models\Customer;
use App\Services\CustomerService;
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
    public function show(Customer $customer){
        return new CustomerResource($this->customerService->getCustomer($customer));
    }
    public function store(StoreCustomerRequest $request){
        $customer= new Customer();
        $customer->fill($request->all());
        return new CustomerResource($this->customerService->createCustomer($customer));
    }
}
