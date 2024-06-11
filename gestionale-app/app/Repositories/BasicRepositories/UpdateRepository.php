<?php
namespace App\Repositories\BasicRepositories;

use App\Repositories\CrudRepositories\CrudRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class UpdateRepository implements CrudRepositoryInterface{
    public function findById(int $id):?Model{
        return null;
    }
    public function create(array $data):?Model{
        return null;
    }
    public function getPaginated(int $pagSize): ?LengthAwarePaginator{
        return null;
    }
    public function insert(array $data):bool{
        return false;
    }
    public function update(array $data,int $id): bool{
        return false;
    }
    public function delete(int $id):bool{
        return false;
    }
    public function getAll(): Collection{
        $a=collect();
        return $a;
    }
}