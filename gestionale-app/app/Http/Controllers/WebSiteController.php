<?php

namespace App\Http\Controllers;

use App\Services\webSiteServices\webSiteService;
use Illuminate\Http\Request;


class WebSiteController extends Controller
{
    public $webSiteService;
    public function __construct(webSiteService $webSiteService)
    {
        $this->webSiteService=$webSiteService;
    }
    public function webSiteToUpdateByMaintenance($pag){
        return $this->webSiteService->getWebSiteToUpdateByMaintenances($pag);
    }
    public function webSiteToUpdateByBackup($pag){
        return $this->webSiteService->getWebSiteToUpdateByBackup($pag);
    }
}
