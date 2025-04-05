<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateUsers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id_produto' => 1,
            'name' => 'Usuário de teste',
            'email' => 'teste@teste.com',
            'email_verified_at' => null,
            // Senha : teste123
            'password' => '$2y$12$3zqaY/5K0CHKiGGa6CB8L.bAKrnU1gpsgU6mw0mCojxG9.RfDh4d.',
            'remember_token' => null,
            'created_at' => '2025-04-05 17:03:20',
            'updated_at' => '2025-04-05 17:03:20'
        ]);
    }
}
