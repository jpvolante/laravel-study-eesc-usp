<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Livro;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Cria 20 usuários
        User::factory()->count(20)->create();

        // Cria 20 livros, cada um associado a um usuário existente
        Livro::factory()->count(20)->create();

        // Criação de um usuário de teste
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
