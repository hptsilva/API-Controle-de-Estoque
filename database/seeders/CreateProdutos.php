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
                'marca' => 'Marca A',
                'descricao' => 'Smartphone com tela de 6.5 polegadas e câmera dupla.',
                'unidade_medida' => 'UN',
                'categoria' => 'Eletrônicos',
                'preco' => 1200.00,
            ],
            [
                'nome' => 'Arroz Integral',
                'marca' => 'Marca B',
                'descricao' => 'Arroz integral de alta qualidade.',
                'unidade_medida' => 'KG',
                'categoria' => 'Alimentos',
                'preco' => 15.50,
            ],
            [
                'nome' => 'Camiseta Algodão',
                'marca' => 'Marca C',
                'descricao' => 'Camiseta de algodão macia e confortável.',
                'unidade_medida' => 'UN',
                'categoria' => 'Vestuário',
                'preco' => 45.00,
            ],
            [
                'nome' => 'Lâmpada LED',
                'marca' => 'Marca D',
                'descricao' => 'Lâmpada LED de baixo consumo e alta durabilidade.',
                'unidade_medida' => 'UN',
                'categoria' => 'Geral',
                'preco' => 12.99,
            ],
            [
                'nome' => 'Notebook ABC',
                'marca' => 'Marca E',
                'descricao' => 'Notebook com processador potente e design elegante.',
                'unidade_medida' => 'UN',
                'categoria' => 'Eletrônicos',
                'preco' => 2500.00,
            ],
            [
                'nome' => 'Feijão Carioca',
                'marca' => 'Marca F',
                'descricao' => 'Feijão carioca selecionado.',
                'unidade_medida' => 'KG',
                'categoria' => 'Alimentos',
                'preco' => 8.75,
            ],
            [
                'nome' => 'Calça Jeans',
                'marca' => 'Marca G',
                'descricao' => 'Calça jeans com corte moderno e excelente caimento.',
                'unidade_medida' => 'UN',
                'categoria' => 'Vestuário',
                'preco' => 89.90,
            ],
            [
                'nome' => 'Cadeira Escritório',
                'marca' => 'Marca H',
                'descricao' => 'Cadeira de escritório ergonômica e confortável.',
                'unidade_medida' => 'UN',
                'categoria' => 'Geral',
                'preco' => 180.00,
            ],
            [
                'nome' => 'Mouse Sem Fio',
                'marca' => 'Marca I',
                'descricao' => 'Mouse sem fio com design ergonômico e alta precisão.',
                'unidade_medida' => 'UN',
                'categoria' => 'Eletrônicos',
                'preco' => 55.00,
            ],
            [
                'nome' => 'Açúcar Refinado',
                'marca' => 'Marca J',
                'descricao' => 'Açúcar refinado de alta qualidade.',
                'unidade_medida' => 'KG',
                'categoria' => 'Alimentos',
                'preco' => 6.20,
            ],
        ]);
    }
}
