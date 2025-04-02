<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProdutoControllerTest extends TestCase
{
    // Testes para o método index()
    public function test_listar_todos_produtos()
    {

        $response = $this->getJson('/api/produtos');

        $response->assertStatus(200);
    }

    // Testes para o método store()
    public function test_criar_produto_com_sucesso()
    {
        $dados = [
            'nome' => 'Produto Teste',
            'categoria' => 2,
            'marca' => 1,
            'descricao' => 'Descrição do produto teste',
            'unidade_medida' => 1,
            'quantidade' => 0,
            'preco_custo' => 10.50,
            'preco_venda' => 15.99,
        ];

        $response = $this->postJson('/api/produtos', $dados);

        $response->assertStatus(201)
                 ->assertJson($dados);

        $this->assertDatabaseHas('produtos', $dados);
    }

    public function test_criar_produto_com_falha_validacao()
    {
        $dados = [
            'nome' => '',
            'categoria' => 5,
            'marca' => 2,
            'preco_custo' => -10,
            'preco_venda' => -5,
        ];

        $response = $this->postJson('/api/produtos', $dados);

        $response->assertStatus(400)
                 ->assertJson([
                    'status_code' => 400,
                    'mensagem' => [
                     'nome' => ['Preencha o nome do produto.'],
                     'unidade_medida' => ['Preencha a unidade de medida do produto.'],
                     'preco_custo' => ['O valor mínimo de custo do produto é igual a 0.'],
                     'preco_venda' => ['O valor mínimo de venda do produto é igual a 0.']
                    ]
                 ]);
    }

    public function test_excluir_produto_com_sucesso()
    {

        $id = 18;
        $response = $this->deleteJson('/api/produtos/'.$id);

        $response->assertStatus(200);

    }

    public function test_excluir_produto_com_falha()
    {

        $id = 19;
        $response = $this->deleteJson('/api/produtos/'.$id);

        $response->assertStatus(404);

    }


}
