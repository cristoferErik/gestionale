<?php
namespace App\Repositories;

use App\Models\Customer;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class CustomerRepository implements CrudRepositoryInterface{


    public function find(int $id): ?Model
    {
        return Customer::find($id);
    }

    public function getPaginated(int $pagSize): LengthAwarePaginator
    {
        $query = Customer::query();
        return $query->paginate($pagSize);
    }

    public function create(array $data): ?Model
    {
        return Customer::create($data);
    }

    public function insert(array $data): bool
    {
        return Customer::insert($data);
    }

    public function update(array $data, int $id): ?bool
    {
        $customer = $this->find($id);
        if ($customer){
            $customer->update($data);
            return $customer;
        }
        return null;
    }

    public function delete(int $id): bool
    {
        $customer = $this->find($id);
        if ($customer) {
            return $customer->delete();
        }
        return false;
    }
}