<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransacaoRequest;
use App\Services\TransacaoService;
use Illuminate\Http\Request;
use App\Http\Resources\ContaResource;

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
        try {
            $conta = $this->transacaoService->create($request->validated());
            return (new ContaResource($conta))->response()->setStatusCode(201);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }
}
