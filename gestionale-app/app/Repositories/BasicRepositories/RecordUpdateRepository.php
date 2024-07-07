<?php

namespace App\Repositories\BasicRepositories;

use Illuminate\Support\Facades\DB;

class RecordUpdateRepository
{
    public function getRecordUpdatesBkByWebSiteIds()
    {
        $recordUpdatesSubQuery = DB::table('record_updates')
            ->join('backups', 'backups.id', 'record_updates.id')
            ->select(
                'record_updates.web_site_id as webSiteId',
                DB::raw('MAX(record_updates.record_date) as lastDateBk')
            )
            ->groupBy('record_updates.web_site_id');

        return $recordUpdatesSubQuery;
    }
    public function getRecordUpdatesMntByWebSiteIds()
    {
        $recordUpdatesSubQuery = DB::table('record_updates')
            ->join('maintenances', 'maintenances.id', 'record_updates.id')
            ->select(
                'record_updates.web_site_id as webSiteId',
                DB::raw('MAX(record_updates.record_date) as lastDateMtn')
            )
            ->groupBy('record_updates.web_site_id');

        return $recordUpdatesSubQuery;
    }
}
