<?php
namespace App\Services;

use App\Models\Customer;
use App\Repositories\CustomerRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class CustomerService implements CustomerServiceInterface{
    //iniettiamo la dipendenza
    protected $customerRepository;

    public function __construct(CustomerRepository $customerRepository){
        $this->customerRepository=$customerRepository;
    }
    public function getCustomer(Customer $data): ?Model{
        return $this->customerRepository->find($data->toArray());
    }
    public function getCustomerPaginated(int $pagSize): LengthAwarePaginator{
        return $this->customerRepository->getPaginated($pagSize);
    }
    public function createCustomer(Customer $customer): ?Model{
        return $this->customerRepository->create($customer->toArray());
    }
    public function updateCustomer(Customer $data): ?Model{
        $customer= $this->getCustomer($data["id"]);
        $customer=Customer::fromArray($data);
        return $this->customerRepository->update($customer->toArray());
    }
    public function deleteCustomer(Customer $data): bool{
        $customer = $this->getCustomer($data["id"]);
        if($customer==null){
            return null;
        }
        return $this->customerRepository->delete($customer->toArray());
    }
}