<?php

namespace App\Repositories\BasicRepositories;

use Illuminate\Support\Facades\DB;

class RecordUpdateRepository{
    public function getRecordUpdatesBackUpByWebSiteIds(array $webSiteIds){
        $recordUpdates=DB::table('record_updates')
        ->join('backups','backups.record_update_id','record_updates.id')
        ->select(
            'record_updates.web_site_id as webSiteId',
            DB::raw('MAX(record_updates.record_date) as lastDateBk')
            )
        ->groupBy('record_updates.web_site_id')
        ->whereIn('record_updates.web_site_id',$webSiteIds)
        ->get();
        return $recordUpdates;
    }
    public function getRecordUpdatesMaintenanceByWebSiteIds(array $webSiteIds){
        $recordUpdates=DB::table('record_updates')
        ->join('maintenances','maintenances.record_update_id','record_updates.id')
        ->select(
            'record_updates.web_site_id as webSiteId',
            DB::raw('MAX(record_updates.record_date) as lastDateMtn')
            )
        ->groupBy('record_updates.web_site_id')
        ->whereIn('record_updates.web_site_id',$webSiteIds)
        ->get();
        return $recordUpdates;
    }
}