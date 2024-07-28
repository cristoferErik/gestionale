<?php
namespace App\Schedule;

use App\Models\ServiceUpdate;
use App\Repositories\BasicRepositories\ServiceUpdateRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class ServiceUpdateSc{

    private function updateState(){
            $today = Carbon::today();
            ServiceUpdateRepository::updateState($today);
    } 
    public function __invoke(){
        $this->updateState();
    }
}