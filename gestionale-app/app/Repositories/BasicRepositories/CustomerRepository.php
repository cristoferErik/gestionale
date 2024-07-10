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
    private $recordUpdateRepository;

    public function __construct(RecordUpdateRepository $recordUpdateRepository){
        $this->recordUpdateRepository = $recordUpdateRepository;
    }
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
    public function getCustomerByCountWebSite($pag){
        $customers = DB::table('customers')
        ->join('service_grants','customers.id','service_grants.customer_id')
        ->join('service_webs','service_grants.id','service_webs.id')
        ->join('servers','service_webs.id','servers.service_web_id')
        ->join('web_sites','servers.id','web_sites.server_id')
        ->join('service_updates','service_updates.id','web_sites.service_update_id')
        ->select(
            'customers.id as customerId',
            'customers.name as customerName',
            DB::raw('COUNT(web_sites.id) as webSiteQuantity')  
        )
        ->groupBy('customers.id')
        ->paginate($pag);
        return $customers;
    }
}
