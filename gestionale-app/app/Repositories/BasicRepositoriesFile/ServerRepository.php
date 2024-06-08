<?php
namespace App\Repositories\BasicRepositoriesFile;

use App\Models\Server;
use App\Repositories\CrudRepositoriesFile\CrudRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

 class ServerRepository implements CrudRepositoryInterface{
    public function findById(int $id):?Model{
        return Server::find($id);
    }
    public function getPaginated(int $pagSize): LengthAwarePaginator{
        $query=Server::query();
        return $query->paginate($pagSize);
    }
    public function create(array $data):?Model{
        return Server::create($data);
    }
    public function insert(array $data):bool{
        return Server::insert($data);
    }
    public function update(array $data,int $id): bool{
        $service=$this->findById($id);
        if($service->update($data)){
            return true;
        }
        return false;
    }
    public function delete(int $id):bool{
        $server=$this->findById($id);
        if($server){//si es null, ovvero se service no essiste
            $server->delete();
            return true;
        }
        return false;
    }
 }