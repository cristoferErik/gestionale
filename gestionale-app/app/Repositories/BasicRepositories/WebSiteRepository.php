<?php
namespace App\Repositories\BasicRepositories;

use App\Models\WebSite;
use App\Repositories\CrudRepositories\CrudRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

 class WebSiteRepository implements CrudRepositoryInterface{
    public function findById(int $id):?Model{
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
    public function update(array $data,int $id): bool{
        $sitiWeb=$this->findById($id);
        if($sitiWeb->update($data)){
            return true;
        }
        return false;
    }
    public function delete(int $id):bool
    {
        $service=$this->findById($id);
        if($service){//si es null, ovvero se service no essiste
            $service->delete();
            return true;
        }
        return false;
    }
    public function getAll(): Collection{
        $a=collect();
        return WebSite::all();
    }

    public function getRecordUpdateByWebSite($serviceUpdateId){
        $webSites = DB::table('web_sites')
        ->leftjoin('record_updates','record_updates.web_site_id','=','web_sites.id')
        ->where('web_sites.service_update_id',$serviceUpdateId)
        ->select(
            'web_sites.service_update_id',
            'web_sites.date_creation',
            DB::raw('MAX(record_updates.record_date) as last_date')
        )
        ->groupBy('web_sites.id')
        ->get();

        return $webSites;
    }
 }