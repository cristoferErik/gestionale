<?php

namespace App\Repositories\BasicRepositories;

use App\Models\Customer;
use App\Models\Maintenance;
use App\Models\RecordUpdate;
use App\Repositories\CrudRepositories\CrudRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CustomerRepository implements CrudRepositoryInterface
{
    public function findById(int $id)
    {
        return Customer::find($id);
    }
    public function getPaginated(int $pagSize)
    {
        $query = Customer::query();
        return $query->paginate($pagSize);
    }
    public function create(array $data)
    {
        return Customer::create($data);
    }
    public function update(array $data, int $id)
    {
        $customer = $this->findById($id);

        if ($customer) {
            $customer->update($data);
            return true;
        }
        return false;
    }
    public function delete(int $id)
    {
        $customer = $this->findById($id);
        if ($customer) {
            return $customer->delete();
        }
        return false;
    }
}
