<?php

namespace App\Repositories\BasicRepositories;

use Illuminate\Support\Facades\DB;

class RecordUpdateRepository
{
    public function getRecordUpdatesBkByWebSiteIds()
    {
        $recordUpdatesSubQuery = DB::table('record_updates')
            ->join('backups', 'backups.id', '=', 'record_updates.id')
            ->select(
                'record_updates.web_site_id as webSiteId',
                'record_updates.last_update as lastDateBk',
                'record_updates.next_update as nextUpdate'
            )
            ->orderBy('record_updates.last_update', 'desc') // Ordena por last_update de forma descendente
            ->groupBy('record_updates.web_site_id');

        return $recordUpdatesSubQuery;
    }
    public function getRecordUpdatesMntByWebSiteIds()
    {
        $recordUpdatesSubQuery = DB::table('record_updates')
            ->join('maintenances', 'maintenances.id', '=', 'record_updates.id')
            ->select(
                'record_updates.web_site_id as webSiteId',
                'MAX(record_updates.last_update as lastDateBk',
                'record_updates.next_update as nextUpdate'
            )
            ->groupBy('record_updates.web_site_id');

        $recordUpdatesSubQuery = DB::table('record_updates')
            ->join('maintenances', 'maintenances.id', '=', 'record_updates.id')
            ->select(
                'record_updates.web_site_id as webSiteId',
                'MAX(record_updates.last_update as lastDateMtn',
                'record_updates.next_update as nextUpdate'
            )
            ->groupBy('record_updates.web_site_id');

        return $recordUpdatesSubQuery;
    }
}
