<?php
namespace App\Services\HomeServices;


use App\Repositories\BasicRepositories\CustomerRepository;
use App\Repositories\BasicRepositories\ServerRepository;
use App\Repositories\BasicRepositories\ServiceGrantRepository;
use App\Repositories\BasicRepositories\ServiceWebRepository;
use App\Repositories\BasicRepositories\WebSiteRepository;
use App\Repositories\HomeRepositories\HomeRepository;

class HomeService implements HomeServiceInterface{
    private $customerRepository;
    private $serviceGrantRepository;
    private $serviceWebRepository;
    private $serverRepository;
    private $webSiteRepository;

    public function __construct(
        CustomerRepository $customerRepository,
        ServiceGrantRepository $serviceGrantRepository,
        ServiceWebRepository $serviceWebRepository,
        WebSiteRepository $webSiteRepository,
        ServerRepository $serverRepository
        )
    {   
        $this->customerRepository = $customerRepository;
        $this->serviceGrantRepository = $serviceGrantRepository;
        $this->serviceWebRepository = $serviceWebRepository;
        $this->webSiteRepository = $webSiteRepository;
        $this->serverRepository = $serverRepository; 
    }
    public function getCustomerServiceWebs(int $pag){
        $customers=$this->serviceGrantRepository->getAll();
        $serviceGrant=$this->serviceGrantRepository->getAll();
        $serviceWeb=$this->serviceWebRepository->getAll();
        $servers=$this->serverRepository->getAll();

        $data=[];
        foreach($servers as $server){
            if(!isset($data[$server->service_web_id])){
                //"1"=>[A,B,C]
                $data[$server->service_web_id] = [$server->server_url];
            }else{
                $data[$server->service_web_id][]=$server->server_url;
            }
        }
      return $data;
    }
}