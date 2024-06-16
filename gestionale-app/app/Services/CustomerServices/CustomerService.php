<?php

namespace App\Services\CustomerServices;

use App\Models\Customer;
use App\Repositories\BasicRepositories\CustomerRepository;
use App\Repositories\BasicRepositories\WebSiteRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class CustomerService implements CustomerServiceInterface
{
    //iniettiamo la dipendenza
    protected $customerRepository;
    protected $webSiteRepository;
    public function __construct(
        CustomerRepository $customerRepository,
        WebSiteRepository $webSiteRepository
    ) {
        $this->customerRepository = $customerRepository;
        $this->webSiteRepository = $webSiteRepository;
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
        $customers = $this->customerRepository->getWebSiteByCustomer($pag);
        //riceve customer_id
        //e fornisce service_update_id
        $uwc = $this->customerRepository->getServiceUpdatesByCustomer(1);
        //riceve un service_update_id
        $ruw = $this->webSiteRepository->getRecordUpdateByWebSite(1);
        return $uwc;
    }
}
