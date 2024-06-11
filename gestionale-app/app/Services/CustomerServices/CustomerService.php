<?php
namespace App\Services\CustomerServices;

use App\Models\Customer;
use App\Repositories\BasicRepositories\CustomerRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class CustomerService implements CustomerServiceInterface{
    //iniettiamo la dipendenza
    protected $customerRepository;

    public function __construct(CustomerRepository $customerRepository){
        $this->customerRepository=$customerRepository;
    }
    public function getCustomer(int $id): ?Model{
        return $this->customerRepository->findById($id);
    }
    public function getCustomerPaginated(int $pagSize): LengthAwarePaginator{
        return $this->customerRepository->getPaginated($pagSize);
    }
    public function createCustomer(Customer $customer): ?Model{
        return $this->customerRepository->create($customer->toArray());
    }
    public function updateCustomer(Customer $data , int $id):?bool{
        return $this->customerRepository->update($data->toArray(),$id);
    }
    public function deleteCustomer(int $id): bool{
        return $this->customerRepository->delete($id);
    }
}