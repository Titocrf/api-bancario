<?php

namespace App\Repositories;

use App\Models\Conta;

class ContaRepository
{
    public function all()
    {
        return Conta::all();
    }

    public function save(array $data)
    {
        return Conta::create($data);
    }

    private function findById($id)
    {
        return Conta::findOrFail($id);
    }

    public function findByNumeroConta($numeroConta)
    {
        return Conta::where('numero_conta', $numeroConta)->first();
    }

    public function update(array $data, $id)
    {
        $conta = $this->findById($id);
        $conta->update($data);
        return $conta;
    }

    public function delete($id)
    {
        $conta = $this->findById($id);
        $conta->delete();
    }
}
