<?php
namespace App\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

interface CrudRepositoryInterface
{
    public function find(int $id):?Model;
    public function getPaginated(int $pagSize): LengthAwarePaginator;
    public function create(array $data):?Model;
    public function insert(array $data):bool;
    public function update(array $data,int $id): ?Model;
    public function delete(int $id):bool;


}