<?php
namespace App\Services\WebSiteServices;
use App\Repositories\BasicRepositories\WebSiteRepository;

class WebSiteService{
    private $webSiteRepository;
    public function __construct(WebSiteRepository $webSiteRepository)
    {
        $this->webSiteRepository=$webSiteRepository;
    }
    public function getWebSiteToUpdateByMaintenances($pag){
        $webSiteToUpdate = $this->webSiteRepository->getSiteWebToUpdate($pag,"M");
        return $webSiteToUpdate;
    }
    public function getWebSiteToUpdateByBackup($pag){
        $webSiteToUpdate = $this->webSiteRepository->getSiteWebToUpdate($pag,"B");
        return $webSiteToUpdate;
    }
}