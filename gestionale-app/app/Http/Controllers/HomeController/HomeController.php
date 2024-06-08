<?php

namespace App\Http\Controllers\HomeController;

use App\Http\Controllers\Controller;
use App\Services\CustomerTypeOfServices\CustomerTypeOfServices;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $customerTypeOfServices;

    public function __construct(CustomerTypeOfServices $customerTypeOfServices)
    {
        $this->customerTypeOfServices=$customerTypeOfServices;
    }

    public function getServicesUpdateByCustomer(int $pag){
        return $this->customerTypeOfServices->getServicesOfUpdateByCustomer($pag);
    }
}
