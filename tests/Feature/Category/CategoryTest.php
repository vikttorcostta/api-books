<?php

use App\Models\Category;
use function Pest\Laravel\{postJson, getJson, putJson, deleteJson};

beforeEach(function () {
     $this->category = Category::factory()->create();
});

// Store
test('Criação de uma categoria', function () {
    $response = $this->postJson('/api/categories', [
        'name' => $this->category->name,
    ]);
    $response->assertStatus(201)->assertJsonStructure([
        'name', 'created_at' ,'updated_at'
    ]);
});

// Index
test('Listagem de todas as  categorias', function () {
    $repsonse = getJson('/api/categories', [
        'name' => $this->category->name,
    ]);
    $repsonse->assertStatus(200)->assertJsonStructure([
       '*' => ['name', 'created_at', 'updated_at']
    ]);
});

// Show
test('Exibir uma categoria', function () {
    $response = getJson('/api/categories/' . $this->category->id, [
        'name' => $this->category->name,
    ]);
    $response->assertStatus(201)->assertJsonStructure([
        'id', 'name', 'created_at', 'updated_at'
    ]);
});

// Update
test('Editar uma categoria', function () {
    $response = $this->putJson('/api/categories/' . $this->category->id, [
        'name' => $this->category->name,
    ]);
    $response->assertStatus(200)->assertJsonStructure([
        'name', 'created_at', 'updated_at'
    ]);
});

// Delete
test('Deletar uma categoria', function () {
    $response = $this->deleteJson('/api/categories/' . $this->category->id);
    $response->assertStatus(201);
});
