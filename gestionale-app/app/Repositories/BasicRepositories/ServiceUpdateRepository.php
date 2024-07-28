<?php
namespace App\Repositories\BasicRepositories;

use App\Models\ServiceUpdate;

class ServiceUpdateRepository
{
    public static function updateState($today){
        ServiceUpdate::where('data_finale','<',$today)->update(['status'=>false]);
    }
}