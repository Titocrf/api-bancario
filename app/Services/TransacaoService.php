<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Transacao;
use App\Services\ContaService;

class TransacaoService
{
    protected $contaService;
    protected $formaPagamentoService;

    public function __construct(ContaService $contaService, FormaPagamentoService $formaPagamentoService)
    {
        $this->contaService = $contaService;
        $this->formaPagamentoService = $formaPagamentoService;
    }

    /**
     * Realiza uma transação.
     *
     * @param string $numeroConta
     * @param float $valorDebito
     * @return mixed
     */
    public function create(array $data)
    {
        $numeroConta = $data['numero_conta'];
        $valorDebito = $data['valor'];
        $formaPagamentoId = $data['forma_pagamento'];

        DB::beginTransaction();

        try {
            $conta = $this->contaService->getContaByNumero($numeroConta);
            $formaPagamento = $this->formaPagamentoService->getById($formaPagamentoId);

            $taxa = ($formaPagamento->taxa / 100) * $valorDebito;
            $valorTotal = $valorDebito + $taxa;

            if (!$conta) {
                throw new \Exception('Conta não encontrada.');
            }

            if ($conta->saldo < $valorTotal) {
                throw new \Exception('Saldo insuficiente.');
            }

            $conta->saldo -= $valorTotal;
            $conta->save();

            Transacao::create([
                'numero_conta' => $numeroConta,
                'valor' => $valorDebito,
                'forma_pagamento' => $formaPagamentoId,
                'taxa' => $taxa,
            ]);

            DB::commit();

            return $conta;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
