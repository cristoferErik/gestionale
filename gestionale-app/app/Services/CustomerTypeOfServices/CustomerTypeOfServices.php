<?php
namespace App\Services\CustomerTypeOfServices;

use App\Models\ServiceWeb;
use App\Models\WebSite;
use App\Repositories\BasicRepositoriesFile\CustomerRepository;
use App\Repositories\BasicRepositoriesFile\ServiceGrantRepository;
use App\Repositories\BasicRepositoriesFile\ServiceWebRepository;
use App\Repositories\BasicRepositoriesFile\WebSiteRepository;

class CustomerTypeOfServices implements CustomerTypeOfServiceInterface{
    private $customerRepository;
    private $serviceGrantRepository;
    private $serviceWebRepository;
    private $webSiteRepository;

    public function __construct(
        CustomerRepository $customerRepository,
        ServiceGrantRepository $serviceGrantRepository,
        ServiceWebRepository $serviceWebRepository,
        WebSiteRepository $webSiteRepository
        )
    {   
        $this->customerRepository = $customerRepository;
        $this->serviceGrantRepository = $serviceGrantRepository;
        $this->serviceWebRepository = $serviceWebRepository;
        $this->webSiteRepository = $webSiteRepository;    
    }
    public function getServicesOfUpdateByCustomer(int $pagSize){
        $customers = $this ->customerRepository->getCustomers();
        return $customers;
    }
}