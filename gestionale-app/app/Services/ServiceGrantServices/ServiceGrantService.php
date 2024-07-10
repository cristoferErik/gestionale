<?php
namespace App\Services\ServiceGrantServices;

use App\Models\ServiceGrant;
use App\Repositories\BasicRepositories\ServiceGrantRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class ServiceGrantService{

    private $serviceRepository;
    public function __construct(ServiceGrantRepository $serviceRepository){
        $this->serviceRepository=$serviceRepository;
    }
    public function getServiceGrantByCustomerId($customerId,$pag){
        return $this->serviceRepository->getServiceGrantByCustomerId($customerId,$pag);
    }
    
}