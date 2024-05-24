<?php

namespace App\Http\Requests\CustomerRequest;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nameCliente' => ['required'],
            'description' => ['required'],
            'city' => ['required'],
            'email'=>['required','email'],
            'address'=>['required']
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'name_cliente'=>$this->nameCliente
        ]);
    }
}
