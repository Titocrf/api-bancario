<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContaRequest;
use App\Services\ContaService;
use Illuminate\Http\Request;
use App\Http\Resources\ContaResource;

class ContaController extends Controller
{
    private $contaService;

    public function __construct(ContaService $contaService)
    {
        $this->contaService = $contaService;
    }

    /**
     * Lista todas as contas
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $contas = $this->contaService->getAll();
        return response()->json($contas);
    }

    /**
     * Cria uma conta
     *
     * @param  ContaRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ContaRequest $request)
    {
        $model = $this->contaService->create($request->validated());
        return new ContaResource($model, 201);
    }

    /**
     * Exibe uma conta específica
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request)
    {
        $numeroConta = $request->query('numero_conta');

        try {
            $conta = $this->contaService->getContaByNumero($numeroConta);
            return new ContaResource($conta);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }
    }

    /**
     * Atualiza uma conta
     *
     * @param ContaRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ContaRequest $request, $id)
    {
        try {
            $model = $this->contaService->update($request->validated(), $id);
            return response()->json($model);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }
    }
}
