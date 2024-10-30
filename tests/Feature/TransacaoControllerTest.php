<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Conta;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TransacaoControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $conta;
    protected $formaPagamento;

    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed', ['--class' => 'FormaPagamentoSeeder']);
        $this->conta = Conta::factory()->create(['numero_conta'=> 2146246561, 'saldo' => 100.00]);
    }

    /** @test */
    public function deve_realizar_uma_transacao_com_sucesso()
    {
        $payload = [
            'numero_conta' => $this->conta->numero_conta,
            'valor' => 10.00,
            'forma_pagamento' => "D",
        ];

        $response = $this->postJson(route('transacao.store'), $payload);

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'numero_conta',
            'saldo'
        ]);

        $saldoEsperado = 100.00 - 10.00 - (10.00 * 0.03);
        $this->assertEquals(number_format($saldoEsperado, 2), $this->conta->fresh()->saldo);
    }

    /** @test */
    public function deve_retornar_erro_ao_realizar_transacao_com_saldo_insuficiente()
    {
        $payload = [
            'numero_conta' => $this->conta->numero_conta,
            'valor' => 200.00,
            'forma_pagamento' => "D",
        ];

        $response = $this->postJson(route('transacao.store'), $payload);

        $response->assertStatus(404);
        $response->assertJson(['message' => 'Saldo insuficiente.']);
    }

    /** @test */
    public function deve_retornar_erro_ao_realizar_transacao_com_conta_inexistente()
    {
        $payload = [
            'numero_conta' => 999999,
            'valor' => 10.00,
            'forma_pagamento' => "P",
        ];

        $response = $this->postJson(route('transacao.store'), $payload);

        $response->assertStatus(404);
        $response->assertJson(['message' => 'Conta não encontrada.']);
    }

    /** @test */
    public function deve_retornar_erro_ao_realizar_transacao_com_dados_invalidos()
    {
        $payload = [
            'numero_conta' => $this->conta->numero_conta,
            'valor' => -10.00,
            'forma_pagamento' => "L",
        ];

        $response = $this->postJson(route('transacao.store'), $payload);

        $response->assertStatus(422);
        $response->assertJson([
            'message' => 'O saldo não pode ser menor que zero.'
        ]);
    }
}