<?php

namespace App\Repositories\BasicRepositories;

use App\Models\Customer;
use App\Models\Maintenance;
use App\Repositories\CrudRepositories\CrudRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CustomerRepository implements CrudRepositoryInterface
{
    public function findById(int $id): ?Model
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

        if ($customer) {
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
    public function getAll(): Collection
    {
        return Customer::all();
    }

    public function getWebSiteByCustomer(int $pag)
    {
        $customers = DB::table('customers')
            ->join('service_grants', 'customers.id', '=', 'service_grants.customer_id')
            ->join('service_updates', 'service_grants.id', '=', 'service_updates.service_grant_id')
            ->join('web_sites','web_sites.service_update_id','=','service_updates.id')
            ->select(
                'customers.id as customer_id', 
                'customers.name as customer_name',
                DB::raw('COUNT(web_sites.id) as web_sites_count')
                )
            ->groupBy('customers.id')
            ->paginate($pag);
        return $customers;
    }
    public function getServiceUpdatesByCustomer(int $customerId){
        $customers = DB::table('customers')
            ->join('service_grants', 'customers.id', '=', 'service_grants.customer_id')
            ->join('service_updates', 'service_grants.id', '=', 'service_updates.service_grant_id')
            ->join('web_sites','web_sites.service_update_id','=','service_updates.id')
            ->select(
                    'service_updates.id',
                    'service_updates.date_ini',
                    'service_updates.date_end',
                    'service_updates.update_period'
                )
            ->where('customers.id',$customerId)
            ->groupBy('service_updates.id')
            ->get();

        return $customers;
    }

}