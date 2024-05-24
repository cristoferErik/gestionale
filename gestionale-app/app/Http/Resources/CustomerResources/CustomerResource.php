<?php

namespace App\Http\Resources\CustomerResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'nameCliente'=>$this->name_cliente,
            'description'=>$this->status,
            'city'=>$this->city,
            'email'=>$this->email,
            'address'=>$this->address
        ];
    }
}
