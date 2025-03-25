<?php
use App\Models\User;
use App\Models\Book;
use App\Models\Review;
use App\Models\Category;
use function Pest\Laravel\getJson;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->category = Category::factory()->create();
    $this->book = Book::factory()->create();
});

// Store
test('Cadastro de um livro', function () {
    $response = $this->postJson('/api/books', [
        'title' => 'Livro 1',
        'cover' => '',
        'author' => 'John Doe',
        'publisher' => 'Portugal',
        'publication_year' => '2020',
        'isbn' => '',
        'status' => 'unread',
        'user_id' => $this->user->id,
        'category_id' => $this->category->id
    ]);
    $response->assertStatus(201)->assertJsonStructure([
        'title', 'cover', 'author', 'publisher', 'publication_year', 'isbn', 'status', 'created_at', 'updated_at'
    ]);
});

// Index
test('Listagem dos livros', function () {
    $response = getJson('/api/books');
    $response->assertStatus(200)->assertJsonStructure([
        '*' => ['title', 'cover', 'author', 'publisher', 'publication_year', 'isbn', 'status','created_at', 'updated_at']
    ]);
});

// Show
test('Exibir de um livro', function () {
    $response = getJson('/api/books/' . $this->book->id);
    $response->assertStatus(200)->assertJsonStructure([
        'title', 'cover', 'author', 'publisher', 'publication_year', 'isbn', 'status', 'created_at', 'updated_at'
    ]);
});

// Update
test('Editar um livro', function(){
    $response = $this->putJson('/api/books/' . $this->book->id, [
        'title' => 'Livro 2',
        'cover' => '',
        'author' => 'John Doe 2',
        'publisher' => 'Portugal Brasil',
        'publication_year' => '2024',
        'isbn' => '',
        'status' => 'read',
        'user_id' => $this->user->id,
        'category_id' => $this->category->id,
    ]);
    $response->assertStatus(201)->assertJsonStructure([
        'title', 'cover', 'author', 'publisher', 'publication_year', 'isbn', 'status', 'created_at', 'updated_at'
    ]);
});

// Delete
test('Excluir um livro', function(){
    $response = $this->deleteJson('/api/books/' . $this->book->id);
    $response->assertStatus(201);
});


