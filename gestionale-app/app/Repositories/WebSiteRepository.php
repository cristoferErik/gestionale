<?php
namespace App\Repositories;

use App\Models\WebSite;
use App\Repositories\CrudRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

 class WebSiteRepository implements CrudRepositoryInterface{
    public function find(int $id):?Model{
        return WebSite::find($id);
    }
    public function getPaginated(int $pagSize): LengthAwarePaginator{
        $query=WebSite::query();
        return $query->paginate($pagSize);
    }
    public function create(array $data):?Model{
        return WebSite::create($data);
    }
    public function insert(array $data):bool{
        return WebSite::insert($data);
    }
    public function update(array $data,int $id): ?bool{
        $sitiWeb=$this->find($id);
        if($sitiWeb->update($data)){
            return true;
        }
        return false;
    }
    public function delete(int $id):bool
    {
        $service=$this->find($id);
        if($service){//si es null, ovvero se service no essiste
            $service->delete();
            return true;
        }
        return false;
    }
 }