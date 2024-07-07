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
        $customersCountWebSites = $this->customerRepository->getCustomerByCountWebSite($pag);
        $customerIds = $customersCountWebSites->pluck('customerId')->toArray();
        $customerByWebSites = $this->customerRepository->getCustomerByWebSite($customerIds);

        $tabellaWebSiteByCustomers = [];

        foreach ($customersCountWebSites as $customersCountWebSite) {
            $customerIdCwS = $customersCountWebSite->customerId;
            $customerNameCwS = $customersCountWebSite->customerName;
            $customerCountCwS = $customersCountWebSite->webSiteQuantity;
            $value=0;
            foreach ($customerByWebSites as $key => $customerByWebSite) {
                $customerIdBwS = $customerByWebSite->customerId;
                $webDateCreationBwS = $customerByWebSite->webDateCreation;
                $updateDateIniBwS = $customerByWebSite->updateDateIni;
                $updateDateEndBwS = $customerByWebSite->updateDateEnd;
                $updatePeriodBwS = $customerByWebSite->updatePeriod;
                $lastDateBkBwS = $customerByWebSite->lastDateBk;
                $lastDateMtnBwS = $customerByWebSite->lastDateMtn;

                if ($customerIdCwS === $customerIdBwS) {
                    unset($customerByWebSites[$key]);
                    $list = [$lastDateBkBwS, $lastDateMtnBwS];
                    $value = $value + $this->progToUpdate($list, $webDateCreationBwS, $updatePeriodBwS);
                    
                } else {
                    break;
                }
            }
            $tabellaWebSiteByCustomers[] = [
                'id' => $customerIdCwS,
                'name' => $customerNameCwS,
                'count' => $customerCountCwS,
                'progToUpdate' => $value,
                'progUpdated' => $customerCountCwS - $value
            ];
        }
        return $tabellaWebSiteByCustomers;
    }
    public function progToUpdate($list, $webDateCreationBwS, $updatePeriod)
    {
        $flag=0;
        $value=0;
        for ($i = 0; $i < count($list); $i++) {
            if($list[$i]!=null){
                $value = $this->daysToUpdate($list[$i],$updatePeriod);
                if($value==1){
                    break;
                }
            }else{
                $flag++;
            }  
        }
        if($flag==2){
            $value = $this->daysToUpdate($webDateCreationBwS,$updatePeriod);
        }

        return $value;
    }
    public function daysToUpdate($lastUpdate, $updatePeriod)
    {
        $nextUpdate = Carbon::parse($lastUpdate)->addDays($updatePeriod);
        $daysToUpdate = Carbon::now()->startOfDay()->diffInDays($nextUpdate);
        //echo "<br/>".$daysToUpdate;
        if ($daysToUpdate <= 10) {
            return 1;
        }
        return 0;
    }
}
