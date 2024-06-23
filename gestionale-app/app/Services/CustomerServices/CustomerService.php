<?php

namespace App\Services\CustomerServices;

use App\Models\Customer;
use App\Repositories\BasicRepositories\CustomerRepository;
use App\Repositories\BasicRepositories\WebSiteRepository;
use Carbon\Carbon;
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

        $pagCustomersId = $this->customerRepository->getListCustomerById($pag);
        $customers = $pagCustomersId->items();
        $listCustomerIds = $pagCustomersId->pluck('id')->all();
        $webSiteByCustomers = $this->customerRepository->getWebSiteByCustomer($listCustomerIds);

        $tableWebSiteByCustomer = [];
        $listQuantity = [];
        // Aggiugiamo un list di Id affinche possiamo ottenere tutti i dati

        foreach ($customers as $customer) {
            $quantity = 0;
            $progToUpdate=0;
            $progUpdated=0;
            foreach ($webSiteByCustomers as $webSiteByCustomer) {
                if ($customer->id === $webSiteByCustomer->customer_id) {
                    if ($webSiteByCustomer->last_update != null) {
                        $lastUpdate = Carbon::parse($webSiteByCustomer->last_update);
                    } else {
                        $lastUpdate = Carbon::parse($webSiteByCustomer->date_creation);
                    }

                    $nextUpdate = $lastUpdate->copy()->addDays($webSiteByCustomer->update_period);
                    $daysToUpdate = Carbon::now()->startOfDay()->diffInDays($nextUpdate);
                    //Giorno limite, affinche possa vedere quando arrivera il prossimo aggiornamento
                    if ($daysToUpdate <= 22) {
                        //Quantita dei progetti ad aggionare
                        $quantity++;
                        $listQuantity[]=$daysToUpdate;
                    }
                }
            }

                //Proggetti ad aggiornare
                $progUpdated = $customer->web_sites_count - $quantity;
                $progToUpdate = $quantity;


            $tableWebSiteByCustomer[] = [
                "id" => $customer->id,
                "name" => $customer->name,
                "webSiteQuantity" => $customer->web_sites_count,
                "progUpdated" => $progUpdated,
                "progToUpdate" => $progToUpdate
            ];
        }
        return $tableWebSiteByCustomer;
    }
}
