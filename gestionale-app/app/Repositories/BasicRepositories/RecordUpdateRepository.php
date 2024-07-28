<?php

namespace App\Repositories\BasicRepositories;

use App\Http\Resources\RecordUpdateResources\RecordUpdateResource;
use App\Models\RecordUpdate;
use App\Repositories\CrudRepositories\CrudRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\DB;

class RecordUpdateRepository implements CrudRepositoryInterface
{
    public function findById(int $id){
        return RecordUpdate::find($id);
    }
    public function getPaginated(int $pagSize){
        return null;
    }
    public function create(array $model){
        try{
            return new RecordUpdateResource(RecordUpdate::create($model));
        }catch(Exception $e){
            // Lanzar una excepción si no se puede crear el modelo
            throw new Exception('Error creating record update', 0, $e);
        }
    }
    public function update(array $model,int $id){
        return false;
    }
    public function delete(int $id){
        return false;
    }
    //Ricordare che debbiamo di modificare il tipo di data, di recordUpdate
    //poiche si puo aggiornare molte volte nello stesso giorno
    //e questo ci permetera ,non avere dati repetitivi
    public function getRecourdUpdateByType(string $type){
        $maxDate=DB::table('record_updates')
        ->select('web_site_id',DB::raw('MAX(next_update) as next_update'))
        ->where('type_record_update',$type)
        ->groupBy('web_site_id');
        return $maxDate;
    }
}
