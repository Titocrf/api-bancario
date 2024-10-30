<?php

namespace Database\Factories;

use App\Models\Conta;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContaFactory extends Factory
{
    protected $model = Conta::class;

    public function definition()
    {
        return [
            'numero_conta' => $this->faker->unique()->numberBetween(100000, 999999),
            'saldo' => $this->faker->randomFloat(2, 0, 1000),
        ];
    }
}