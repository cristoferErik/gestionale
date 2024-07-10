<?php

namespace App\Repositories\BasicRepositories;


use App\Models\WebSite;
use App\Repositories\CrudRepositories\CrudRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class WebSiteRepository implements CrudRepositoryInterface
{

    private $recordUpdateRepository;

    public function __construct(RecordUpdateRepository $recordUpdateRepository)
    {
        $this->recordUpdateRepository = $recordUpdateRepository;
    }
    public function findById(int $id): ?Model
    {
        return WebSite::find($id);
    }
    public function getPaginated(int $pagSize): LengthAwarePaginator
    {
        $query = WebSite::query();
        return $query->paginate($pagSize);
    }
    public function create(array $data): ?Model
    {
        return WebSite::create($data);
    }
    public function insert(array $data): bool
    {
        return WebSite::insert($data);
    }
    public function update(array $data, int $id): bool
    {
        $sitiWeb = $this->findById($id);
        if ($sitiWeb->update($data)) {
            return true;
        }
        return false;
    }
    public function delete(int $id): bool
    {
        $service = $this->findById($id);
        if ($service) { //si es null, ovvero se service no essiste
            $service->delete();
            return true;
        }
        return false;
    }
    public function getAll(): Collection
    {
        $a = collect();
        return WebSite::all();
    }
    public function getWebSiteByNextUpdate($pag)
    {
        $webSites = DB::table('web_sites')
            ->select(
                'web_sites.id as webSiteId',
                'web_sites.nome as webSiteName',
                'web_sites.date_creation as dateCreation',
                'web_sites.next_update as nextUpdate',
            )
            ->orderBy('nextUpdate', 'asc')
            ->paginate($pag);

        return $webSites;
    }
}
