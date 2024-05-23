<?php
namespace App\Services;

use App\Models\Customer;
use App\Repositories\CustomerRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

interface CustomerServiceInterface{

    public function getCustomer(Customer $data): ?Model;
    public function getCustomerPaginated(int $pagSize): LengthAwarePaginator;
    public function createCustomer(Customer $data): ?Model;
    public function updateCustomer(Customer $data): ?Model;
    public function deleteCustomer(Customer $data): bool;
}