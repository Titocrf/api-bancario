<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  mixed $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'numero_conta' => $this->numero_conta,
            'saldo' => number_format((float)$this->saldo, 2, '.', ''),
        ];
    }

    /**
     * Override toResponse to return the resource without the 'data' wrapper.
     *
     * @param mixed $request
     * @return \Illuminate\Http\Response
     */
    public function toResponse($request)
    {
        return response()->json($this->toArray($request), 201);
    }
}