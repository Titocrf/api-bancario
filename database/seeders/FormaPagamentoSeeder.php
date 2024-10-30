<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FormaPagamento;

class FormaPagamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FormaPagamento::create([
            'id' => 'P',
            'taxa' => 0.00,
        ]);

        FormaPagamento::create([
            'id' => 'C',
            'taxa' => 5.00,
        ]);

        FormaPagamento::create([
            'id' => 'D',
            'taxa' => 3.00,
        ]);
    }
}