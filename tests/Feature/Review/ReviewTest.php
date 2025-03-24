<?php

use App\Models\Book;
use App\Models\Category;
use App\Models\Review;
use App\Models\User;
use function Pest\Laravel\{postJson, getJson, putJson, deleteJson};

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->category = Category::factory()->create();
    $this->book = Book::factory()->create();
    $this->review = Review::factory()->create();
});


// Store
test('Criação de uma avaliação', function () {
    $response = postJson('/api/reviews', [
        'rating' => 5,
        'review' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        'user_id' => $this->user->id,
        'book_id' => $this->book->id,
    ]);

    $response->assertStatus(201)->assertJsonStructure([
        'id', 'rating', 'review', 'user_id', 'book_id'
    ]);
});


// Index
test('Listagem de avaliações', function () {
    $response = getJson('/api/reviews');
    $response->assertStatus(200)->assertJsonStructure([
        '*' => ['id', 'rating', 'review', 'user_id', 'book_id']
    ]);
});

// Show
test('Exbir uma avaliação', function () {
    $response = getJson('/api/reviews/' . $this->review->id);
    $response->assertStatus(200)->assertJsonStructure([
        'id', 'rating', 'review', 'user_id', 'book_id'
    ]);
});

// Update
test('Editar uma avalição', function () {
    $response = putJson('/api/reviews/' . $this->review->id, [
        'rating' => 5,
        'review' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        'user_id' => $this->user->id,
        'book_id' => $this->book->id,
    ]);
    $response->assertStatus(200)->assertJsonStructure([
        'id', 'rating', 'review', 'user_id', 'book_id'
    ]);
});

test('Excluir uma avaliação', function () {
   $response = deleteJson('/api/reviews/' . $this->review->id);
   $response->assertStatus(201);
});
