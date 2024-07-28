<?php

namespace App\Services\RecordUpdateServices;

use App\DTO\RecordUpdateDTO;
use App\Models\Customer;
use App\Models\RecordUpdate;
use App\Repositories\BasicRepositories\CustomerRepository;
use App\Repositories\BasicRepositories\RecordUpdateRepository;
use App\Repositories\BasicRepositories\WebSiteRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class RecordUpdateService
{
    private RecordUpdateRepository $recordUpdateRepository;
    public function __construct(
        RecordUpdateRepository $recordUpdateRepository
    ) {
        $this->recordUpdateRepository = $recordUpdateRepository;
    }
    public function createRecordUpdate(RecordUpdateDTO $recordUpdateDTO)
    {
        try {
            $recordUpdate = new RecordUpdate();
            $recordUpdate->date_record_update = Carbon::today();
            $recordUpdate->type_record_update = $recordUpdateDTO->getType();
            $recordUpdate->description = $recordUpdateDTO->getDescription();
            $recordUpdate->next_update = Carbon::today();
            $recordUpdate->web_site_id = $recordUpdateDTO->getWebSiteId();
            return $this->recordUpdateRepository->create($recordUpdate->toArray());
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
