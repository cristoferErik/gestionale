<?php
namespace App\Services\ServiceGrantServices;

use App\Models\ServiceGrant;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

interface ServiceGrantServiceInterface{
    
    public function getService(int $id): ?Model;
    public function getServicePaginated(int $pagSize): LengthAwarePaginator;
    public function createService(ServiceGrant $service): ?Model;
    public function updateService(ServiceGrant $service, int $id):?bool;
    public function deleteService(int $id): bool;
}