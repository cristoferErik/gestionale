<?php
namespace App\Repositories\CrudRepositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface CrudRepositoryInterface
{
    public function findById(int $id);
    public function getPaginated(int $pagSize);
    public function create(array $data);
    public function update(array $data,int $id);
    public function delete(int $id);
}