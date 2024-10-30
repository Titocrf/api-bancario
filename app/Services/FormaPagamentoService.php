<?php

namespace App\Services;

use App\Models\FormaPagamento;

class FormaPagamentoService
{
    /**
     * Busca uma forma de pagamento pelo ID.
     *
     * @param string $id
     * @return FormaPagamento|null
     */
    public function getById(string $id): ? FormaPagamento
    {
        return FormaPagamento::find($id);
    }
}