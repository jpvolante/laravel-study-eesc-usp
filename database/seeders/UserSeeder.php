<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            'codpes' => '123456',
            'email' => 'qualquer@usp.br',
            'name' => 'Fulano da Silva',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
        ];

        $createdUser = User::create($user);

    if ($createdUser) {
        echo "Usuário criado com sucesso: " . $createdUser->name . "\n";
    } else {
        echo "Erro ao criar usuário.\n";
    }

        
        User::factory(10)->create();
    }
}
