<?php

namespace App\Http\Resources\GrantServiceResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceGrantResource extends JsonResource
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
            'descrizione'=>$this->descrizione,
            'dataService'=>$this->data_service,
            'serviceType'=>$this->service_type,
            'customerId'=>$this->customer_id
        ];
    }
}
