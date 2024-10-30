<?php

namespace App\Services;

use App\Repositories\ContaRepository;

class ContaService
{
    protected $contaRepository;

    public function __construct(ContaRepository $contaRepository)
    {
        $this->contaRepository = $contaRepository;
    }

    public function getAll()
    {
        return $this->contaRepository->all();
    }

    public function create(array $data)
    {
        return $this->contaRepository->save($data);
    }

    public function getContaByNumero($numeroConta)
    {
        $dados = $this->contaRepository->findByNumeroConta($numeroConta);

        if (!$dados) {
            throw new \Exception('Conta não encontrada.', 404);
        }

        return $dados;
    }

    public function update(array $data, $id)
    {
        return $this->contaRepository->update($data, $id);
    }

    public function delete($id)
    {
        $this->contaRepository->delete($id);
    }
}
