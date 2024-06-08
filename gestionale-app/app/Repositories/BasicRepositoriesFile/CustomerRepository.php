<?php
namespace App\Repositories\BasicRepositoriesFile;

use App\Models\Customer;
use App\Repositories\CrudRepositoriesFile\CrudRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;

class CustomerRepository implements CrudRepositoryInterface{
    public function findById(int $id):?Model
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
    public function update(array $data, int $id): bool
    {
        $customer = $this->findById($id);
        
        if ($customer){
            $customer->update($data);
            return true;
        }
        return false;
    }
    public function delete(int $id): bool
    {
        $customer = $this->findById($id);
        if ($customer) {
            return $customer->delete();
        }
        return false;
    }
    //Functions without crud
    public function getCustomers(): Collection{
        return Customer::all();
    }
}