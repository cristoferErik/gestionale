<?php
namespace App\Repositories\BasicRepositories;

use App\Models\Customer;
use App\Repositories\CrudRepositories\CrudRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
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
    public function getAll(): Collection{
        return Customer::all();
    }
/*
    public function getServicesUpdateCustomer(int $pag){

        $customers = Customer::whereHas('servicesGrant')
        ->with(['servicesGrant.serviceWeb.server'=>function($query){
            $query->has('webSite');
            $query->with('webSite');
        }])
        ->with('servicesGrant.serviceWeb', function($query) {
            $query->has('server');
        })
        ->with('servicesGrant', function($query) {
            $query->has('serviceWeb');
        })
        ->get();

        
        $customerServiceGrants = Customer::whereHas('servicesGrant')->get();

        /*
        $serviceGrants=$customerServiceGrants->pluck('servicesGrant')->flatten();
        $serviceWebs = $customers->pluck('servicesGrant.*.serviceWeb')->flatten();
        $servers = $customers->pluck('servicesGrant.*.serviceWeb.server')->flatten();
        $webSites = $customers->pluck('servicesGrant.*.serviceWeb.server.*.webSite')->flatten();
        // Cargar las relaciones relacionadas para cada cliente
        return $serviceGrants;
    }
    */
}