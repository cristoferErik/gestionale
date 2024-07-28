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
    public function findById(int $id)
    {
        return WebSite::find($id);
    }
    public function getPaginated(int $pagSize)
    {
        $query = WebSite::query();
        return $query->paginate($pagSize);
    }
    public function create(array $data)
    {
        return WebSite::create($data);
    }
    public function update(array $data, int $id)
    {
        $sitiWeb = $this->findById($id);
        if ($sitiWeb->update($data)) {
            return true;
        }
        return false;
    }
    public function delete(int $id)
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
    public function getSiteWebToUpdate($pag,$type)
    {
        $maxDate=$this->recordUpdateRepository->getRecourdUpdateByType($type);
        $siteWeb = DB::table('web_sites')
            ->join('record_updates','record_updates.web_site_id','web_sites.id')
            ->join('service_updates','service_updates.id','web_sites.service_update_id')
            ->joinSub($maxDate,'max_dates',function($join){
                $join->on('record_updates.web_site_id','=','max_dates.web_site_id')
                     ->on('record_updates.next_update', '=', 'max_dates.next_update');
            })
            ->select(
                'web_sites.nome as nomeWebSite',
                'record_updates.date_record_update as dateRecordUpdate',
                'record_updates.description',
                'record_updates.next_update as nextUpdate'
                )
            ->where('type_record_update',$type)
            ->where('service_updates.state',true)
            ->paginate($pag);

        return $siteWeb;
    }
}
