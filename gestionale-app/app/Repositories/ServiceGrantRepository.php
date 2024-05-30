<?php
namespace App\Repositories;

use App\Models\ServiceGrant;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class ServiceGrantRepository implements CrudRepositoryInterface{
    public function find(int $id):?Model{
        return ServiceGrant::find($id);
    }
    public function getPaginated(int $pagSize): LengthAwarePaginator{
        $query = ServiceGrant::query();
        return $query->paginate($pagSize);
    }
    public function create(array $data):?Model{
        return ServiceGrant::create($data);
    }
    public function insert(array $data):bool{
        return ServiceGrant::insert($data);
    }
    public function update(array $data,int $id): ?bool{
        $service=$this->find($id);
        if($service){
            if($service->update($data)){
                return  true;
            }else{
                return false;
            }
            
        }else{
            return false;
        }
    }
    public function delete(int $id):bool{
        $service=$this->find($id);
        if($service){//si es null, ovvero se service no essiste
            $service->delete();
            return true;
        }
        
        return false;
    }   
}