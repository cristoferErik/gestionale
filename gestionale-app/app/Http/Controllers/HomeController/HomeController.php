<?php

namespace App\Http\Controllers\HomeController;

use App\Http\Controllers\Controller;
use App\Services\HomeServices\HomeService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $homeServices;
    public function __construct(HomeService $homeServices){
        $this->homeServices=$homeServices;
    }

    public function getServicesUpdateByCustomer($pag){
        return $this->homeServices->getCustomerServiceWebs($pag);
    }
}
