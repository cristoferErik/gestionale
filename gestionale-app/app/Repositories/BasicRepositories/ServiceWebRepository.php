<?php
namespace App\Repositories\BasicRepositories;
use App\Models\ServiceWeb;
use App\Repositories\CrudRepositories\CrudRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

 class ServiceWebRepository implements CrudRepositoryInterface{
    public function findById(int $id):?Model
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
    public function update(array $data,int $id): bool
    {
        $serviceWeb=$this->findById($id);
        if($serviceWeb->update($data)){
            return true;
        }
        return false;
    }
    public function delete(int $id): bool
    {
        $serviceWeb=$this->findById($id);
        if($serviceWeb)
        {//si es null, ovvero se il servizio no essiste
            $serviceWeb->delete();
            return true;
        }
        return false;
    }
    public function getAll(): Collection{
        return ServiceWeb::all();
    }
 }