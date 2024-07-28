<?php
namespace App\Repositories\BasicRepositories;

use App\Models\Server;
use App\Repositories\CrudRepositories\CrudRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

 class ServerRepository implements CrudRepositoryInterface{
    public function findById(int $id){
        return Server::find($id);
    }
    public function getPaginated(int $pagSize){
        $query=Server::query();
        return $query->paginate($pagSize);
    }
    public function create(array $data){
        return Server::create($data);
    }
    public function update(array $data,int $id){
        $service=$this->findById($id);
        if($service->update($data)){
            return true;
        }
        return false;
    }
    public function delete(int $id){
        $server=$this->findById($id);
        if($server){//si es null, ovvero se service no essiste
            $server->delete();
            return true;
        }
        return false;
    }
    public function getAll(): Collection{
        return Server::all();
    }
 }