<?php

namespace App\Http\Controllers;

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
        return $this->customerService->getCustomerPaginated(5);
    }
    public function show(Customer $customer){
        return $this->customerService->getCustomer($customer);
    }
}
