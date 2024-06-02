<?php
namespace App\Services\CustomerServices;

use App\Models\Customer;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

interface CustomerServiceInterface{

    public function getCustomer(int $id): ?Model;
    public function getCustomerPaginated(int $pagSize): LengthAwarePaginator;
    public function createCustomer(Customer $customer): ?Model;
    public function updateCustomer(Customer $customer, int $id):?bool;
    public function deleteCustomer(int $customer): bool;
}