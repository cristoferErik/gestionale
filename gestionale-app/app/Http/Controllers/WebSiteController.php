<?php

namespace App\Http\Controllers;

use App\Services\webSiteServices\webSiteService;
use Illuminate\Http\Request;


class WebSiteController extends Controller
{
    public $webSiteRepository;
    public function __construct(webSiteService $webSiteRepository)
    {
        $this->webSiteRepository=$webSiteRepository;
    }
    public function getWebSiteByNextUpdate($pag){
        return $this->webSiteRepository->getWebSiteByNextUpdate($pag);
    }
}
