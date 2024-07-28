<?php

namespace App\Http\Controllers;

use App\DTO\RecordUpdateDTO;
use App\Http\Requests\RequestDTO\RecordUpdateDTORequest\RecordUpdateDTORequest;


use App\Services\RecordUpdateServices\RecordUpdateService;
use Illuminate\Http\Request;

class RecordUpdateController extends Controller
{
    private RecordUpdateService $recordUpdateService;
    public function __construct(RecordUpdateService $recordUpdateService)
    {
        $this->recordUpdateService = $recordUpdateService;
    }
    public function createRecordUpdate(RecordUpdateDTORequest $request)
    {
        $recordUpdateDTO = new RecordUpdateDTO($request->id,$request->type,$request->description,$request->webSiteId);
        $recordUpdate = $this->recordUpdateService->createRecordUpdate($recordUpdateDTO);
        
        return response()->json([
            'message' => 'backup created successfully.',
            'recordUpdate'=> $recordUpdate
        ]);
    }

}
