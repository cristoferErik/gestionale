<?php
namespace App\Repositories;
 use App\Models\ServiceWeb;
 use App\Repositories\CrudRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

 class ServiceWebRepository implements CrudRepositoryInterface{
    public function find(int $id):?Model
    {
        return ServiceWeb::find($id);
    }
    public function getPaginated(int $pagSize): LengthAwarePaginator
    {
        $query=ServiceWeb::query();
        return $query->paginate($pagSize);
    }
    public function create(array $data):?Model
    {
        return ServiceWeb::create($data);
    }
    public function insert(array $data):bool{
        return ServiceWeb::insert($data);
    }
    public function update(array $data,int $id): ?bool
    {
        $serviceWeb=$this->find($id);
        if($serviceWeb->update($data)){
            return true;
        }
        return false;
    }
    public function delete(int $id): bool
    {
        $serviceWeb=$this->find($id);
        if($serviceWeb)
        {//si es null, ovvero se il servizio no essiste
            $serviceWeb->delete();
            return true;
        }
        return false;
    }
 }