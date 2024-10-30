<?php

namespace App\Repositories;

use App\Models\Transacao;

class TransacaoRepository
{
    public function all()
    {
        return Transacao::all();
    }

    public function save(array $data)
    {
        return Transacao::create($data);
    }

    private function findById($id)
    {
        return Transacao::findOrFail($id);
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
