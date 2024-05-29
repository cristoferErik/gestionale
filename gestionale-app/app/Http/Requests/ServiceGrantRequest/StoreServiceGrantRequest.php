<?php

namespace App\Http\Requests\ServiceGrantRequest;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceGrantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'descrizione' => ['required'],
            'dataService' => ['required'],
            'serviceType' => ['required'],
            'customerId'  => ['required']
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'data_service'=>$this->nameCliente,
            'serviceType'=>$this->serviceType,
            'customerId'=>$this->customer_id
        ]);
    }
}
