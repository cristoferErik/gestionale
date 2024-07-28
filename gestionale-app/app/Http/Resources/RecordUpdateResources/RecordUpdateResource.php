<?php

namespace App\Http\Resources\RecordUpdateResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RecordUpdateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'dateRecordUpdate'=>$this->date_record_update,
            'typeRecordUpdate'=>$this->type_record_update,
            'description'=>$this->description,
            'nextUpdate'=>$this->next_update,
            'webSiteId'=>$this->web_site_id,
        ];
    }

}
