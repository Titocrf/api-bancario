<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransacaoRequest;
use App\Services\TransacaoService;

class TransacaoController extends Controller
{
    private $transacaoService;

    public function __construct(TransacaoService $transacaoService)
    {
        $this->transacaoService = $transacaoService;
    }

    /**
     * Cria uma transação
     *
     * @param  TransacaoRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TransacaoRequest $request)
    {
        return $this->transacaoService->create($request->validated());

        // return response()->json(['message' => 'Avaliação já realizada.'], 422);
    }
}
