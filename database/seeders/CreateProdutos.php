<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CreateProdutos extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('produtos')->insert([
            [
                'nome' => 'Smartphone XYZ',
                'marca' => 1,
                'descricao' => 'Smartphone com tela de 6.5 polegadas e câmera dupla.',
                'unidade_medida' => 1,
                'categoria' => 1,
                'preco_custo' => 1200.00,
                'preco_venda' => 2000.00,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'nome' => 'Arroz Integral',
                'marca' => 2,
                'descricao' => 'Arroz integral de alta qualidade.',
                'unidade_medida' => 2,
                'categoria' => 3,
                'preco_custo' => 15.50,
                'preco_venda' => 30.00,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'nome' => 'Camiseta Algodão',
                'marca' => 3,
                'descricao' => 'Camiseta de algodão macia e confortável.',
                'unidade_medida' => 1,
                'categoria' => 2,
                'preco_custo' => 45.00,
                'preco_venda' => 50.00,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'nome' => 'Lâmpada LED',
                'marca' => 4,
                'descricao' => 'Lâmpada LED de baixo consumo e alta durabilidade.',
                'unidade_medida' => 1,
                'categoria' => 4,
                'preco_custo' => 12.99,
                'preco_venda' => 41.40,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'nome' => 'Notebook ABC',
                'marca' => 5,
                'descricao' => 'Notebook com processador potente e design elegante.',
                'unidade_medida' => 1,
                'categoria' => 1,
                'preco_custo' => 2500.00,
                'preco_venda' => 4000.00,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'nome' => 'Feijão Carioca',
                'marca' => 6,
                'descricao' => 'Feijão carioca selecionado.',
                'unidade_medida' => 1,
                'categoria' => 3,
                'preco_custo' => 8.75,
                'preco_venda' => 15.85,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'nome' => 'Calça Jeans',
                'marca' => 7,
                'descricao' => 'Calça jeans com corte moderno e excelente caimento.',
                'unidade_medida' => 1,
                'categoria' => 2,
                'preco_custo' => 89.90,
                'preco_venda' => 140.00,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'nome' => 'Cadeira Escritório',
                'marca' => 8,
                'descricao' => 'Cadeira de escritório ergonômica e confortável.',
                'unidade_medida' => 1,
                'categoria' => 4,
                'preco_custo' => 180.00,
                'preco_venda' => 200.00,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'nome' => 'Mouse Sem Fio',
                'marca' => 9,
                'descricao' => 'Mouse sem fio com design ergonômico e alta precisão.',
                'unidade_medida' => 1,
                'categoria' => 1,
                'preco_custo' => 55.00,
                'preco_venda' => 100.00,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'nome' => 'Açúcar Refinado',
                'marca' => 10,
                'descricao' => 'Açúcar refinado de alta qualidade.',
                'unidade_medida' => 1,
                'categoria' => 3,
                'preco_custo' => 6.20,
                'preco_venda' => 10.10,
                'created_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}
