<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;

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
            'is_admin' => true,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
        ];

        User::create($user);

        // Criando mais 10 usuários de teste usando a fábrica
        User::factory(10)->create();
    }
}
