<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateFornecedores extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fornecedores')->insert([
            [
                'nome' => 'Fornecedor A',
                'cnpj' => '12345678901234',
                'endereco' => 'Rua Exemplo, 123',
                'telefone' => '11912345678',
                'email' => 'fornecedorA@exemplo.com',
                'contato' => 'João Silva',
            ],
            [
                'nome' => 'Fornecedor B',
                'cnpj' => '98765432109876',
                'endereco' => 'Avenida Principal, 456',
                'telefone' => '21987654321',
                'email' => 'fornecedorB@exemplo.com',
                'contato' => 'Maria Oliveira',
            ],
            [
                'nome' => 'Fornecedor C',
                'cnpj' => '11223344556677',
                'endereco' => 'Travessa da Paz, 789',
                'telefone' => '31911223344',
                'email' => 'fornecedorC@exemplo.com',
                'contato' => 'Carlos Souza',
            ],
            [
                'nome' => 'Fornecedor D',
                'cnpj' => '99887766554433',
                'endereco' => 'Alameda das Flores, 1011',
                'telefone' => '41998877665',
                'email' => 'fornecedorD@exemplo.com',
                'contato' => 'Ana Pereira',
            ],
            [
                'nome' => 'Fornecedor E',
                'cnpj' => '12121212121212',
                'endereco' => 'Praça Central, 1212',
                'telefone' => '51912121212',
                'email' => 'fornecedorE@exemplo.com',
                'contato' => 'Pedro Santos',
            ],
            [
                'nome' => 'Fornecedor F',
                'cnpj' => '34343434343434',
                'endereco' => 'Rua do Comércio, 1313',
                'telefone' => '61934343434',
                'email' => 'fornecedorF@exemplo.com',
                'contato' => 'Lucia Mendes',
            ],
            [
                'nome' => 'Fornecedor G',
                'cnpj' => '56565656565656',
                'endereco' => 'Avenida Industrial, 1414',
                'telefone' => '71956565656',
                'email' => 'fornecedorG@exemplo.com',
                'contato' => 'Roberto Alves',
            ],
            [
                'nome' => 'Fornecedor H',
                'cnpj' => '78787878787878',
                'endereco' => 'Travessa da Indústria, 1515',
                'telefone' => '81978787878',
                'email' => 'fornecedorH@exemplo.com',
                'contato' => 'Sofia Castro',
            ],
            [
                'nome' => 'Fornecedor I',
                'cnpj' => '90909090909090',
                'endereco' => 'Alameda dos Negócios, 1616',
                'telefone' => '91990909090',
                'email' => 'fornecedorI@exemplo.com',
                'contato' => 'Daniel Rodrigues',
            ],
            [
                'nome' => 'Fornecedor J',
                'cnpj' => '23232323232323',
                'endereco' => 'Praça dos Fornecedores, 1717',
                'telefone' => '12923232323',
                'email' => 'fornecedorJ@exemplo.com',
                'contato' => 'Isabela Martins',
            ],
        ]);
    }
}
