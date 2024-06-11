<?php
namespace App\Repositories\CrudRepositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface CrudRepositoryInterface
{
    public function findById(int $id):?Model;
    public function getPaginated(int $pagSize): ?LengthAwarePaginator;
    public function create(array $data):?Model;
    public function insert(array $data):bool;
    public function update(array $data,int $id): bool;
    public function delete(int $id):bool;
    public function getAll(): Collection;
}