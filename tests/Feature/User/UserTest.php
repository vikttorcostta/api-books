<?php

use App\Models\User;
use function Pest\Laravel\{postJson, getJson, putJson, deleteJson};

beforeEach(function () {
    $this->user = User::factory()->create();
});

// Store
test('Cadastro de usuário', function () {
    $response = PostJson('/api/users', [
        'name' => 'Aurora Luciana Ramos',
        'email' => 'aurora-ramos83@life.com',
        'password' => '12345678',
        'password_confirmation' => '12345678',
    ]);

    $response->assertStatus(201)->assertJsonStructure([
            'id', 'name', 'email', 'created_at', 'updated_at'
    ]);
});

// Index
test('Listagem de usuários', function () {
    $response = getJson('/api/users');
    $response->assertStatus(200)->assertJsonStructure([
       '*' => ['id', 'name', 'email', 'created_at', 'updated_at']
    ]);
});

// Show
test('Mostrar usuário', function (){
    $response = getJson('/api/users/' . $this->user->id);
    $response->assertStatus(201)->assertJsonStructure([
        'id', 'name', 'email', 'created_at', 'updated_at'
    ]);
});

// Update
test('Atualizar usuário', function () {
    $response = putJson('/api/users/' . $this->user->id, [
        'name' => 'Aurora Luciana Ramos dos Santos Atualizado',
        'email' => 'aurora.ramos@book.com.br',
        'password' => '12345678',
    ]);
    $response->assertStatus(200)->assertJsonStructure([
        'id', 'name', 'email', 'created_at', 'updated_at'
    ]);
});

// Delete
test('Excluir usuário', function () {
    $response = deleteJson('/api/users/' . $this->user->id);
    $response->assertStatus(201);
});
