<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ContaRequest extends FormRequest
{
    public function rules()
    {
        return [
            'numero_conta' => 'required|integer|unique:conta,numero_conta',
            'saldo' => 'required|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'numero_conta.required' => 'O campo número da conta é obrigatório.',
            'numero_conta.unique' => 'Número de conta já cadastrado.',
            'saldo.required' => 'O campo saldo é obrigatório.',
            'saldo.numeric' => 'O saldo deve ser um valor numérico.',
            'saldo.min' => 'O saldo não pode ser menor que zero.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $error = $validator->errors()->first();
        throw new HttpResponseException(response()->json(['message' => $error], 422));
    }
}
