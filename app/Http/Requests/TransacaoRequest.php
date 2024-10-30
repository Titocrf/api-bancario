<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class TransacaoRequest extends FormRequest
{
    public function rules()
    {
        return [
            'numero_conta' => 'required|integer',
            'valor' => 'required|numeric|min:0',
            'forma_pagamento' => 'required|string|exists:forma_pagamento,id',
        ];
    }

    public function messages()
    {
        return [
            'numero_conta.required' => 'O campo número da conta é obrigatório.',
            'valor.required' => 'O campo saldo é obrigatório.',
            'valor.numeric' => 'O saldo deve ser um valor numérico.',
            'valor.min' => 'O saldo não pode ser menor que zero.',
            'forma_pagamento.required' => 'O campo forma de pagamento é obrigatório.',
            'forma_pagamento.string' => 'O campo forma de pagamento deve ser uma string.',
            'forma_pagamento.exists' => 'A forma de pagamento selecionada não existe.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $error = $validator->errors()->first();
        throw new HttpResponseException(response()->json(['message' => $error], 422));
    }
}
