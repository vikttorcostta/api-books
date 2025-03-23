<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Paulo Victor',
            'email' => 'paulovictor@books.com.br',
            'password' => bcrypt('12345678'),
        ]);

        User::factory()->create([
            'name' => 'Roque Leto',
            'email' => 'roqueleto@books.com.br',
            'password' => bcrypt('12345678'),
        ]);

        User::factory()->create([
            'name' => 'Davi Caridade',
            'email' => 'davi@books.com.br',
            'password' => bcrypt('12345678'),
        ]);

        User::factory()->create([
            'name' => 'Vandson Nascimento',
            'email' => 'vandson@books.com.br',
            'password' => bcrypt('12345678'),
        ]);

        User::factory()->create([
            'name' => 'Gabriel Gomes',
            'email' => 'gabrielgomes@books.com.br',
            'password' => bcrypt('12345678'),
        ]);

        User::factory()->create([
            'name' => 'Alice Moraes',
            'email' => 'alicemoraes@books.com.br',
            'password' => bcrypt('12345678'),
        ]);

        User::factory()->create([
            'name' => 'Bruno Ribeiro',
            'email' => 'brunoribeiro@books.com.br',
            'password' => bcrypt('12345678'),
        ]);

        User::factory()->create([
            'name' => 'Carla Souza',
            'email' => 'carlasouza@books.com.br',
            'password' => bcrypt('12345678'),
        ]);

        User::factory()->create([
            'name' => 'Daniel Fernandes',
            'email' => 'danielfernandes@books.com.br',
            'password' => bcrypt('12345678'),
        ]);

        User::factory()->create([
            'name' => 'Eduarda Lima',
            'email' => 'eduardalima@books.com.br',
            'password' => bcrypt('12345678'),
        ]);

        User::factory()->create([
            'name' => 'Felipe Castro',
            'email' => 'felipecastro@books.com.br',
            'password' => bcrypt('12345678'),
        ]);

        User::factory()->create([
            'name' => 'Gabriela Nunes',
            'email' => 'gabrielanunes@books.com.br',
            'password' => bcrypt('12345678'),
        ]);

        User::factory()->create([
            'name' => 'Henrique Martins',
            'email' => 'henriquemartins@books.com.br',
            'password' => bcrypt('12345678'),
        ]);

        User::factory()->create([
            'name' => 'Isabela Rocha',
            'email' => 'isabelarocha@books.com.br',
            'password' => bcrypt('12345678'),
        ]);

        User::factory()->create([
            'name' => 'João Silva',
            'email' => 'joaosilva@books.com.br',
            'password' => bcrypt('12345678'),
        ]);

        User::factory()->create([
            'name' => 'Karen Oliveira',
            'email' => 'karenoliveira@books.com.br',
            'password' => bcrypt('12345678'),
        ]);

        User::factory()->create([
            'name' => 'Leonardo Santos',
            'email' => 'leonardosantos@books.com.br',
            'password' => bcrypt('12345678'),
        ]);

        User::factory()->create([
            'name' => 'Mariana Teixeira',
            'email' => 'marianateixeira@books.com.br',
            'password' => bcrypt('12345678'),
        ]);

        User::factory()->create([
            'name' => 'Nathan Costa',
            'email' => 'nathancosta@books.com.br',
            'password' => bcrypt('12345678'),
        ]);

        User::factory()->create([
            'name' => 'Olivia Alves',
            'email' => 'oliviaalves@books.com.br',
            'password' => bcrypt('12345678'),
        ]);

        User::factory()->create([
            'name' => 'Paulo Mendes',
            'email' => 'paulomendes@books.com.br',
            'password' => bcrypt('12345678'),
        ]);

        User::factory()->create([
            'name' => 'Raquel Farias',
            'email' => 'raquelfarias@books.com.br',
            'password' => bcrypt('12345678'),
        ]);

        User::factory()->create([
            'name' => 'Samuel Pereira',
            'email' => 'samuelpereira@books.com.br',
            'password' => bcrypt('12345678'),
        ]);

        User::factory()->create([
            'name' => 'Tatiane Borges',
            'email' => 'tatianeborges@books.com.br',
            'password' => bcrypt('12345678'),
        ]);

        User::factory()->create([
            'name' => 'Vinícius Gomes',
            'email' => 'viniciusgomes@books.com.br',
            'password' => bcrypt('12345678'),
        ]);

    }
}
