<?php
namespace App\Services\webSiteServices;
use App\Repositories\BasicRepositories\WebSiteRepository;

class webSiteService{
    private $webSiteRepository;
    public function __construct(WebSiteRepository $webSiteRepository)
    {
        $this->webSiteRepository=$webSiteRepository;
    }
    public function getWebSiteByNextUpdate($pag){
        $webSiteByServiceUpdates = $this->webSiteRepository->getWebSiteByNextUpdate($pag);
        return $webSiteByServiceUpdates;
    }
}