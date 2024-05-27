<?php

namespace App\Http\Controllers;

use App\Services\ServiceGrantService;
use Illuminate\Http\Request;

class GrantServiceController extends Controller
{
    protected $grantServiceService;
    public function __construct(ServiceGrantService $grantServiceService)
    {
        $this->grantServiceService=$grantServiceService;   
    }
    public function index(){
        return $this->grantServiceService->getServicePaginated(5);
    }
}
