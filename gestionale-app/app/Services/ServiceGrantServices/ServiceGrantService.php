<?php
namespace App\Services\ServiceGrantServices;

use App\Models\ServiceGrant;
use App\Repositories\BasicRepositories\ServiceGrantRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class ServiceGrantService implements ServiceGrantServiceInterface{

    private $serviceRepository;
    public function __construct(ServiceGrantRepository $serviceRepository){
        $this->serviceRepository=$serviceRepository;
    }
    public function getService(int $id): ?Model{
        return $this->serviceRepository->findById($id);
    }
    public function getServicePaginated(int $pagSize): LengthAwarePaginator{
        return $this->serviceRepository->getPaginated($pagSize);
    }
    public function createService(ServiceGrant $service): ?Model{
        return $this->serviceRepository->create($service->toArray());
    }
    public function updateService(ServiceGrant $service, int $id):?bool{
        return $this->serviceRepository->update($service->toArray(),$id);
    }
    public function deleteService(int $id): bool{
        return $this->serviceRepository->delete($id);
    }
}