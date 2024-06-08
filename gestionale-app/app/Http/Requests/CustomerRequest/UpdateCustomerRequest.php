<?php

namespace App\Http\Requests\CustomerRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    private $rulesCustomer=[
        'name'=>['required'],
        'descrizione'=>['required'],
        'citta'=>['required'],
        'address'=>['required'],
        'email'=>['required','email'],
        'cellphone'=>['required']
    ];
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
        $method= $this->method();
        //Verificare il tipo di metodo
        if($method == 'PUT'){
            //Si e put, utilizzamo tutte le regole poiche 
            //per modificare prenderemo tutti i dati
            return $this->rulesCustomer;
        }else{
            //Nel caso di patch, solo utilizzaremo le regole
            //dei attributi che vogliamo modificare
            foreach($this->rulesCustomer as $key=>$value){
                //Sometimes significa che possono essere utilizzati a volte
                $this->rulesCustomer[$key]='sometimes';
            }
            return $this->rulesCustomer;
        }
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'name_cliente'=>$this->nameCliente,
        ]);
    }
}
