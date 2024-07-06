<?php

namespace App\Services\CustomerServices;

use App\Models\Customer;
use App\Repositories\BasicRepositories\CustomerRepository;
use App\Repositories\BasicRepositories\RecordUpdateRepository;
use App\Repositories\BasicRepositories\WebSiteRepository;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class CustomerService implements CustomerServiceInterface
{
    //iniettiamo la dipendenza
    protected $customerRepository;
    protected $webSiteRepository;
    protected $recordUpdateRepository;

    public function __construct(
        CustomerRepository $customerRepository,
        WebSiteRepository $webSiteRepository,
        RecordUpdateRepository $recordUpdateRepository
    ) {
        $this->customerRepository = $customerRepository;
        $this->webSiteRepository = $webSiteRepository;
        $this->recordUpdateRepository = $recordUpdateRepository;
    }
    public function getCustomer(int $id): ?Model
    {
        return $this->customerRepository->findById($id);
    }
    public function getCustomerPaginated(int $pagSize): LengthAwarePaginator
    {
        return $this->customerRepository->getPaginated($pagSize);
    }
    public function createCustomer(Customer $customer): ?Model
    {
        return $this->customerRepository->create($customer->toArray());
    }
    public function updateCustomer(Customer $data, int $id): ?bool
    {
        return $this->customerRepository->update($data->toArray(), $id);
    }
    public function deleteCustomer(int $id): bool
    {
        return $this->customerRepository->delete($id);
    }

    public function getCustomerServiceWebs(int $pag)
    {
        $webSitesIdByCustomers = $this->customerRepository->getCustomerByWebSite($pag);
        $webSiteIds = $webSitesIdByCustomers->pluck('webSiteId')->toArray();

        $webSitesByServiceUpdates = $this->webSiteRepository->getWebSiteByServiceUpdate($webSiteIds);
        $webSiteIdsByServiceUpdate=$webSitesByServiceUpdates->pluck('webSiteId')->toArray();

        $backupByWebSites = $this->recordUpdateRepository->getRecordUpdatesBackUpByWebSiteIds($webSiteIdsByServiceUpdate)->toArray();
        $maintenanceByWebSites = $this->recordUpdateRepository->getRecordUpdatesMaintenanceByWebSiteIds($webSiteIdsByServiceUpdate);
        $tableWebSiteByCustomer=[];
        foreach($webSitesByServiceUpdates as $webSitesByServiceUpdate){
            $lastDateBk=null;
            $lastDateMtn=null;
            foreach($backupByWebSites as $backupByWebSite){
                if($webSitesByServiceUpdate->webSiteId===$backupByWebSite->webSiteId){
                    $lastDateBk=$backupByWebSite->lastDateBk;
                    break;
                }else{
                    $lastDateBk=null;
                }
            }
            foreach($maintenanceByWebSites as $maintenanceByWebSite){
                if($webSitesByServiceUpdate->webSiteId===$maintenanceByWebSite->webSiteId){
                    $lastDateMtn=$maintenanceByWebSite->lastDateMtn;
                    break;
                }else{
                    $lastDateMtn=null;
                }
            }
            $tableWebSiteByCustomer[]=[
                "webSiteId"=>$webSitesByServiceUpdate->webSiteId,
                "webDateCreation"=>$webSitesByServiceUpdate->webDateCreation,
                "updatePeriod"=>$webSitesByServiceUpdate->updatePeriod,
                "updateDateIni"=>$webSitesByServiceUpdate->updateDateIni,
                "updateDateEnd"=>$webSitesByServiceUpdate->updateDateEnd,
                "status"=>$webSitesByServiceUpdate->status,
                "lastDateBk"=>$lastDateBk,
                "lastDateMtn"=>$lastDateMtn
            ];
        }
        return $tableWebSiteByCustomer;
    }
}
